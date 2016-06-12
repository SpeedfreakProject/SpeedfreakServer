<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Speedfreak\Contracts\Repositories\LobbyRepository as Contract;
use Speedfreak\Entities\EventDefinition;
use Speedfreak\Entities\Lobby;

class LobbyRepository implements Contract
{
    /**
     * @param int $id
     * @return \Speedfreak\Entities\Lobby
     */
    public function findById(int $id)
    {
        return Lobby::query()->findOrFail($id);
    }

    public function delete(int $id) : bool
    {
        return Lobby::query()->findOrFail($id)->delete();
    }

    public function findByEventStarted(int $eventId, Carbon $now, Carbon $past) : array
    {
        return Lobby::query()->whereHas('event', function(Builder $builder) use ($eventId) {
            $builder->where('id', '=', $eventId);
        })->get()->filter(function(EventDefinition $eventDefinition) use ($now, $past) {
            return $eventDefinition->lobbyDateTimeStart->gte($past) && $eventDefinition->lobbyDateTimeStart->lte($now);
        })->all();
    }
}