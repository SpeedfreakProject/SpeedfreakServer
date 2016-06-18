<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Social;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class FriendPersonaType
 * @package Speedfreak\Entities\Social
 * @Serializer\XmlRoot(name="FriendPersona")
 */
class FriendPersonaType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("iconIndex")
     */
    protected $iconIndex = 0;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("level")
     */
    protected $level = 1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("name")
     */
    protected $name = 'Awesome debug persona';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("originalName")
     */
    protected $originalName = 'DEBUG1';

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("personaId")
     */
    protected $personaId = -1;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("presence")
     */
    protected $presence = 0;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("socialNetwork")
     */
    protected $socialNetwork = 'facebook';

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("userId")
     */
    protected $userId = -1;

    /**
     * FriendPersonaType constructor.
     * @param int $iconIndex
     * @param int $level
     * @param string $name
     * @param string $originalName
     * @param int $personaId
     * @param int $presence
     * @param string $socialNetwork
     * @param int $userId
     */
    public function __construct(
        int $iconIndex = 0,
        int $level = 1,
        string $name = 'Awesome debug persona',
        string $originalName = 'DEBUG1',
        int $personaId = -1,
        int $presence = 0,
        string $socialNetwork = 'facebook',
        int $userId = -1
    ) {
        $this->iconIndex = $iconIndex;
        $this->level = $level;
        $this->name = $name;
        $this->originalName = $originalName;
        $this->personaId = $personaId;
        $this->presence = $presence;
        $this->socialNetwork = $socialNetwork;
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getIconIndex()
    {
        return $this->iconIndex;
    }

    /**
     * @param int $iconIndex
     */
    public function setIconIndex($iconIndex)
    {
        $this->iconIndex = $iconIndex;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
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

    /**
     * @return string
     */
    public function getSocialNetwork()
    {
        return $this->socialNetwork;
    }

    /**
     * @param string $socialNetwork
     */
    public function setSocialNetwork($socialNetwork)
    {
        $this->socialNetwork = $socialNetwork;
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
}