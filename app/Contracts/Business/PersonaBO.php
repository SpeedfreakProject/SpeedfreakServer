<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Business;

use Speedfreak\Entities\OwnedCar;
use Speedfreak\Entities\Types\ArrayOfOwnedCarTransType;
use Speedfreak\Entities\Types\CarSlotInfoTrans;
use Speedfreak\Entities\Types\CommerceSessionResultTransType;
use Speedfreak\Entities\Types\UpdatedCarType;

interface PersonaBO
{
    public function carslots(int $personaId) : CarSlotInfoTrans;

    public function commerce(int $personaId, UpdatedCarType $updatedCar) : CommerceSessionResultTransType;

    public function basket(int $personaId, string $productId) : CommerceSessionResultTransType;

    public function defaultCar(int $personaId);

    public function changeDefaultCar(int $personaId, int $defaultCarId);

    public function getCars(int $personaId) : ArrayOfOwnedCarTransType;

    public function sellCar(int $personaId, int $carId);
}