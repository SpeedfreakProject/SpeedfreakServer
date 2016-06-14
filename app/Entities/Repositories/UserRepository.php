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

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Speedfreak\Constants;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Contracts\Repositories\UserRepository as Contract;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Types\PersonasType;
use Speedfreak\Entities\Types\ProfileDataType;
use Speedfreak\Entities\Types\UserInfoType;
use Speedfreak\Entities\Types\UserType;
use Speedfreak\User;

class UserRepository implements Contract
{
    public function all()
    {
        return User::all();
    }

    /**
     * @param int $userId
     * @return Persona[]|Collection
     */
    public function personasForUser(int $userId)
    {
        return Persona::query()
            ->where('userId', '=', $userId)
            ->get();
    }

    public function deleteUser(int $userId)
    {
        User::query()
            ->findOrFail($userId)
            ->delete();
    }

    public function findById(int $userId)
    {
        return User::query()
            ->findOrFail($userId);
    }

    public function authenticate(string $email, string $password)
    {
        return $this->all()->filter(function(User $user) use ($email, $password) {
            return $user->email === $email;
        })->first(function($key, User $user) use ($password) {
            return Hash::check($password, $user->password);
        }, function() {
            throw new EngineException("Invalid username/password!");
        })->id;
    }

    public function findByEmail(string $email)
    {
        return User::query()
            ->where('email', '=', $email)
            ->first();
    }

    public function createUser(string $email, string $password)
    {
        if ($this->findByEmail($email)) {
            throw new EngineException("Error: There is already a user with that email address.");
        }

        return User::forceCreate([
            'email' => $email,
            'password' => bcrypt($password)
        ])->getKey();
    }

    public function getPermanentSession(int $userId, string $securityToken)
    {
        $userInfo = new UserInfoType;
        $userType = new UserType;

        $userType->setSecurityToken($securityToken);
        $userType->setFullGameAccess("false");
        $userType->setUserId($userId);
        $userType->setIsComplete("false");
        $userType->setRemoteUserId(13337);
        $userType->setSubscribeMsg("false");

        $userInfo->setUser($userType);

        $personasType = new PersonasType;
        $profileData = [];
        $personas = $this->personasForUser($userId);

        foreach($personas as $persona) {
            $profileDataType = new ProfileDataType;
            $profileDataType->setBoost(20000000);
            $profileDataType->setName($persona->name);
            $profileDataType->setCash($persona->cash);
            $profileDataType->setLevel($persona->level);
            $profileDataType->setPersonaId($persona->getKey());
            $profileDataType->setIconIndex($persona->iconIndex);
            $profileDataType->setMotto($persona->motto);
            $profileDataType->setRep($persona->rep);
            $profileDataType->setRating($persona->rating);
            $profileDataType->setRepAtCurrentLevel($persona->repAtCurrentLevel);
            $profileDataType->setPercentToLevel($persona->percentToLevel);

            $profileData[] = $profileDataType;
        }

        $userInfo->setDefaultPersonaIdx(0);
        $personasType->setProfileData($profileData);
        $userInfo->setPersonas($personasType);

        return $userInfo;
    }
}