<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Repositories;

use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Contracts\Repositories\BasketDefinitionRepository as Contract;
use Speedfreak\Entities\BasketDefinition;

class BasketDefinitionRepository implements Contract
{
    /**
     * Find a basket definition by its ID
     *
     * @param int $id
     * @return BasketDefinition
     */
    public function findById(int $id) : BasketDefinition
    {
        return BasketDefinition::findByIdOrFail($id);
    }

    /**
     * Find a basket definition by the associated product ID
     *
     * @param string $productId
     * @return BasketDefinition|null
     */
    public function findByProductId(string $productId)
    {
        return BasketDefinition::firstWhere([
            'productId' => $productId
        ]);
    }

    /**
     * do not do anything.
     *
     * @param int $id
     * @return bool
     * @throws EngineException
     */
    public function delete(int $id) : bool
    {
        throw new EngineException("nope");
    }
}