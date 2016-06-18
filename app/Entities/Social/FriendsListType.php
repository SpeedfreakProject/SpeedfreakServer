<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Social;

use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\Types\PersonaBaseType;

/**
 * Class PersonaFriendsListType
 * @package Speedfreak\Entities\Social
 */
class FriendsListType
{
    /**
     * @var FriendPersonaType[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(entry="FriendPersona",inline=true)
     * @Serializer\SerializedName("friendPersona")
     */
    protected $friendPersona = [];

    /**
     * PersonaFriendsListType constructor.
     * @param FriendPersonaType[] $friendPersona
     */
    public function __construct(array $friendPersona = [])
    {
        $this->friendPersona = $friendPersona;
    }

    /**
     * @return FriendPersonaType[]
     */
    public function getFriendPersona() : array
    {
        return $this->friendPersona;
    }

    /**
     * @param FriendPersonaType[] $friendPersona
     */
    public function setFriendPersona(array $friendPersona)
    {
        $this->friendPersona = $friendPersona;
    }
}