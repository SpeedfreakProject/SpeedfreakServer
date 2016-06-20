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
use Speedfreak\Entities\Traits\IdLookup;
use Speedfreak\Entities\Types\OwnedCarType;

class OwnedCar extends Model
{
    use IdLookup;

    protected $primaryKey = 'uniqueCarId';

    protected $dates = ['expirationDate'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function(OwnedCar $car) {
            $car->customCar()->delete();
        });
    }

    /**
     * A persona owns a car.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'personaId');
    }

    /**
     * There can be many custom cars for an owned car.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customCar()
    {
        return $this->hasMany(CustomCar::class, 'idParentOwnedCarTrans');
    }

    public function getOwnedCarType() : OwnedCarType
    {
        $customTypes = collect($this->customCar)->map(function(CustomCar $customCar) {
            return $customCar->getCustomCarType();
        })->all();

        $type = new OwnedCarType;
        $type->setDurability($this->durability);
        $type->setExpirationDate($this->expirationDate ? $this->expirationDate->toDateTimeString() : null);
        $type->setHeat($this->heatLevel);
        $type->setOwnershipType($this->ownershipType);
        $type->setUniqueCarId($this->getKey());
        $type->setCustomCars($customTypes);

        return $type;
    }
}
