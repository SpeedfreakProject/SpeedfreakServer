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
 * Class PersonaBaseType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\AccessorOrder("custom",custom={"badges", "iconIndex", "level", "motto", "name", "personaId", "presence", "score", "userId"})
 */
class PersonaBaseType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Badges")
     */
    protected $badges;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="IconIndex")
     */
    protected $iconIndex;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Level")
     */
    protected $level;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Motto")
     */
    protected $motto;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Name")
     */
    protected $name;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="PersonaId")
     */
    protected $personaId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Presence")
     */
    protected $presence;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Score")
     */
    protected $score;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="UserId")
     */
    protected $userId;

    /**
     * @return string
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param string $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
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
    public function getMotto()
    {
        return $this->motto;
    }

    /**
     * @param string $motto
     */
    public function setMotto($motto)
    {
        $this->motto = $motto;
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
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     */
    public function setScore($score)
    {
        $this->score = $score;
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