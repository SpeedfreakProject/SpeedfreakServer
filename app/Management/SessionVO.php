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

class SessionVO
{
    /**
     * The user ID.
     *
     * @var int
     */
    public $userId;

    /**
     * The IP address.
     *
     * @var string
     */
    public $ipAddress;

    /**
     * The persona ID.
     *
     * @var int
     */
    public $personaId;

    /**
     * The security token.
     *
     * @var string
     */
    public $securityToken;

    /**
     * The event session ID, if any.
     *
     * @var int|null
     */
    public $eventSessionId;

    /**
     * A ticket to use for relaying messages.
     *
     * @var string
     */
    public $relayCryptoTicket;

    /**
     * A session key to use for relaying messages.
     *
     * @var string
     */
    public $relaySessionKey;

    /**
     * The date when the session expires.
     *
     * @var Carbon
     */
    public $expirationDate;

    /**
     * When the session was created.
     *
     * @var Carbon
     */
    public $created;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getPersonaId()
    {
        return $this->personaId;
    }

    /**
     * @param int $personaId
     */
    public function setPersonaId($personaId)
    {
        $this->personaId = $personaId;
    }

    /**
     * @return string
     */
    public function getSecurityToken()
    {
        return $this->securityToken;
    }

    /**
     * @param string $securityToken
     */
    public function setSecurityToken($securityToken)
    {
        $this->securityToken = $securityToken;
    }

    /**
     * @return int|null
     */
    public function getEventSessionId()
    {
        return $this->eventSessionId;
    }

    /**
     * @param int|null $eventSessionId
     */
    public function setEventSessionId($eventSessionId)
    {
        $this->eventSessionId = $eventSessionId;
    }

    /**
     * @return string
     */
    public function getRelayCryptoTicket()
    {
        return $this->relayCryptoTicket;
    }

    /**
     * @param string $relayCryptoTicket
     */
    public function setRelayCryptoTicket($relayCryptoTicket)
    {
        $this->relayCryptoTicket = $relayCryptoTicket;
    }

    /**
     * @return string
     */
    public function getRelaySessionKey()
    {
        return $this->relaySessionKey;
    }

    /**
     * @param string $relaySessionKey
     */
    public function setRelaySessionKey($relaySessionKey)
    {
        $this->relaySessionKey = $relaySessionKey;
    }

    /**
     * @return Carbon
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param Carbon $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return Carbon
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param Carbon $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }
}