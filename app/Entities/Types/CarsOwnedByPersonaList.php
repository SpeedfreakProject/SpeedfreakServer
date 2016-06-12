<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\OwnedCar;

class CarsOwnedByPersonaList
{
    /**
     * @var OwnedCar[]
     * @Serializer\XmlList(entry="OwnedCarTrans", inline=true)
     */
    protected $ownedCarList = [];

    /**
     * @return \Speedfreak\Entities\OwnedCar[]
     */
    public function getOwnedCarList()
    {
        return $this->ownedCarList;
    }

    /**
     * @param \Speedfreak\Entities\OwnedCar[] $ownedCarList
     */
    public function setOwnedCarList(array $ownedCarList)
    {
        $this->ownedCarList = $ownedCarList;
    }

    /**
     * @param OwnedCar $ownedCar
     */
    public function add(OwnedCar $ownedCar)
    {
        $this->ownedCarList[] = $ownedCar;
    }
}