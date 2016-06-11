<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Repositories;

use Speedfreak\Constants;
use Speedfreak\Contracts\Repositories\DriverPersonaRepository as Contract;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;
use Speedfreak\Entities\Types\ArrayOfStringType;
use Speedfreak\Entities\Types\ProfileDataType;

class DriverPersonaRepository implements Contract
{
    public function reserveName(string $name) : ArrayOfStringType
    {
        $arrayOfstringType = new ArrayOfStringType();
        if ($this->existsByName($name)) {
            $arrayOfstringType->setString("NONE");
        }

        return $arrayOfstringType;
    }

    public function createPersona(int $userId, string $name, int $iconIndex) : ProfileDataType
    {
        $persona = (new Persona)->forceCreate([
            'cash' => Constants::DEFAULT_PERSONA_CASH,
            'name' => $name,
            'iconIndex' => $iconIndex,
            'percentToLevel' => 0,
            'rating' => 0,
            'rep' => 0,
            'repAtCurrentLevel' => 0,
            'score' => 0,
            'level' => 1,
            'userId' => $userId
        ]);

        $profileData = new ProfileDataType();
        $profileData->setName($persona->name);
        $profileData->setCash($persona->cash);
        $profileData->setIconIndex($persona->iconIndex);
        $profileData->setPersonaId($persona->getKey());
        $profileData->setLevel($persona->level);

        return $profileData;
    }

    public function deletePersona(int $personaId)
    {
        return Persona::query()->findOrFail($personaId)
            ->delete();
    }

    public function getPersonaInfo(int $personaId) : ProfileDataType
    {
        $persona = Persona::query()->findOrFail($personaId);
        $profileDataType = new ProfileDataType;
        $profileDataType->setBadges('');
        $profileDataType->setCash($persona->cash);
        $profileDataType->setIconIndex($persona->iconIndex);
        $profileDataType->setLevel($persona->level);
        $profileDataType->setMotto($persona->motto);
        $profileDataType->setName($persona->name);
        $profileDataType->setPercentToLevel($persona->percentToLevel);
        $profileDataType->setPersonaId($persona->getKey());
        $profileDataType->setRating($persona->rating);
        $profileDataType->setRep($persona->rep);
        $profileDataType->setRepAtCurrentLevel($persona->repAtCurrentLevel);
        $profileDataType->setScore($persona->score);

        return $profileDataType;
    }

    public function getPersonaBaseFromList(array $personaIds) : ArrayOfPersonaBaseType
    {
        $arrayOfPersonaBaseType = new ArrayOfPersonaBaseType;
        $personaBase = $arrayOfPersonaBaseType->getPersonaBase();

        foreach($personaIds as $id) {
            $personaBase[] = $this->getPersonaInfo($id);
        }

        return $arrayOfPersonaBaseType;
    }

    public function getPersonaPresenceByName(string $name)
    {
        // TODO: Implement getPersonaPresenceByName() method.
    }

    public function existsByName(string $personaName) : bool
    {
        return Persona::query()->where('name', '=', $personaName)
            ->get()->count() > 0;
    }
}