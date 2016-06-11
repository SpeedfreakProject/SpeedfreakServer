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
use Speedfreak\Traits\ValidationEntity;
use Speedfreak\Contracts\INFSWEntity;
use Speedfreak\Contracts\IValidationEntity;

class LobbyEntrant extends Model implements INFSWEntity, IValidationEntity
{
    use ValidationEntity;

    /**
     * @inheritdoc
     */
    public function getId() : int
    {
        return $this->getKey();
    }

    /**
     * Get the entrant's heat level.
     *
     * @return int
     */
    public function getHeat() : int
    {
        return $this->getAttribute('heat');
    }

    /**
     * Get the entrant's experience level.
     *
     * @return int
     */
    public function getLevel() : int
    {
        return $this->getAttribute('level');
    }

    /**
     * Get the persona record of the entrant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    /**
     * Get the lobby that the entrant is in.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lobby()
    {
        return $this->belongsTo(Lobby::class);
    }
}
