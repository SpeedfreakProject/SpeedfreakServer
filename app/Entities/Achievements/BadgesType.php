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

class BadgesType
{
    /**
     * @var BadgeDefinitionPacketType[]
     * @Serializer\XmlList(inline=true,entry="BadgeDefinitionPacket")
     */
    protected $badges = [];

    /**
     * BadgesType constructor.
     * @param BadgeDefinitionPacketType[] $badges
     */
    public function __construct(array $badges = [])
    {
        $this->badges = $badges;
    }

    /**
     * @return BadgeDefinitionPacketType[]
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param BadgeDefinitionPacketType[] $badges
     */
    public function setBadges(array $badges)
    {
        $this->badges = $badges;
    }
}