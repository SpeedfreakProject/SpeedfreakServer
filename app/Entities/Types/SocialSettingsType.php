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
 * Class SocialSettingsType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="SocialSettings")
 */
class SocialSettingsType
{
    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("AppearOffline")
     */
    protected $appearOffline = false;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DeclineGroupInvite")
     */
    protected $declineGroupInvite = 0;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DeclineIncommingFriendRequests")
     */
    protected $declineIncommingFriendRequests = false;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DeclinePrivateInvite")
     */
    protected $declinePrivateInvite = 0;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("HideOfflineFriends")
     */
    protected $hideOfflineFriends = false;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ShowNewsOnSignIn")
     */
    protected $showNewsOnSignIn = false;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ShowOnlyPlayersInSameChatChannel")
     */
    protected $showOnlyPlayersInSameChatChannel = false;

    /**
     * SocialSettingsType constructor.
     * @param bool $appearOffline
     * @param int $declineGroupInvite
     * @param bool $declineIncommingFriendRequests
     * @param int $declinePrivateInvite
     * @param bool $hideOfflineFriends
     * @param bool $showNewsOnSignIn
     * @param bool $showOnlyPlayersInSameChatChannel
     */
    public function __construct(
        bool $appearOffline = false,
        int $declineGroupInvite = 0,
        bool $declineIncommingFriendRequests = false,
        int $declinePrivateInvite = 0,
        bool $hideOfflineFriends = false,
        bool $showNewsOnSignIn = false,
        bool $showOnlyPlayersInSameChatChannel = false
    ) {
        $this->appearOffline = $appearOffline;
        $this->declineGroupInvite = $declineGroupInvite;
        $this->declineIncommingFriendRequests = $declineIncommingFriendRequests;
        $this->declinePrivateInvite = $declinePrivateInvite;
        $this->hideOfflineFriends = $hideOfflineFriends;
        $this->showNewsOnSignIn = $showNewsOnSignIn;
        $this->showOnlyPlayersInSameChatChannel = $showOnlyPlayersInSameChatChannel;
    }

    /**
     * @return boolean
     */
    public function isAppearOffline()
    {
        return $this->appearOffline;
    }

    /**
     * @param boolean $appearOffline
     */
    public function setAppearOffline($appearOffline)
    {
        $this->appearOffline = $appearOffline;
    }

    /**
     * @return int
     */
    public function getDeclineGroupInvite()
    {
        return $this->declineGroupInvite;
    }

    /**
     * @param int $declineGroupInvite
     */
    public function setDeclineGroupInvite($declineGroupInvite)
    {
        $this->declineGroupInvite = $declineGroupInvite;
    }

    /**
     * @return boolean
     */
    public function isDeclineIncommingFriendRequests()
    {
        return $this->declineIncommingFriendRequests;
    }

    /**
     * @param boolean $declineIncommingFriendRequests
     */
    public function setDeclineIncommingFriendRequests($declineIncommingFriendRequests)
    {
        $this->declineIncommingFriendRequests = $declineIncommingFriendRequests;
    }

    /**
     * @return int
     */
    public function getDeclinePrivateInvite()
    {
        return $this->declinePrivateInvite;
    }

    /**
     * @param int $declinePrivateInvite
     */
    public function setDeclinePrivateInvite($declinePrivateInvite)
    {
        $this->declinePrivateInvite = $declinePrivateInvite;
    }

    /**
     * @return boolean
     */
    public function isHideOfflineFriends()
    {
        return $this->hideOfflineFriends;
    }

    /**
     * @param boolean $hideOfflineFriends
     */
    public function setHideOfflineFriends($hideOfflineFriends)
    {
        $this->hideOfflineFriends = $hideOfflineFriends;
    }

    /**
     * @return boolean
     */
    public function isShowNewsOnSignIn()
    {
        return $this->showNewsOnSignIn;
    }

    /**
     * @param boolean $showNewsOnSignIn
     */
    public function setShowNewsOnSignIn($showNewsOnSignIn)
    {
        $this->showNewsOnSignIn = $showNewsOnSignIn;
    }

    /**
     * @return boolean
     */
    public function isShowOnlyPlayersInSameChatChannel()
    {
        return $this->showOnlyPlayersInSameChatChannel;
    }

    /**
     * @param boolean $showOnlyPlayersInSameChatChannel
     */
    public function setShowOnlyPlayersInSameChatChannel($showOnlyPlayersInSameChatChannel)
    {
        $this->showOnlyPlayersInSameChatChannel = $showOnlyPlayersInSameChatChannel;
    }
}