<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class PersonaPresenceType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="PersonaPresence")
 */
class PersonaPresenceType
{
    /**
     * @var int
     */
    private $personaId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $presence;

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
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * @param int $presence
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;
    }
}