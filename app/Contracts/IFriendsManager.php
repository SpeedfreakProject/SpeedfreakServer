<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts;

use Speedfreak\Entities\Social\MutualFriendsType;
use Speedfreak\Entities\Social\PersonaFriendsListType;

interface IFriendsManager
{
    /**
     * Check if a persona has been added as a friend by the given user.
     *
     * @param int $personaId
     * @param int $userId
     * @return bool
     */
    public function isFriend(int $personaId, int $userId) : bool;

    /**
     * Add a persona as a friend.
     *
     * @param int $personaId
     * @param int $userId
     * @param string $friendName
     * @return PersonaFriendsListType
     */
    public function addFriend(int $personaId, int $userId, string $friendName) : PersonaFriendsListType;

    /**
     * Remove a persona as a friend.
     *
     * @param int $personaId
     * @param int $userId
     * @return void
     */
    public function removeFriend(int $personaId, int $userId);
}