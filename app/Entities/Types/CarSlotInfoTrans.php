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

/**
 * Class CarSlotInfoTrans
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="CarSlotInfoTrans")
 */
class CarSlotInfoTrans
{
    /**
     * @var CarsOwnedByPersonaList
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("Speedfreak\Entities\Types\CarsOwnedByPersonaList")
     * @Serializer\SerializedName("CarsOwnedByPersona")
     */
    private $carsOwnedByPersonaList;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DefaultOwnedCarIndex")
     */
    private $defaultOwnedCarIndex;

    /**
     * @var ObtainableSlotsList
     * @Serializer\Type("Speedfreak\Entities\Types\ObtainableSlotsList")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ObtainableSlots")
     */
    private $obtainableSlots;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("OwnedCarSlotsCount")
     * @Serializer\Type("integer")
     */
    private $ownedCarSlotsCount;

    /**
     * CarSlotInfoTrans constructor.
     */
    public function __construct()
    {
        $this->carsOwnedByPersonaList = new CarsOwnedByPersonaList();
    }

    /**
     * @return CarsOwnedByPersonaList
     */
    public function getCarsOwnedByPersonaList() : CarsOwnedByPersonaList
    {
        return $this->carsOwnedByPersonaList;
    }

    /**
     * @param CarsOwnedByPersonaList $carsOwnedByPersonaList
     */
    public function setCarsOwnedByPersonaList(CarsOwnedByPersonaList $carsOwnedByPersonaList)
    {
        $this->carsOwnedByPersonaList = $carsOwnedByPersonaList;
    }

    /**
     * @return int
     */
    public function getDefaultOwnedCarIndex()
    {
        return $this->defaultOwnedCarIndex;
    }

    /**
     * @param int $defaultOwnedCarIndex
     */
    public function setDefaultOwnedCarIndex(int $defaultOwnedCarIndex)
    {
        $this->defaultOwnedCarIndex = $defaultOwnedCarIndex;
    }

    /**
     * @return ObtainableSlotsList
     */
    public function getObtainableSlots() : ObtainableSlotsList
    {
        return $this->obtainableSlots;
    }

    /**
     * @param ObtainableSlotsList $obtainableSlots
     */
    public function setObtainableSlots(ObtainableSlotsList $obtainableSlots)
    {
        $this->obtainableSlots = $obtainableSlots;
    }

    /**
     * @return int
     */
    public function getOwnedCarSlotsCount()
    {
        return $this->ownedCarSlotsCount;
    }

    /**
     * @param int $ownedCarSlotsCount
     */
    public function setOwnedCarSlotsCount(int $ownedCarSlotsCount)
    {
        $this->ownedCarSlotsCount = $ownedCarSlotsCount;
    }
}