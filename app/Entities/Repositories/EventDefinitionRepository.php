<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Repositories;

use Speedfreak\Contracts\Repositories\EventDefinitionRepository as Contract;
use Speedfreak\Entities\EventDefinition;

class EventDefinitionRepository implements Contract
{
    public function findById(int $id) : EventDefinition
    {
        return EventDefinition::findByIdOrFail($id);
    }

    public function getAll() : array
    {
        return EventDefinition::all()->all();
    }

    public function delete(int $id) : bool
    {
        return false;
    }
}