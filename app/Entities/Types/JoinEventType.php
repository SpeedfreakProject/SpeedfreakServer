<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

class JoinEventType
{
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PersonaId")
     */
    protected $personaId;

    /**
     * @var LobbyInfoType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("Speedfreak\Entities\Types\LobbyInfoType")
     */
    protected $lobby;

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
     * @return LobbyInfoType
     */
    public function getLobby()
    {
        return $this->lobby;
    }

    /**
     * @param LobbyInfoType $lobby
     */
    public function setLobby($lobby)
    {
        $this->lobby = $lobby;
    }
}