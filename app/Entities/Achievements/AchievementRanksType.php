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

class AchievementRanksType
{
    /**
     * @var AchievementRankPacketType[]
     * @Serializer\XmlList(entry="AchievementRankPacket",inline=true)
     */
    protected $ranks = [];

    /**
     * AchievementRanksType constructor.
     * @param AchievementRankPacketType[] $ranks
     */
    public function __construct(array $ranks = [])
    {
        $this->ranks = $ranks;
    }

    /**
     * @return AchievementRankPacketType[]
     */
    public function getRanks()
    {
        return $this->ranks;
    }

    /**
     * @param AchievementRankPacketType[] $ranks
     */
    public function setRanks(array $ranks)
    {
        $this->ranks = $ranks;
    }
}