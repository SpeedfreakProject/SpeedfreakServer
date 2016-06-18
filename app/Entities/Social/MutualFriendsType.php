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

/**
 * Class MutualFriendsType
 * @package Speedfreak\Entities\Social
 * @Serializer\XmlRoot(name="MutualFriendsType")
 */
class MutualFriendsType
{
    /**
     * @var FriendsListType[]
     * @Serializer\XmlList(entry="FriendsList",inline=true)
     */
    protected $friends;

    /**
     * MutualFriendsType constructor.
     * @param FriendsListType[] $friends
     */
    public function __construct(array $friends = [])
    {
        $this->friends = $friends;
    }

    /**
     * @return FriendsListType[]
     */
    public function getFriends() : array
    {
        return $this->friends;
    }

    /**
     * @param FriendsListType[] $friends
     */
    public function setFriends(array $friends)
    {
        $this->friends = $friends;
    }
}