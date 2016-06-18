<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Speedfreak\Entities\Friendship;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user has many personas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany(Persona::class, 'userId');
    }

    /**
     * Get a full collection of the user's friends.
     *
     * @return Collection
     */
    public function getFriends()
    {
        return collect($this->myFriends)->merge(collect($this->addedMe));
    }

    /**
     * @param User $recipient
     * @return bool
     */
    public function isFriendWith(User $recipient)
    {
        return $this->findFriendship($recipient)->where('status', 1)->exists();
    }

    /**
     * Get all of the user that the persona added.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function myFriends()
    {
        return $this->hasMany(Friendship::class, 'sender_id')
            ->where('status', '=', 1);
    }

    /**
     * Get the user's friends that the user did NOT initiate their friendship with.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addedMe()
    {
        return $this->hasMany(Friendship::class, 'recipient_id')
            ->where('status', '=', 1);
    }

    /**
     * Users that this user blocked.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blockedByMe()
    {
        return $this->belongsToMany(User::class, 'blocked_users', 'blocker_id', 'blocked_id')
            ->withTimestamps()
            ->withPivot('reason');
    }

    /**
     * Users that have blocked this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blockedBy()
    {
        return $this->belongsToMany(User::class, 'blocked_users', 'blocked_id', 'blocker_id')
            ->withTimestamps()
            ->withPivot('reason');
    }

    /**
     * @param int $id
     * @static
     * @return User
     */
    public static function findByIdOrFail(int $id) : User
    {
        return self::query()->findOrFail($id);
    }

    public function getPersonaTypes() : ArrayOfPersonaBaseType
    {
        return new ArrayOfPersonaBaseType(collect($this->personas)->map(function(Persona $persona) {
            return $persona->getPersonaType();
        })->values()->all());
    }

    /**
     * @param Model $recipient
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function findFriendship(Model $recipient)
    {
        return Friendship::betweenModels($this, $recipient);
    }
}
