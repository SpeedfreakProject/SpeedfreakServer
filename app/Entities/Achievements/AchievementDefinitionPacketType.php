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

class AchievementDefinitionPacketType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("AchievementDefinitionId")
     */
    protected $achievementDefinitionId = -1;

    /**
     * @var AchievementRanksType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("AchievementRanks")
     */
    protected $achievementRanks;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("BadgeDefinitionId")
     */
    protected $badgeDefinitionId = -1;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CanProgress")
     */
    protected $canProgress = true;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CurrentValue")
     */
    protected $currentValue = 0;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsVisible")
     */
    protected $isVisible = true;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ProgressText")
     */
    protected $progressText = '';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("StatConversion")
     */
    protected $statConversion = 'None';

    /**
     * AchievementDefinitionPacketType constructor.
     * @param int $achievementDefinitionId
     * @param AchievementRanksType $achievementRanks
     * @param int $badgeDefinitionId
     * @param bool $canProgress
     * @param int $currentValue
     * @param bool $isVisible
     * @param string $progressText
     * @param string $statConversion
     */
    public function __construct(
        int $achievementDefinitionId = -1,
        AchievementRanksType $achievementRanks = null,
        int $badgeDefinitionId = -1,
        bool $canProgress = false,
        int $currentValue = 0,
        bool $isVisible = true,
        string $progressText = '',
        string $statConversion = 'None'
    ) {
        $this->achievementDefinitionId = $achievementDefinitionId;
        $this->achievementRanks = $achievementRanks ?: new AchievementRanksType;
        $this->badgeDefinitionId = $badgeDefinitionId;
        $this->canProgress = $canProgress;
        $this->currentValue = $currentValue;
        $this->isVisible = $isVisible;
        $this->progressText = $progressText;
        $this->statConversion = $statConversion;
    }

    /**
     * @return int
     */
    public function getAchievementDefinitionId()
    {
        return $this->achievementDefinitionId;
    }

    /**
     * @param int $achievementDefinitionId
     */
    public function setAchievementDefinitionId($achievementDefinitionId)
    {
        $this->achievementDefinitionId = $achievementDefinitionId;
    }

    /**
     * @return AchievementRanksType
     */
    public function getAchievementRanks()
    {
        return $this->achievementRanks;
    }

    /**
     * @param AchievementRanksType $achievementRanks
     */
    public function setAchievementRanks($achievementRanks)
    {
        $this->achievementRanks = $achievementRanks;
    }

    /**
     * @return int
     */
    public function getBadgeDefinitionId()
    {
        return $this->badgeDefinitionId;
    }

    /**
     * @param int $badgeDefinitionId
     */
    public function setBadgeDefinitionId($badgeDefinitionId)
    {
        $this->badgeDefinitionId = $badgeDefinitionId;
    }

    /**
     * @return boolean
     */
    public function isCanProgress()
    {
        return $this->canProgress;
    }

    /**
     * @param boolean $canProgress
     */
    public function setCanProgress($canProgress)
    {
        $this->canProgress = $canProgress;
    }

    /**
     * @return int
     */
    public function getCurrentValue()
    {
        return $this->currentValue;
    }

    /**
     * @param int $currentValue
     */
    public function setCurrentValue($currentValue)
    {
        $this->currentValue = $currentValue;
    }

    /**
     * @return boolean
     */
    public function isIsVisible()
    {
        return $this->isVisible;
    }

    /**
     * @param boolean $isVisible
     */
    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;
    }

    /**
     * @return string
     */
    public function getProgressText()
    {
        return $this->progressText;
    }

    /**
     * @param string $progressText
     */
    public function setProgressText($progressText)
    {
        $this->progressText = $progressText;
    }

    /**
     * @return string
     */
    public function getStatConversion()
    {
        return $this->statConversion;
    }

    /**
     * @param string $statConversion
     */
    public function setStatConversion($statConversion)
    {
        $this->statConversion = $statConversion;
    }
}