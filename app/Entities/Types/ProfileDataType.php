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
 * Class ProfileDataType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\XmlRoot(name="ProfileData")
 * @Serializer\AccessorOrder("alphabetical")
 */
class ProfileDataType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Badges")
     */
    private $badges;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Boost")
     */
    private $boost;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Cash")
     */
    private $cash;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="IconIndex")
     */
    private $iconIndex;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Level")
     */
    private $level;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Motto")
     */
    private $motto;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Name")
     */
    private $name;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="PercentToLevel")
     */
    private $percentToLevel;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="PersonaId")
     */
    private $personaId;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="RepAtCurrentLevel")
     */
    private $repAtCurrentLevel;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Rating")
     */
    private $rating;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Rep")
     */
    private $rep;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $ccar;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Score")
     */
    private $score;

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
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * @param int $boost
     */
    public function setBoost($boost)
    {
        $this->boost = $boost;
    }

    /**
     * @return int
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param int $cash
     */
    public function setCash($cash)
    {
        $this->cash = $cash;
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
     * @return float
     */
    public function getPercentToLevel()
    {
        return $this->percentToLevel;
    }

    /**
     * @param float $percentToLevel
     */
    public function setPercentToLevel($percentToLevel)
    {
        $this->percentToLevel = $percentToLevel;
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
     * @return string
     */
    public function getCcar()
    {
        return $this->ccar;
    }

    /**
     * @param string $ccar
     */
    public function setCcar($ccar)
    {
        $this->ccar = $ccar;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}