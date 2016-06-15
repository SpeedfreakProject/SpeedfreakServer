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
 * Class PursuitEventResultType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="PursuitEventResult")
 */
class PursuitEventResultType
{
    /**
     * @var AccoladesType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Accolades")
     */
    protected $accolades;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Durability")
     */
    protected $durability;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventId")
     */
    protected $eventId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventSessionId")
     */
    protected $eventSessionId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ExitPath")
     */
    protected $exitPath;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("InviteLifetimeInMilliseconds")
     */
    protected $inviteLifetimeInMilliseconds;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("LobbyInviteId")
     */
    protected $lobbyInviteId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PersonaId")
     */
    protected $personaId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Heat")
     */
    protected $heat;

    /**
     * @return AccoladesType
     */
    public function getAccolades()
    {
        return $this->accolades;
    }

    /**
     * @param AccoladesType $accolades
     */
    public function setAccolades($accolades)
    {
        $this->accolades = $accolades;
    }

    /**
     * @return int
     */
    public function getDurability()
    {
        return $this->durability;
    }

    /**
     * @param int $durability
     */
    public function setDurability($durability)
    {
        $this->durability = $durability;
    }

    /**
     * @return int
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @return int
     */
    public function getEventSessionId()
    {
        return $this->eventSessionId;
    }

    /**
     * @param int $eventSessionId
     */
    public function setEventSessionId($eventSessionId)
    {
        $this->eventSessionId = $eventSessionId;
    }

    /**
     * @return string
     */
    public function getExitPath()
    {
        return $this->exitPath;
    }

    /**
     * @param string $exitPath
     */
    public function setExitPath($exitPath)
    {
        $this->exitPath = $exitPath;
    }

    /**
     * @return int
     */
    public function getInviteLifetimeInMilliseconds()
    {
        return $this->inviteLifetimeInMilliseconds;
    }

    /**
     * @param int $inviteLifetimeInMilliseconds
     */
    public function setInviteLifetimeInMilliseconds($inviteLifetimeInMilliseconds)
    {
        $this->inviteLifetimeInMilliseconds = $inviteLifetimeInMilliseconds;
    }

    /**
     * @return int
     */
    public function getLobbyInviteId()
    {
        return $this->lobbyInviteId;
    }

    /**
     * @param int $lobbyInviteId
     */
    public function setLobbyInviteId($lobbyInviteId)
    {
        $this->lobbyInviteId = $lobbyInviteId;
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
     * @return int
     */
    public function getHeat()
    {
        return $this->heat;
    }

    /**
     * @param int $heat
     */
    public function setHeat($heat)
    {
        $this->heat = $heat;
    }
}