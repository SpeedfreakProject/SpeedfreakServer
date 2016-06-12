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

/**
 * Class LobbyInviteType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="LobbyInviteType")
 */
class LobbyInviteType
{
    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventId")
     * @Serializer\Type("double")
     */
    protected $eventId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("InviteLifetimeInMilliseconds")
     * @Serializer\Type("integer")
     */
    protected $inviteLifetimeInMilliseconds = 10000;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("InvitedByPersonaId")
     * @Serializer\Type("integer")
     */
    protected $invitedByPersonaId = 0;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsPrivate")
     * @Serializer\Type("boolean")
     */
    protected $isPrivate = false;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("LobbyInviteId")
     * @Serializer\Type("double")
     */
    protected $lobbyInviteId;

    /**
     * @return float
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param float $eventId
     */
    public function setEventId(float $eventId)
    {
        $this->eventId = $eventId;
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
    public function setInviteLifetimeInMilliseconds(int $inviteLifetimeInMilliseconds)
    {
        $this->inviteLifetimeInMilliseconds = $inviteLifetimeInMilliseconds;
    }

    /**
     * @return boolean
     */
    public function isIsPrivate()
    {
        return $this->isPrivate;
    }

    /**
     * @param boolean $isPrivate
     */
    public function setIsPrivate(bool $isPrivate)
    {
        $this->isPrivate = $isPrivate;
    }

    /**
     * @return float
     */
    public function getLobbyInviteId()
    {
        return $this->lobbyInviteId;
    }

    /**
     * @param float $lobbyInviteId
     */
    public function setLobbyInviteId(float $lobbyInviteId)
    {
        $this->lobbyInviteId = $lobbyInviteId;
    }

    /**
     * @return int
     */
    public function getInvitedByPersonaId()
    {
        return $this->invitedByPersonaId;
    }

    /**
     * @param int $invitedByPersonaId
     */
    public function setInvitedByPersonaId($invitedByPersonaId)
    {
        $this->invitedByPersonaId = $invitedByPersonaId;
    }
}