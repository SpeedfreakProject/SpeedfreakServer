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
 * Class UserInfoType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\XmlRoot(name="UserInfo")
 * @Serializer\AccessorOrder("custom", custom={ "defaultPersonaIdx", "personas", "user" })
 */
class UserInfoType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="defaultPersonaIdx")
     */
    private $defaultPersonaIdx;

    /**
     * @var PersonasType
     * @Serializer\XmlElement(cdata=false)
     */
    private $personas;

    /**
     * @var UserType
     * @Serializer\XmlElement(cdata=false)
     */
    private $user;

    /**
     * @return int
     */
    public function getDefaultPersonaIdx()
    {
        return $this->defaultPersonaIdx;
    }

    /**
     * @param int $defaultPersonaIdx
     */
    public function setDefaultPersonaIdx($defaultPersonaIdx)
    {
        $this->defaultPersonaIdx = $defaultPersonaIdx;
    }

    /**
     * @return PersonasType
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * @param PersonasType $personas
     */
    public function setPersonas($personas)
    {
        $this->personas = $personas;
    }

    /**
     * @return UserType
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserType $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}