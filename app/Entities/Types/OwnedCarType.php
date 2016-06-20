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
 * Class OwnedCarType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="OwnedCarTrans")
 */
class OwnedCarType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Durability")
     */
    protected $durability;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Heat")
     */
    protected $heat;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ExpirationDate")
     */
    protected $expirationDate;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("UniqueCarId")
     */
    protected $uniqueCarId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("OwnershipType")
     */
    protected $ownershipType;

    /**
     * @var CustomCarType[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CustomCars")
     * @Serializer\XmlList(entry="CustomCarTrans")
     */
    protected $customCars;

    /**
     * @var CustomCarType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CustomCar")
     */
    protected $customCar;

    /**
     * @return int
     */
    public function getDurability()
    {
        return $this->durability;
    }

    /**
     * @param int $durability
     */
    public function setDurability($durability)
    {
        $this->durability = $durability;
    }

    /**
     * @return int
     */
    public function getHeat()
    {
        return $this->heat;
    }

    /**
     * @param int $heat
     */
    public function setHeat($heat)
    {
        $this->heat = $heat;
    }

    /**
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return int
     */
    public function getUniqueCarId()
    {
        return $this->uniqueCarId;
    }

    /**
     * @param int $uniqueCarId
     */
    public function setUniqueCarId($uniqueCarId)
    {
        $this->uniqueCarId = $uniqueCarId;
    }

    /**
     * @return string
     */
    public function getOwnershipType()
    {
        return $this->ownershipType;
    }

    /**
     * @param string $ownershipType
     */
    public function setOwnershipType($ownershipType)
    {
        $this->ownershipType = $ownershipType;
    }

    /**
     * @return CustomCarType[]
     */
    public function getCustomCars()
    {
        return $this->customCars;
    }

    /**
     * @param CustomCarType[] $customCars
     */
    public function setCustomCars($customCars)
    {
        $this->customCars = $customCars;
    }

    /**
     * @return CustomCarType
     */
    public function getCustomCar()
    {
        return $this->customCar;
    }

    /**
     * @param CustomCarType $customCar
     */
    public function setCustomCar($customCar)
    {
        $this->customCar = $customCar;
    }
}