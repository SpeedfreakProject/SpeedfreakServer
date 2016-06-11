<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Management;

use Carbon\Carbon;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Http\Request;
use Illuminate\Log\Writer;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Contracts\Exceptions\SessionAlreadyCreatedException;
use Speedfreak\Contracts\State as Contract;
use Psr\Log\LogLevel;
use Speedfreak\Entities\Session;

/**
 * Class State
 * @package Speedfreak\Management
 *
 * Controls application state. Keeps track of
 * sessions, the cache, the current request, and more.
 */
class State implements Contract
{
    const STATE_CACHE_TAG = 'nfsw_state';
    const STATE_SESSIONS_CACHE_KEY = 'sessions';

    protected $cache;

    protected $request;

    protected $currentSessions;

    private $logger;

    /**
     * State constructor.
     * @param CacheRepository $cache
     * @param Writer $logger
     */
    public function __construct(CacheRepository $cache, Writer $logger)
    {
        $this->cache = $cache;
        $this->request = request();
        $this->currentSessions = collect();
        $this->logger = $logger;

        $this->refreshSessions();
    }

    /**
     * @inheritdoc
     */
    public function getActiveUsers(bool $fresh = false) : array
    {
        if ($fresh) return $this->refreshSessions();

        return $this->currentSessions->all();
    }

    /**
     * @inheritdoc
     */
    public function createSessionEntry(int $userId, string $securityToken) : array
    {
        $session = new SessionVO;
        $session->userId = $userId;
        $session->securityToken = $securityToken;
        $session->created = Carbon::now();
        $session->ipAddress = $this->getRequest()->ip();

        $this->cleanupSessions($userId); // cleanup
        $this->createSessionEntity($session);
        $this->writeSessionToCache($session);

        return $this->refreshSessions();
    }

    /**
     * Write a session to the session cache.
     * This does not refresh the cache!
     *
     * @param SessionVO $session
     * @throws SessionAlreadyCreatedException
     */
    public function writeSessionToCache(SessionVO $session)
    {
        $this->logger->write(LogLevel::INFO, sprintf('Writing session %s to cache', json_encode($session)));
        $this->cache->tags(self::STATE_CACHE_TAG)
            ->put(self::STATE_SESSIONS_CACHE_KEY, $this->currentSessions->put($session->userId, $session), 0);
        $this->logger->write(LogLevel::INFO, 'Wrote to cache.');
    }

    /**
     * @inheritdoc
     */
    public function refreshSessions() : array
    {
        $this->logger->write(LogLevel::INFO, 'Loading sessions from cache at ' . time() . '...');
        $this->currentSessions = $this->cache->tags(self::STATE_CACHE_TAG)
            ->get(self::STATE_SESSIONS_CACHE_KEY, collect());
        $this->logger->write(LogLevel::INFO, '$currentSessions now equals ' . json_encode($this->currentSessions->all()));

        return $this->currentSessions->all();
    }

    /**
     * @inheritdoc
     */
    public function getRequest() : Request
    {
        return $this->request;
    }

    /**
     * Generate a unique security token.
     * Will be unique 99.99999999999999999999% of the time!
     * Maybe even 100%.
     *
     * @return string
     */
    public function generateSecurityToken() : string
    {
        do {
            $shuffled = shuffleString(str_random(32), 32);
        } while ($this->hasSessionWithToken($shuffled));

        return $shuffled;
    }

    /**
     * @inheritdoc
     */
    public function hasSession(int $userId)
    {
        return $this->currentSessions->contains(function($key, SessionVO $sessionVO) use ($userId) {
            return $sessionVO->getUserId() == $userId;
        });
    }

    /**
     * @inheritdoc
     */
    public function getSession(int $userId)
    {
        return $this->currentSessions->first(function($key, SessionVO $sessionVO) use ($userId) {
            return $sessionVO->getUserId() == $userId;
        });
    }

    /**
     * @inheritdoc
     */
    public function validateSecurityToken()
    {
        $token = $this->getRequest()->header('securityToken');
        $userId = (int) $this->getRequest()->header('userId');

        if (($session = $this->getSession($userId)) != null) {
            if (((string) $token) != $session->securityToken) throw new EngineException('Authorization error: Your token is invalid.');
        } else {
            throw new EngineException('Authorization error: Invalid user ID. There is no registered session for that user.');
        }
    }

    public function createSessionEntity(SessionVO $sessionVO) : Session
    {
        return Session::forceCreate([
            'ipAddress' => $sessionVO->ipAddress,
            'userId' => $sessionVO->userId,
            'personaId' => $sessionVO->personaId,
            'securityToken' => $sessionVO->securityToken,
            'eventSessionId' => $sessionVO->eventSessionId,
            'relayCryptoTicket' => $sessionVO->relayCryptoTicket,
            'relaySessionKey' => $sessionVO->relaySessionKey,
            'expirationDate' => $sessionVO->expirationDate ? $sessionVO->expirationDate->toDateTimeString() : null,
            'realCreated' => $sessionVO->created->toDateTimeString(),
        ]);
    }

    private function cleanupSessions(int $userId)
    {
        $this->logger->info('Cleaning up sessions for ' . $userId);

        $this->currentSessions = $this->currentSessions->reject(function (SessionVO $session) use ($userId) {
            return $session->getUserId() == $userId;
        });

        Session::query()->where('userId', '=', $userId)
            ->delete();

        $this->cache->tags(self::STATE_CACHE_TAG)
            ->put(self::STATE_CACHE_TAG, $this->currentSessions, 0);
        $this->refreshSessions();

        $this->logger->info('Cleanup done for ' . $userId);
    }

    private function hasSessionWithToken(string $token)
    {
        return $this->currentSessions->contains(function (SessionVO $session) use ($token) {
            return $session->securityToken == $token;
        });
    }

    /**
     * Get the most recent session.
     *
     * @return SessionVO|null
     */
    public function mostRecentSession()
    {
        return $this->currentSessions->sortByDesc(function(SessionVO $item) {
            return $item->getCreated()->format('Y-m-d H:i:s');
        })->first();
    }
}