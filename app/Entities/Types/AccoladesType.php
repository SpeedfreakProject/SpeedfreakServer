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

class AccoladesType
{
    /**
     * @var FinalRewardsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("FinalRewards")
     */
    protected $finalRewards;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("HasLeveledUp")
     */
    protected $hasLeveledUp;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("LuckyDrawInfo")
     */
    protected $luckyDrawInfo;

    /**
     * @var OriginalRewardsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("OriginalRewards")
     */
    protected $originalRewards;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RewardInfo")
     */
    protected $rewardInfo;

    /**
     * @return FinalRewardsType
     */
    public function getFinalRewards()
    {
        return $this->finalRewards;
    }

    /**
     * @param FinalRewardsType $finalRewards
     */
    public function setFinalRewards($finalRewards)
    {
        $this->finalRewards = $finalRewards;
    }

    /**
     * @return string
     */
    public function getHasLeveledUp()
    {
        return $this->hasLeveledUp;
    }

    /**
     * @param string $hasLeveledUp
     */
    public function setHasLeveledUp($hasLeveledUp)
    {
        $this->hasLeveledUp = $hasLeveledUp;
    }

    /**
     * @return string
     */
    public function getLuckyDrawInfo()
    {
        return $this->luckyDrawInfo;
    }

    /**
     * @param string $luckyDrawInfo
     */
    public function setLuckyDrawInfo($luckyDrawInfo)
    {
        $this->luckyDrawInfo = $luckyDrawInfo;
    }

    /**
     * @return OriginalRewardsType
     */
    public function getOriginalRewards()
    {
        return $this->originalRewards;
    }

    /**
     * @param OriginalRewardsType $originalRewards
     */
    public function setOriginalRewards($originalRewards)
    {
        $this->originalRewards = $originalRewards;
    }

    /**
     * @return string
     */
    public function getRewardInfo()
    {
        return $this->rewardInfo;
    }

    /**
     * @param string $rewardInfo
     */
    public function setRewardInfo($rewardInfo)
    {
        $this->rewardInfo = $rewardInfo;
    }
}