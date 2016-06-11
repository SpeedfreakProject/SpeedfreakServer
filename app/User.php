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

use Illuminate\Foundation\Auth\User as Authenticatable;
use Speedfreak\Entities\Persona;

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
     * @param int $id
     * @static
     * @return User
     */
    public static function findByIdOrFail(int $id) : User
    {
        return self::query()->findOrFail($id);
    }
}
