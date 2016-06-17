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
 * @Serializer\AccessorOrder("custom",custom={"id", "badges", "iconIndex", "level", "motto", "name", "personaId", "presence", "score", "userId"})
 */
class PersonaBaseType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Badges")
     * @Serializer\Type("string")
     */
    protected $badges;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="IconIndex")
     * @Serializer\Type("integer")
     */
    protected $iconIndex;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Level")
     * @Serializer\Type("integer")
     */
    protected $level;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Motto")
     * @Serializer\Type("string")
     */
    protected $motto;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Name")
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="PersonaId")
     * @Serializer\Type("integer")
     */
    protected $personaId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Presence")
     * @Serializer\Type("integer")
     */
    protected $presence;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Score")
     * @Serializer\Type("double")
     */
    protected $score;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="RepAtCurrentLevel")
     * @Serializer\Type("double")
     */
    protected $repAtCurrentLevel;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Rep")
     * @Serializer\Type("double")
     */
    protected $rep;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="UserId")
     * @Serializer\Type("integer")
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

    /**
     * @return float
     */
    public function getRepAtCurrentLevel()
    {
        return $this->repAtCurrentLevel;
    }

    /**
     * @param float $repAtCurrentLevel
     */
    public function setRepAtCurrentLevel($repAtCurrentLevel)
    {
        $this->repAtCurrentLevel = $repAtCurrentLevel;
    }

    /**
     * @return float
     */
    public function getRep()
    {
        return $this->rep;
    }

    /**
     * @param float $rep
     */
    public function setRep($rep)
    {
        $this->rep = $rep;
    }

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("Id")
     * @return int
     */
    public function getId()
    {
        return $this->personaId;
    }
}