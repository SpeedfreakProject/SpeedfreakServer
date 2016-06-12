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

class CustomCarType
{
    /**
     * @var double
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("BaseCar")
     * @Serializer\Type("double")
     */
    protected $baseCarId;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CarClassHash")
     * @Serializer\Type("integer")
     */
    protected $carClassHash;

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsPreset")
     * @Serializer\Type("boolean")
     */
    protected $isPreset;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Level")
     * @Serializer\Type("integer")
     */
    protected $level;

    /**
     * @var double
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Name")
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @var double
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Id")
     * @Serializer\Type("double")
     */
    protected $apiId;

    /**
     * @var PaintsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Paints")
     * @Serializer\Type("Speedfreak\Entities\Types\PaintsType")
     */
    protected $paints;

    /**
     * @var PerformancePartsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PerformanceParts")
     * @Serializer\Type("Speedfreak\Entities\Types\PerformancePartsType")
     */
    protected $performanceParts;

    /**
     * @var double
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PhysicsProfileHash")
     * @Serializer\Type("double")
     */
    protected $physicsProfileHash;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Rating")
     * @Serializer\Type("string")
     */
    protected $rating;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ResalePrice")
     * @Serializer\Type("integer")
     */
    protected $resalePrice;

    /**
     * @var SkillModPartsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("SkillModParts")
     * @Serializer\Type("Speedfreak\Entities\Types\SkillModPartsType")
     */
    protected $skillModParts;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("SkillModSlotCount")
     * @Serializer\Type("integer")
     */
    protected $skillModSlotCount;

    /**
     * @var VinylsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Vinyls")
     * @Serializer\Type("Speedfreak\Entities\Types\VinylsType")
     */
    protected $vinyls;

    /**
     * @var VisualPartsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("VisualParts")
     * @Serializer\Type("Speedfreak\Entities\Types\VisualPartsType")
     */
    protected $visualParts;

    /**
     * @return float
     */
    public function getBaseCarId()
    {
        return $this->baseCarId;
    }

    /**
     * @param float $baseCarId
     */
    public function setBaseCarId($baseCarId)
    {
        $this->baseCarId = $baseCarId;
    }

    /**
     * @return int
     */
    public function getCarClassHash()
    {
        return $this->carClassHash;
    }

    /**
     * @param int $carClassHash
     */
    public function setCarClassHash($carClassHash)
    {
        $this->carClassHash = $carClassHash;
    }

    /**
     * @return boolean
     */
    public function isIsPreset()
    {
        return $this->isPreset;
    }

    /**
     * @param boolean $isPreset
     */
    public function setIsPreset($isPreset)
    {
        $this->isPreset = $isPreset;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return float
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param float $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getApiId()
    {
        return $this->apiId;
    }

    /**
     * @param float $apiId
     */
    public function setApiId($apiId)
    {
        $this->apiId = $apiId;
    }

    /**
     * @return PaintsType
     */
    public function getPaints()
    {
        return $this->paints;
    }

    /**
     * @param PaintsType $paints
     */
    public function setPaints($paints)
    {
        $this->paints = $paints;
    }

    /**
     * @return PerformancePartsType
     */
    public function getPerformanceParts()
    {
        return $this->performanceParts;
    }

    /**
     * @param PerformancePartsType $performanceParts
     */
    public function setPerformanceParts($performanceParts)
    {
        $this->performanceParts = $performanceParts;
    }

    /**
     * @return float
     */
    public function getPhysicsProfileHash()
    {
        return $this->physicsProfileHash;
    }

    /**
     * @param float $physicsProfileHash
     */
    public function setPhysicsProfileHash($physicsProfileHash)
    {
        $this->physicsProfileHash = $physicsProfileHash;
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getResalePrice()
    {
        return $this->resalePrice;
    }

    /**
     * @param int $resalePrice
     */
    public function setResalePrice($resalePrice)
    {
        $this->resalePrice = $resalePrice;
    }

    /**
     * @return SkillModPartsType
     */
    public function getSkillModParts()
    {
        return $this->skillModParts;
    }

    /**
     * @param SkillModPartsType $skillModParts
     */
    public function setSkillModParts($skillModParts)
    {
        $this->skillModParts = $skillModParts;
    }

    /**
     * @return int
     */
    public function getSkillModSlotCount()
    {
        return $this->skillModSlotCount;
    }

    /**
     * @param int $skillModSlotCount
     */
    public function setSkillModSlotCount($skillModSlotCount)
    {
        $this->skillModSlotCount = $skillModSlotCount;
    }

    /**
     * @return VinylsType
     */
    public function getVinyls()
    {
        return $this->vinyls;
    }

    /**
     * @param VinylsType $vinyls
     */
    public function setVinyls($vinyls)
    {
        $this->vinyls = $vinyls;
    }

    /**
     * @return VisualPartsType
     */
    public function getVisualParts()
    {
        return $this->visualParts;
    }

    /**
     * @param VisualPartsType $visualParts
     */
    public function setVisualParts($visualParts)
    {
        $this->visualParts = $visualParts;
    }
}