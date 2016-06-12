<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use Speedfreak\Entities\Types\LobbyInfoType;

class Lobby extends Model
{
    protected $dates = ['lobbyDateTimeStart'];

    public function entrants()
    {
        return $this->hasMany(LobbyEntrant::class);
    }

    public function event()
    {
        return $this->belongsTo(EventDefinition::class);
    }

    public function getLobbyType()
    {
        $info = new LobbyInfoType;
        $info->setEvent($this->event->getType());
        $info->setLobbyDateTimeStart($this->lobbyDateTimeStart);

        return $info;
    }
}
