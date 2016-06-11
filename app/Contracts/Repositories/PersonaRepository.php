<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface PersonaRepository extends BaseRepository
{
    public function findById(int $id);

    public function delete(int $id) : bool;

    public function existsByName(string $name) : bool;

    public function findByUserId(int $userId) : Collection;

    public function findByName(string $name);

    public function updateStatusMessage(int $personaId, string $statusMessage);
}