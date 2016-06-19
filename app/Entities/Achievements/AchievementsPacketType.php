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

/**
 * Class AchievementsPacketType
 * @package Speedfreak\Entities\Achievements
 * @Serializer\XmlRoot(name="AchievementsPacket")
 */
class AchievementsPacketType
{
    /**
     * @var DefinitionsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Definitions")
     */
    protected $definitions;

    /**
     * @var BadgesType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Badges")
     */
    protected $badges;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PersonaId")
     */
    protected $personaId = 'RELAYPERSONA';

    /**
     * AchievementsPacketType constructor.
     * @param DefinitionsType $definitions
     * @param BadgesType $badges
     */
    public function __construct(DefinitionsType $definitions = null, BadgesType $badges = null)
    {
        $this->definitions = $definitions ?: new DefinitionsType;
        $this->badges = $badges ?: new BadgesType;
    }

    /**
     * @return DefinitionsType
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param DefinitionsType $definitions
     */
    public function setDefinitions($definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @return BadgesType
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param BadgesType $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
    }
}