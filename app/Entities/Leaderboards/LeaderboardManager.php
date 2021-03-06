<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Leaderboards;

use Speedfreak\Entities\Persona;

class LeaderboardManager
{
    /**
     * Get the top-five drivers.
     *
     * @param int $items
     * @return LeaderboardCollection
     */
    public function getTopFive(int $items = 5) : LeaderboardCollection
    {
        return new LeaderboardCollection(Persona::all()->take($items));
    }
}