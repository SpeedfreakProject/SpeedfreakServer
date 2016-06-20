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
use Speedfreak\Contracts\Repositories\PersonaRepository as Contract;
use Speedfreak\Entities\Persona;

class PersonaRepository implements Contract
{
    /**
     * @param int $id
     * @return Persona
     */
    public function findById(int $id)
    {
        return Persona::findByIdOrFail($id)->fresh(['ownedCars', 'achievements', 'ranks', 'user']);
    }

    public function delete(int $id) : bool
    {
        return Persona::findByIdOrFail($id)->delete();
    }

    public function existsByName(string $name) : bool
    {
        return Persona::query()->where('name', '=', $name)
            ->get()
            ->count() > 0;
    }

    public function findByUserId(int $userId) : Collection
    {
        return Persona::query()->where('userId', '=', $userId)
            ->get();
    }

    public function findByName(string $name)
    {
        return Persona::query()->where('name', '=', $name)
            ->first();
    }

    public function updateStatusMessage(int $personaId, string $statusMessage)
    {
        $persona = $this->findById($personaId);

        if ($persona) {
            $persona->forceFill(['motto' => $statusMessage])->save();
        }

        return $persona->fresh();
    }
}