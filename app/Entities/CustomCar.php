<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\Converters\PaintsConverter;
use Speedfreak\Entities\Converters\PerformancePartsConverter;
use Speedfreak\Entities\Converters\SkillModPartsConverter;
use Speedfreak\Entities\Converters\VinylsConverter;
use Speedfreak\Entities\Converters\VisualPartsConverter;
use Speedfreak\Entities\Types\CustomCarType;
use Speedfreak\Entities\Types\PaintsType;
use Speedfreak\Entities\Types\PerformancePartsType;
use Speedfreak\Entities\Types\SkillModPartsType;
use Speedfreak\Entities\Types\VinylsType;
use Speedfreak\Entities\Types\VisualPartsType;
use Speedfreak\Entities\Utilities\Marshaller;

class CustomCar extends Model
{
    /**
     * Get the owned car record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ownedCar()
    {
        return $this->belongsTo(OwnedCar::class, 'idParentOwnedCarTrans');
    }

    public function getPaintsAttribute($xml)
    {
        return (new PaintsConverter)->convertToEntityAttribute($xml);
    }

    public function setPaintsAttribute(PaintsType $paints)
    {
        $this->attributes['paints'] = (new PaintsConverter)->convertToDatabaseColumn($paints);
    }

    public function getPerformancePartsAttribute($xml)
    {
        return (new PerformancePartsConverter)->convertToEntityAttribute($xml);
    }

    public function setPerformancePartsAttribute(PerformancePartsType $performancePartsType)
    {
        $this->attributes['performanceParts'] = (new PerformancePartsConverter)->convertToDatabaseColumn($performancePartsType);
    }

    public function getSkillModPartsAttribute($xml)
    {
        return (new SkillModPartsConverter)->convertToEntityAttribute($xml);
    }

    public function setSkillModPartsAttribute(SkillModPartsType $skillModPartsType)
    {
        $this->attributes['skillModParts'] = (new SkillModPartsConverter)->convertToDatabaseColumn($skillModPartsType);
    }

    public function getVinylsAttribute($xml)
    {
        return (new VinylsConverter)->convertToEntityAttribute($xml);
    }

    public function setVinylsAttribute(VinylsType $vinylsType)
    {
        $this->attributes['vinyls'] = (new VinylsConverter)->convertToDatabaseColumn($vinylsType);
    }

    public function getVisualPartsAttribute($xml)
    {
        return (new VisualPartsConverter)->convertToEntityAttribute($xml);
    }

    public function setVisualPartsAttribute(VisualPartsType $visualPartsType)
    {
        $this->attributes['visualParts'] = (new VisualPartsConverter)->convertToDatabaseColumn($visualPartsType);
    }

    public function getCustomCarType() : CustomCarType
    {
        $result = new CustomCarType;
        $result->setApiId($this->apiId);
        $result->setBaseCarId($this->baseCarId);
        $result->setCarClassHash($this->carClassHash);
        $result->setPaints($this->paints);
        $result->setPerformanceParts($this->performanceParts);
        $result->setPhysicsProfileHash($this->physicsProfileHash);
        $result->setRating($this->rating);
        $result->setResalePrice($this->resalePrice);
        $result->setSkillModParts($this->skillModParts);
        $result->setSkillModSlotCount(5);
        $result->setVinyls($this->vinyls);
        $result->setVisualParts($this->visualParts);
        return $result;
    }
}
