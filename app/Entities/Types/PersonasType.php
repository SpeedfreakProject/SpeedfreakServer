<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class PersonasType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\AccessorOrder("custom", custom={"profileData"})
 */
class PersonasType
{
    /**
     * @var ProfileDataType[]
     * @Serializer\XmlList(inline=true,entry="ProfileData")
     * @Serializer\SerializedName(value="ProfileData")
     */
    private $profileData;

    /**
     * @return ProfileDataType[]
     */
    public function getProfileData() : array
    {
        if (!$this->profileData) $this->profileData = [];

        return $this->profileData;
    }

    public function setProfileData(array $profileData = [])
    {
        $this->profileData = $profileData;
    }
}