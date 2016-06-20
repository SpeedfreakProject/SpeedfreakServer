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
use Speedfreak\Entities\Types\CommerceResultTransType;

interface INFSBasket
{
    /**
     * Process a string of basket XML.
     *
     * @param string $basketXml
     * @return void
     */
    public function processBasket(string $basketXml);

    /**
     * Purchase a car.
     *
     * @param Persona $persona
     * @param string $productId
     * @return CommerceResultTransType
     */
    public function purchaseCar(Persona $persona, string $productId);

    /**
     * Sell a car by its serial number.
     * Requires passing in the persona that owns the car
     * so we don't get people selling someone else's cars.
     * That would *not* be good.
     *
     * @param Persona $persona
     * @param int $serialNumber
     * @return bool
     */
    public function sellCar(Persona $persona, int $serialNumber) : bool;

    /**
     * Map a basket ID to the appropriate category ID.
     *
     * @param string $basketId
     * @return string|null
     */
    public function mapBasketIdToCategory(string $basketId);
}