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
 * Class UserSettingsType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="User_Settings")
 */
class UserSettingsType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CarCacheAgeLimit")
     */
    protected $carCacheAgeLimit = 600;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsRaceNowEnabled")
     */
    protected $isRaceNowEnabled = false;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MaxCarCacheSize")
     */
    protected $maxCarCacheSize = 250;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MinRaceNowLevel")
     */
    protected $minRaceNowLevel = 100;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("VoipAvailable")
     */
    protected $voipAvailable = false;

    /**
     * @var string[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("activatedHolidaySceneryGroups")
     * @Serializer\XmlList(entry="string")
     */
    protected $activatedHolidaySceneryGroups = ['SCENERY_GROUP_CHRISTMAS'];

    /**
     * @var int[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("activeHolidayIds")
     * @Serializer\XmlList(entry="long")
     */
    protected $activeHolidayIds = [0];

    /**
     * @var string[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("disactivatedHolidaySceneryGroups")
     * @Serializer\XmlList(entry="string")
     */
    protected $disactivatedHolidaySceneryGroups = ['SCENERY_GROUP_CHRISTMAS_DISABLE'];

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("firstTimeLogin")
     */
    protected $firstTimeLogin = false;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("maxLevel")
     */
    protected $maxLevel = 70;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("starterPackApplied")
     */
    protected $starterPackApplied = false;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("userId")
     */
    protected $userId = 1;
}