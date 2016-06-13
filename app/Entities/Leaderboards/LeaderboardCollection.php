<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Leaderboards;

use Illuminate\Support\Collection;
use Speedfreak\Entities\Persona;

class LeaderboardCollection extends Collection
{
    /**
     * Override the all() method to automatically sort data.
     * I mean, this IS a leaderboard.
     *
     * @return array
     */
    public function all()
    {
        return collect($this->items)
            ->sortByDesc(function(Persona $persona) {
                return $persona->level;
            })->values()->all();
    }
}