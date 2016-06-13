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
use Speedfreak\Entities\Traits\IdLookup;
use Speedfreak\Entities\Types\PersonaBaseType;
use Speedfreak\Traits\ValidationEntity;
use Speedfreak\Contracts\IValidationEntity;
use Speedfreak\User;

class Persona extends Model implements IValidationEntity
{
    use ValidationEntity, IdLookup;

    /**
     * A persona belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * A persona owns many cars.
     * Owned cars are UNIQUE FOR PERSONAS!
     *
     * Just making this a HasMany because I don't feel like
     * screwing around with BelongsToMany.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedCars()
    {
        return $this->hasMany(OwnedCar::class);
    }

    /**
     * Get the persona's reputation.
     *
     * @return float
     */
    public function getRep() : float
    {
        return $this->rep;
    }

    /**
     * Get the persona's reputation at their current level.
     *
     * @return float
     */
    public function getRepAtCurrentLevel() : float
    {
        return $this->repAtCurrentLevel;
    }

    public function getPersonaType() : PersonaBaseType
    {
        $type = new PersonaBaseType();

        $type->setPersonaId($this->getKey());
        $type->setBadges('');
        $type->setIconIndex($this->iconIndex);
        $type->setLevel($this->level);
        $type->setMotto($this->motto);
        $type->setName($this->name);
        $type->setPresence(1);
        $type->setScore($this->score);
        $type->setUserId($this->user_id);
        $type->setRep($this->getRep());
        $type->setRepAtCurrentLevel($this->getRepAtCurrentLevel());

        return $type;
    }
}
