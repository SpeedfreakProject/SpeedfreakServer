<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\API;

use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\Types\ArrayOfOwnedCarTransType;
use Speedfreak\Entities\Types\ArrayOfPersonaIdsType;

/**
 * Class APIPersonaDataType
 * @package Speedfreak\Entities\API
 * @Serializer\AccessorOrder("custom", custom={"badges", "iconIndex", "level", "motto", "name", "score", "cars", "otherPersonas"})
 * @Serializer\XmlRoot(name="PersonaData")
 */
class APIPersonaDataType
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Badges")
     * @var string
     */
    protected $badges;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IconIndex")
     * @var int
     */
    protected $iconIndex;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Level")
     * @var int
     */
    protected $level;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Motto")
     * @var string
     */
    protected $motto;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Name")
     * @var string
     */
    protected $name;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Score")
     * @var float
     */
    protected $score;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CarsList")
     * @var ArrayOfOwnedCarTransType
     */
    protected $cars;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("OtherPersonas")
     * @var ArrayOfPersonaIdsType
     */
    protected $otherPersonas = [];

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
     * @return mixed
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param mixed $cars
     */
    public function setCars($cars)
    {
        $this->cars = $cars;
    }

    /**
     * @return ArrayOfPersonaIdsType
     */
    public function getOtherPersonas() : ArrayOfPersonaIdsType
    {
        return $this->otherPersonas;
    }

    /**
     * @param ArrayOfPersonaIdsType $otherPersonas
     */
    public function setOtherPersonas(ArrayOfPersonaIdsType $otherPersonas)
    {
        $this->otherPersonas = $otherPersonas;
    }
}