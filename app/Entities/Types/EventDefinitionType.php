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
 * Class EventDefinitionType
 * @package Speedfreak\Entities\Types
 * @Serializer\ExclusionPolicy("none")
 * @Serializer\XmlRoot("EventDefinitionType")
 */
class EventDefinitionType
{
    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventId")
     * @Serializer\Type("integer")
     */
    protected $eventId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CarClassHash")
     * @Serializer\Type("integer")
     */
    protected $carClassHash;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Coins")
     * @Serializer\Type("integer")
     */
    protected $coins;

    /**
     * @var EngagePointType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EngagePoint")
     * @Serializer\Exclude()
     * @Serializer\Type("Speedfreak\Entities\Types\EngagePointType")
     */
    protected $engagePoint;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Exclude()
     * @Serializer\Type("integer")
     */
    protected $engagePointX;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Exclude()
     * @Serializer\Type("integer")
     */
    protected $engagePointY;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Exclude()
     * @Serializer\Type("integer")
     */
    protected $engagePointZ;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventLocalization")
     * @Serializer\Type("integer")
     */
    protected $eventLocalization;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventModeDescriptionLocalization")
     * @Serializer\Type("integer")
     */
    protected $eventModeDescriptionLocalization;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventModeIcon")
     * @Serializer\Type("string")
     */
    protected $eventModeIcon;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventModeId")
     * @Serializer\Type("integer")
     */
    protected $eventModeId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventModeLocalization")
     * @Serializer\Type("integer")
     */
    protected $eventModeLocalization;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsEnabled")
     * @Serializer\Type("string")
     */
    protected $isEnabled;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsLocked")
     * @Serializer\Type("string")
     */
    protected $isLocked;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Laps")
     * @Serializer\Type("integer")
     */
    protected $laps;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Length")
     * @Serializer\Type("integer")
     */
    protected $length;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MaxClassRating")
     */
    protected $maxClassRating;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MaxEntrants")
     * @Serializer\Type("integer")
     */
    protected $maxEntrants;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MaxLevel")
     * @Serializer\Type("integer")
     */
    protected $maxLevel;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MinClassRating")
     * @Serializer\Type("integer")
     */
    protected $minClassRating;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MinEntrants")
     * @Serializer\Type("integer")
     */
    protected $minEntrants;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MinLevel")
     * @Serializer\Type("integer")
     */
    protected $minLevel;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RegionLocalization")
     * @Serializer\Type("integer")
     */
    protected $regionLocalization;

    /**
     * @var RewardModesType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RewardModes")
     * @Serializer\Type("Speedfreak\Entities\Types\RewardModesType")
     */
    protected $rewardModes;

    /**
     * @var int
     * @Serializer\Exclude()
     */
    protected $rewardMode1;

    /**
     * @var int
     * @Serializer\Exclude()
     */
    protected $rewardMode2;

    /**
     * @var int
     * @Serializer\Exclude()
     */
    protected $rewardMode3;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("TimeLimit")
     * @Serializer\Type("integer")
     */
    protected $timeLimit;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("TrackLayoutMap")
     * @Serializer\Type("string")
     */
    protected $trackLayoutMap;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("TrackLocalization")
     * @Serializer\Type("integer")
     */
    protected $trackLocalization;

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
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @return int
     */
    public function getCarClassHash()
    {
        return $this->carClassHash;
    }

    /**
     * @param int $carClassHash
     */
    public function setCarClassHash($carClassHash)
    {
        $this->carClassHash = $carClassHash;
    }

    /**
     * @return int
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * @param int $coins
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;
    }

    /**
     * @return EngagePointType
     */
    public function getEngagePoint()
    {
        return $this->engagePoint;
    }

    /**
     * @param EngagePointType $engagePoint
     */
    public function setEngagePoint($engagePoint)
    {
        $this->engagePoint = $engagePoint;
    }

    /**
     * @return float
     */
    public function getEngagePointX()
    {
        return $this->engagePointX;
    }

    /**
     * @param float $engagePointX
     */
    public function setEngagePointX($engagePointX)
    {
        $this->engagePointX = $engagePointX;
    }

    /**
     * @return float
     */
    public function getEngagePointY()
    {
        return $this->engagePointY;
    }

    /**
     * @param float $engagePointY
     */
    public function setEngagePointY($engagePointY)
    {
        $this->engagePointY = $engagePointY;
    }

    /**
     * @return float
     */
    public function getEngagePointZ()
    {
        return $this->engagePointZ;
    }

    /**
     * @param float $engagePointZ
     */
    public function setEngagePointZ($engagePointZ)
    {
        $this->engagePointZ = $engagePointZ;
    }

    /**
     * @return int
     */
    public function getEventLocalization()
    {
        return $this->eventLocalization;
    }

    /**
     * @param int $eventLocalization
     */
    public function setEventLocalization($eventLocalization)
    {
        $this->eventLocalization = $eventLocalization;
    }

    /**
     * @return int
     */
    public function getEventModeDescriptionLocalization()
    {
        return $this->eventModeDescriptionLocalization;
    }

    /**
     * @param int $eventModeDescriptionLocalization
     */
    public function setEventModeDescriptionLocalization($eventModeDescriptionLocalization)
    {
        $this->eventModeDescriptionLocalization = $eventModeDescriptionLocalization;
    }

    /**
     * @return string
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param string $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }

    /**
     * @return string
     */
    public function getIsLocked()
    {
        return $this->isLocked;
    }

    /**
     * @param string $isLocked
     */
    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;
    }

    /**
     * @return int
     */
    public function getLaps()
    {
        return $this->laps;
    }

    /**
     * @param int $laps
     */
    public function setLaps($laps)
    {
        $this->laps = $laps;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return int
     */
    public function getMaxClassRating()
    {
        return $this->maxClassRating;
    }

    /**
     * @param int $maxClassRating
     */
    public function setMaxClassRating($maxClassRating)
    {
        $this->maxClassRating = $maxClassRating;
    }

    /**
     * @return int
     */
    public function getMaxEntrants()
    {
        return $this->maxEntrants;
    }

    /**
     * @param int $maxEntrants
     */
    public function setMaxEntrants($maxEntrants)
    {
        $this->maxEntrants = $maxEntrants;
    }

    /**
     * @return int
     */
    public function getMaxLevel()
    {
        return $this->maxLevel;
    }

    /**
     * @param int $maxLevel
     */
    public function setMaxLevel($maxLevel)
    {
        $this->maxLevel = $maxLevel;
    }

    /**
     * @return int
     */
    public function getMinClassRating()
    {
        return $this->minClassRating;
    }

    /**
     * @param int $minClassRating
     */
    public function setMinClassRating($minClassRating)
    {
        $this->minClassRating = $minClassRating;
    }

    /**
     * @return int
     */
    public function getMinEntrants()
    {
        return $this->minEntrants;
    }

    /**
     * @param int $minEntrants
     */
    public function setMinEntrants($minEntrants)
    {
        $this->minEntrants = $minEntrants;
    }

    /**
     * @return int
     */
    public function getMinLevel()
    {
        return $this->minLevel;
    }

    /**
     * @param int $minLevel
     */
    public function setMinLevel($minLevel)
    {
        $this->minLevel = $minLevel;
    }

    /**
     * @return int
     */
    public function getRegionLocalization()
    {
        return $this->regionLocalization;
    }

    /**
     * @param int $regionLocalization
     */
    public function setRegionLocalization($regionLocalization)
    {
        $this->regionLocalization = $regionLocalization;
    }

    /**
     * @return RewardModesType
     */
    public function getRewardModes()
    {
        return $this->rewardModes;
    }

    /**
     * @param RewardModesType $rewardModes
     */
    public function setRewardModes($rewardModes)
    {
        $this->rewardModes = $rewardModes;
    }

    /**
     * @return int
     */
    public function getRewardMode1()
    {
        return $this->rewardMode1;
    }

    /**
     * @param int $rewardMode1
     */
    public function setRewardMode1($rewardMode1)
    {
        $this->rewardMode1 = $rewardMode1;
    }

    /**
     * @return int
     */
    public function getRewardMode2()
    {
        return $this->rewardMode2;
    }

    /**
     * @param int $rewardMode2
     */
    public function setRewardMode2($rewardMode2)
    {
        $this->rewardMode2 = $rewardMode2;
    }

    /**
     * @return int
     */
    public function getRewardMode3()
    {
        return $this->rewardMode3;
    }

    /**
     * @param int $rewardMode3
     */
    public function setRewardMode3($rewardMode3)
    {
        $this->rewardMode3 = $rewardMode3;
    }

    /**
     * @return int
     */
    public function getTimeLimit()
    {
        return $this->timeLimit;
    }

    /**
     * @param int $timeLimit
     */
    public function setTimeLimit($timeLimit)
    {
        $this->timeLimit = $timeLimit;
    }

    /**
     * @return string
     */
    public function getTrackLayoutMap()
    {
        return $this->trackLayoutMap;
    }

    /**
     * @param string $trackLayoutMap
     */
    public function setTrackLayoutMap($trackLayoutMap)
    {
        $this->trackLayoutMap = $trackLayoutMap;
    }

    /**
     * @return int
     */
    public function getTrackLocalization()
    {
        return $this->trackLocalization;
    }

    /**
     * @param int $trackLocalization
     */
    public function setTrackLocalization($trackLocalization)
    {
        $this->trackLocalization = $trackLocalization;
    }

    /**
     * @return int
     */
    public function getEventModeIcon()
    {
        return $this->eventModeIcon;
    }

    /**
     * @param int $eventModeIcon
     */
    public function setEventModeIcon($eventModeIcon)
    {
        $this->eventModeIcon = $eventModeIcon;
    }

    /**
     * @return int
     */
    public function getEventModeId()
    {
        return $this->eventModeId;
    }

    /**
     * @param int $eventModeId
     */
    public function setEventModeId($eventModeId)
    {
        $this->eventModeId = $eventModeId;
    }

    /**
     * @return int
     */
    public function getEventModeLocalization()
    {
        return $this->eventModeLocalization;
    }

    /**
     * @param int $eventModeLocalization
     */
    public function setEventModeLocalization($eventModeLocalization)
    {
        $this->eventModeLocalization = $eventModeLocalization;
    }
}