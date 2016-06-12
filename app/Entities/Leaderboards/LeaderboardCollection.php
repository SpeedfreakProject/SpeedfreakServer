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
use Speedfreak\Entities\Types\PersonaBaseType;

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
        $value = $this->map(function(Persona $persona) {
            $type = new PersonaBaseType();

            $type->setPersonaId($persona->getKey());
            $type->setBadges('');
            $type->setIconIndex($persona->iconIndex);
            $type->setLevel($persona->level);
            $type->setMotto($persona->motto);
            $type->setName($persona->name);
            $type->setPresence(1);
            $type->setScore($persona->score);
            $type->setUserId($persona->user_id);
            $type->setRep($persona->getRep());
            $type->setRepAtCurrentLevel($persona->getRepAtCurrentLevel());

            return $type;
        })->sortByDesc(function(PersonaBaseType $persona) {
            return $persona->getLevel();
        })->take(5);

        return collect($value)->all();
    }
}