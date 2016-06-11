<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Speedfreak\Contracts\Repositories\OwnedCarRepository as Contract;
use Speedfreak\Entities\OwnedCar;

class OwnedCarRepository implements Contract
{
    /**
     * Find an OwnedCar entity by its ID.
     *
     * @param int $id
     * @return OwnedCar
     */
    public function findById(int $id) : OwnedCar
    {
        return OwnedCar::findByIdOrFail($id);
    }

    /**
     * Get all owned cars for the given persona ID.
     *
     * @param int $personaId
     * @return Collection|OwnedCar[]
     */
    public function findByPersonaId(int $personaId) : Collection
    {
        return OwnedCar::query()->where('personaId', '=', $personaId)
            ->get();
    }

    /**
     * Delete an OwnedCar entity with the given ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return OwnedCar::findByIdOrFail($id)->delete();
    }
}