<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Achievements;

use JMS\Serializer\Annotation as Serializer;

class AchievementRankPacketType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("AchievedOn")
     */
    protected $achievedOn = '9999-12-31T11:59:59.999';

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("AchievementRankId")
     */
    protected $achievementRankId = -1;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsRare")
     */
    protected $isRare = false;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Points")
     */
    protected $points = 50;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Rank")
     */
    protected $rank = 0;

    /**
     * @var float
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Rarity")
     */
    protected $rarity = 0.000007331;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RewardDescription")
     */
    protected $rewardDescription = '';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RewardType")
     */
    protected $rewardType = 'cash';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RewardVisualStyle")
     */
    protected $rewardVisualStyle = 'achievements_rewards';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("State")
     */
    protected $state = 'Locked';

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ThresholdValue")
     */
    protected $thresholdValue = 1337;

    /**
     * AchievementRankPacketType constructor.
     * @param string $achievedOn
     * @param int $achievementRankId
     * @param bool $isRare
     * @param int $rank
     * @param int $points
     * @param float $rarity
     * @param string $rewardDescription
     * @param string $rewardType
     * @param string $rewardVisualStyle
     * @param string $state
     * @param int $thresholdValue
     */
    public function __construct(
        string $achievedOn = '9999-12-31T11:59:59.999',
        int $achievementRankId = -1,
        bool $isRare = false,
        int $rank = 0,
        int $points = 50,
        float $rarity = 0.000007331,
        string $rewardDescription = '',
        string $rewardType = 'cash',
        string $rewardVisualStyle = 'achievements_rewards',
        string $state = 'Locked',
        int $thresholdValue = 1337
    ) {
        $this->achievedOn = $achievedOn;
        $this->achievementRankId = $achievementRankId;
        $this->isRare = $isRare;
        $this->rank = $rank;
        $this->points = $points;
        $this->rarity = $rarity;
        $this->rewardDescription = $rewardDescription;
        $this->rewardType = $rewardType;
        $this->rewardVisualStyle = $rewardVisualStyle;
        $this->state = $state;
        $this->thresholdValue = $thresholdValue;
    }

    /**
     * @return string
     */
    public function getAchievedOn()
    {
        return $this->achievedOn;
    }

    /**
     * @param string $achievedOn
     */
    public function setAchievedOn($achievedOn)
    {
        $this->achievedOn = $achievedOn;
    }

    /**
     * @return int
     */
    public function getAchievementRankId()
    {
        return $this->achievementRankId;
    }

    /**
     * @param int $achievementRankId
     */
    public function setAchievementRankId($achievementRankId)
    {
        $this->achievementRankId = $achievementRankId;
    }

    /**
     * @return boolean
     */
    public function isIsRare()
    {
        return $this->isRare;
    }

    /**
     * @param boolean $isRare
     */
    public function setIsRare($isRare)
    {
        $this->isRare = $isRare;
    }

    /**
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return float
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param float $rarity
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
    }

    /**
     * @return string
     */
    public function getRewardDescription()
    {
        return $this->rewardDescription;
    }

    /**
     * @param string $rewardDescription
     */
    public function setRewardDescription($rewardDescription)
    {
        $this->rewardDescription = $rewardDescription;
    }

    /**
     * @return string
     */
    public function getRewardType()
    {
        return $this->rewardType;
    }

    /**
     * @param string $rewardType
     */
    public function setRewardType($rewardType)
    {
        $this->rewardType = $rewardType;
    }

    /**
     * @return string
     */
    public function getRewardVisualStyle()
    {
        return $this->rewardVisualStyle;
    }

    /**
     * @param string $rewardVisualStyle
     */
    public function setRewardVisualStyle($rewardVisualStyle)
    {
        $this->rewardVisualStyle = $rewardVisualStyle;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getThresholdValue()
    {
        return $this->thresholdValue;
    }

    /**
     * @param int $thresholdValue
     */
    public function setThresholdValue($thresholdValue)
    {
        $this->thresholdValue = $thresholdValue;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }
}