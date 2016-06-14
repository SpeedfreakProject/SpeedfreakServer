<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Business;

use Speedfreak\Constants;
use Speedfreak\Contracts\Business\DriverPersonaBO as Contract;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;
use Speedfreak\Entities\Types\ArrayOfStringType;
use Speedfreak\Entities\Types\PersonaBaseType;
use Speedfreak\Entities\Types\PersonaMottoType;
use Speedfreak\Entities\Types\PersonaPresenceType;
use Speedfreak\Entities\Types\ProfileDataType;

class DriverPersonaBO implements Contract
{
    /**
     * @var PersonaRepository
     */
    private $personaRepository;

    public function __construct(PersonaRepository $personaRepository)
    {
        $this->personaRepository = $personaRepository;
    }

    public function reserveName(string $name) : ArrayOfStringType
    {
        $arrayOfStringType = new ArrayOfStringType;
        if ($this->personaRepository->existsByName($name)) {
            $arrayOfStringType->setString('NONE');
        }

        return $arrayOfStringType;
    }

    public function createPersona(int $userId, string $name, int $iconIndex) : ProfileDataType
    {
        /* @var Persona $persona */
        $persona = Persona::forceCreate([
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

        $profileDataType = new ProfileDataType;
        $profileDataType->setName($persona->name);
        $profileDataType->setCash($persona->cash);
        $profileDataType->setIconIndex($persona->iconIndex);
        $profileDataType->setPersonaId($persona->getKey());
        $profileDataType->setLevel($persona->level);

        return $profileDataType;
    }

    public function deletePersona(int $personaId)
    {
        Persona::findByIdOrFail($personaId)->delete();
    }

    public function getPersonaInfo(int $personaId) : ProfileDataType
    {
        /* @var Persona $persona */
        $persona = Persona::findByIdOrFail($personaId);
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
        $profileDataType->setRep($persona->getRep());
        $profileDataType->setRepAtCurrentLevel($persona->getRepAtCurrentLevel());
        $profileDataType->setScore($persona->score);
        return $profileDataType;
    }

    public function getPersonaBaseFromList(array $personaIds) : ArrayOfPersonaBaseType
    {
        $arrayOfPersonaBaseType = new ArrayOfPersonaBaseType;
        $tmp = [];
        foreach($personaIds as $id) {
            $persona = $this->personaRepository->findById($id);
            if (!$persona) continue;

            $personaBaseType = new PersonaBaseType;
            $personaBaseType->setBadges('');
            $personaBaseType->setIconIndex($persona->iconIndex);
            $personaBaseType->setLevel($persona->level);
            $personaBaseType->setMotto($persona->motto);
            $personaBaseType->setName($persona->name);
            $personaBaseType->setPersonaId($persona->getKey());
            $personaBaseType->setRep($persona->getRep());
            $personaBaseType->setRepAtCurrentLevel($persona->getRepAtCurrentLevel());
            $personaBaseType->setScore($persona->score);
            $personaBaseType->setPresence(2);
            $personaBaseType->setUserId($persona->user->id);
            $tmp[] = $personaBaseType;
        }

        $arrayOfPersonaBaseType->setPersonaBase($tmp);
        return $arrayOfPersonaBaseType;
    }

    public function getPersonaPresenceByName(string $name)
    {
        /* @var Persona $persona */
        $persona = $this->personaRepository->findByName($name);
        if ($persona) {
            $personaPresenceType = new PersonaPresenceType;
            $personaPresenceType->setPersonaId($persona->getKey());
            $personaPresenceType->setPresence(1);
            $personaPresenceType->setUserId($persona->user->id);

            return $personaPresenceType;
        }

        return null;
    }

    public function updateStatusMessage(int $personaId, string $message) : PersonaMottoType
    {
        $this->personaRepository->updateStatusMessage($personaId, $message);
        $personaMottoType = new PersonaMottoType;
        $personaMottoType->setMessage($message);
        $personaMottoType->setPersonaId($personaId);

        return $personaMottoType;
    }
}