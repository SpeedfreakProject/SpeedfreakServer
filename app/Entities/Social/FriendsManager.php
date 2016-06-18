<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Social;

use Illuminate\Database\Eloquent\Collection;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Contracts\IFriendsManager;
use Speedfreak\Entities\Friendship;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Repositories\UserRepository;
use Speedfreak\Entities\Types\PersonaBaseType;
use Speedfreak\User;

class FriendsManager implements IFriendsManager
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var PersonaRepository
     */
    private $personaRepository;

    /**
     * FriendsManager constructor.
     * @param UserRepository $userRepository
     * @param PersonaRepository $personaRepository
     */
    public function __construct(UserRepository $userRepository, PersonaRepository $personaRepository)
    {
        $this->userRepository = $userRepository;
        $this->personaRepository = $personaRepository;
    }

    /**
     * Check if a persona has been added as a friend by the given user.
     *
     * @param int $personaId
     * @param int $userId
     * @return bool
     */
    public function isFriend(int $personaId, int $userId) : bool
    {
        $user = $this->userRepository->findById($userId);
        $persona = $this->personaRepository->findById($personaId);

        return $user->getFriends()->contains(function() use ($persona, $user) {
            return $user->isFriendWith($persona->user);
        });
    }

    /**
     * Get users that have some of the same friends as the given user.
     *
     * @param int $userId
     * @return MutualFriendsType
     */
    public function getMutualFriends(int $userId) : MutualFriendsType
    {
        $origin = User::findByIdOrFail($userId);
        $friends = $origin->getFriends();
        $result = User::all()->reject(function(User $user) use ($userId) {
            return $user->getKey() == $userId;
        })->filter(function(User $user) use ($friends) {
            return $user->getFriends()->contains(function($key, Friendship $friendship) use ($friends) {
                return $friends->pluck('id')->contains($friendship->getKey());
            });
        })->map(function(User $user) {
            return $user->getPersonaTypes();
        });

        return new MutualFriendsType($result->all());
    }

    /**
     * Add a persona as a friend.
     *
     * @param int $personaId
     * @param int $userId
     * @param string $friendName
     * @return PersonaFriendsListType
     * @throws EngineException
     */
    public function addFriend(int $personaId, int $userId, string $friendName = '') : PersonaFriendsListType
    {
        if ($this->isFriend($personaId, $userId)) throw new EngineException("Can not add a friend you already have.");

        $user = $this->userRepository->findById($userId);
        $persona = $this->personaRepository->findById($personaId);
        if ($persona->userId == $userId) throw new EngineException("Can not befriend yourself.");

        $personaUser = $persona->user;
        $friendship = (new Friendship)->forceFill([
            'sender_id' => $userId,
            'recipient_id' => $personaUser->id,
            'status' => 1
        ]);

        $user->myFriends()->save($friendship);

        return new PersonaFriendsListType(
            collect($user->fresh('myFriends')->myFriends)->map(function(Friendship $friendship) {
                return $friendship->recipient->getPersonaTypes();
            })->all()
        );
    }

    /**
     * Remove a persona as a friend.
     *
     * @param int $personaId
     * @param int $userId
     * @return PersonaFriendsListType
     * @throws EngineException
     */
    public function removeFriend(int $personaId, int $userId)
    {
        $user = $this->userRepository->findById($userId);
        $persona = $this->personaRepository->findById($personaId);
        $personaUser = $persona->user;
        /* @var Friendship $request */
        $request = Friendship::betweenModels($user, $personaUser);

        if (!($this->isFriend($personaId, $userId))) {
            throw new EngineException("Can not remove a friend you don't have. Sorry.");
        }

        if ($persona->userId == $userId) throw new EngineException("Can not remove yourself.");

        $request->delete();

        return new PersonaFriendsListType(
            collect($user->fresh('myFriends')->myFriends)->map(function(Friendship $friendship) {
                return $friendship->recipient->getPersonaTypes();
            })->all()
        );
    }
}