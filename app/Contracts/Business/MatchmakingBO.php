<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Business;

use Speedfreak\Entities\Lobby;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Types\LobbyInfoType;
use Speedfreak\Entities\Types\SessionInfoType;

interface MatchmakingBO
{
    public function launchEvent(int $eventId) : SessionInfoType;

    public function joinQueueEvent(int $personaId, int $eventId);

    public function createLobby(Persona $persona, int $eventId);

    public function joinLobby(Persona $persona, array $lobbies);

    public function isPersonaInside(int $personaId, array $lobbyEntrants) : boolean;

    public function sendJoinMsg(int $personaId, array $lobbyEntrants);
    
    public function sendJoinEvent(int $personaId, Lobby $lobby);

    public function acceptInvite(int $personaId, int $lobbyInviteId) : LobbyInfoType;

    public function startCountdown(Lobby $lobby);
}