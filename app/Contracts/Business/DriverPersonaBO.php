<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Business;

use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;
use Speedfreak\Entities\Types\ArrayOfStringType;
use Speedfreak\Entities\Types\PersonaMottoType;
use Speedfreak\Entities\Types\PersonaPresenceType;
use Speedfreak\Entities\Types\ProfileDataType;

interface DriverPersonaBO
{
    public function reserveName(string $name) : ArrayOfStringType;

    public function createPersona(int $userId, string $name, int $iconIndex) : ProfileDataType;

    public function deletePersona(int $personaId);

    public function getPersonaInfo(int $personaId) : ProfileDataType;

    public function getPersonaBaseFromList(array $personaIds) : ArrayOfPersonaBaseType;

    public function getPersonaPresenceByName(string $name);

    public function updateStatusMessage(int $personaId, string $message) : PersonaMottoType;
}