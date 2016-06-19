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

class DefinitionsType
{
    /**
     * @var AchievementDefinitionPacketType[]
     * @Serializer\XmlList(inline=true,entry="AchievementDefinitionPacket")
     */
    protected $achievements = [];

    /**
     * DefinitionsType constructor.
     * @param AchievementDefinitionPacketType[] $achievements
     */
    public function __construct(array $achievements = [])
    {
        $this->achievements = $achievements;
    }

    /**
     * @return AchievementDefinitionPacketType[]
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * @param AchievementDefinitionPacketType[] $achievements
     */
    public function setAchievements(array $achievements)
    {
        $this->achievements = $achievements;
    }
}