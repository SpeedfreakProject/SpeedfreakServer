<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Commerce;

use Speedfreak\Entities\Persona;

interface INFSEconomy
{
    const CURRENCY_IGC = 0;
    const CURRENCY_BOOST = 1;

    /**
     * Determine if the given persona has enough of the given currency.
     * Accepts an integer (the amount) and a string the (currency type) as extra parameters.
     * By default, the amount is 0 and the type is in-game currency.
     *
     * @param Persona $persona
     * @param int $amount
     * @param int $type
     * @return bool
     */
    public function hasEnough(Persona $persona, int $amount = 0, int $type = self::CURRENCY_IGC) : bool;

    /**
     * Execute an economy transaction.
     * This can only be called by the server (it's not an exposed route), so there hopefully won't be an issue
     * with players exploiting the amount of currency they have.
     *
     * @param Persona $persona
     * @param int $amount
     * @param int $type
     * @param bool $remove
     * @return bool
     */
    public function transaction(Persona $persona, int $amount, int $type, bool $remove = true) : bool;

    /**
     * Add the cost of a product onto the current cost.
     *
     * @param string $catalogName
     * @param string $productId
     * @return void
     */
    public function addCommerce(string $catalogName, string $productId);
}