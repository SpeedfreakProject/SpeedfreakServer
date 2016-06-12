<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Business;

use Carbon\Carbon;
use Speedfreak\Contracts\Business\MatchmakingBO as Contract;
use Speedfreak\Entities\EventDefinition;
use Speedfreak\Entities\Lobby;
use Speedfreak\Entities\LobbyEntrant;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Repositories\LobbyRepository;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Types\ChallengeType;
use Speedfreak\Entities\Types\LobbyInfoType;
use Speedfreak\Entities\Types\LobbyInviteType;
use Speedfreak\Entities\Types\SessionInfoType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http;

class MatchmakingBO implements Contract
{
    /**
     * @var PersonaRepository
     */
    private $personaRepository;

    /**
     * @var LobbyRepository
     */
    private $lobbyRepository;

    /**
     * MatchmakingBO constructor.
     * @param PersonaRepository $personaRepository
     * @param LobbyRepository $lobbyRepository
     */
    public function __construct(
        PersonaRepository $personaRepository,
        LobbyRepository $lobbyRepository
    )
    {
        $this->personaRepository = $personaRepository;
        $this->lobbyRepository = $lobbyRepository;
    }

    public function launchEvent(int $eventId) : SessionInfoType
    {
        $challenge = new ChallengeType;
        $challenge->setChallengeId(str_repeat('a', 32));
        $challenge->setPattern(str_repeat('F', 16));
        $challenge->setLeftSize(14);
        $challenge->setRightSize(50);

        $sessionInfoType = new SessionInfoType;
        $sessionInfoType->setSessionId(100000000);
        $sessionInfoType->setEventId($eventId);
        $sessionInfoType->setChallenge($challenge);

        return $sessionInfoType;
    }

    public function joinQueueEvent(int $personaId, int $eventId)
    {
        $persona = $this->personaRepository->findById($personaId);
        $now = Carbon::now();
        $past = $now->subSeconds(45000);
        $lobbies = $this->lobbyRepository->findByEventStarted($eventId, $now, $past);

        if (count($lobbies) == 0) {
            $this->createLobby($persona, $eventId);
        } else {
            $this->joinLobby($persona, $lobbies);
        }
    }

    public function createLobby(Persona $persona, int $eventId)
    {
        $eventEntity = EventDefinition::query()->findOrFail($eventId);
        $lobbyEntity = new Lobby;
        $lobbyEntity->event()->associate($eventEntity);

        $lobbyEntrantEntity = new LobbyEntrant;
        $lobbyEntrantEntity->persona()->associate($persona);
        $lobbyEntrantEntity->lobby()->associate($lobbyEntity);
        $lobbyEntrantEntity->save();

        $lobbyEntity->entrants()->save($lobbyEntrantEntity);
        $lobbyEntity->save();

        $this->sendJoinEvent($persona->getKey(), $lobbyEntity);
    }

    public function joinLobby(Persona $persona, array $lobbies)
    {
        // TODO: Implement joinLobby() method.
    }

    public function isPersonaInside(int $personaId, array $lobbyEntrants) : boolean
    {
        // TODO: Implement isPersonaInside() method.
    }

    public function sendJoinMsg(int $personaId, array $lobbyEntrants)
    {
        // TODO: Implement sendJoinMsg() method.
    }

    public function sendJoinEvent(int $personaId, Lobby $lobby)
    {
        // Here be dragons...
        $sessionId = (int) $lobby->getKey();
        $lobbyType = $lobby->getLobbyType();
        $headers = ['Accept' => 'application/xml'];
        $data = [
            'personaId' => $personaId, 
            'lobbyId' => $sessionId,
            'eventId' => $lobbyType->getEvent()->getEventId()
        ];

        Http::post('http://localhost:9002/Matchmaking/SendJoin', $headers, $data);
    }

    public function acceptInvite(int $personaId, int $lobbyInviteId) : LobbyInfoType
    {
        // TODO: Implement acceptInvite() method.
    }

    public function startCountdown(Lobby $lobby)
    {
        // TODO: Implement startCountdown() method.
    }
}