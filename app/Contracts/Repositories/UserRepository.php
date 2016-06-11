<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Repositories;

interface UserRepository
{
    public function all();

    public function personasForUser(int $userId);

    public function deleteUser(int $userId);

    public function findById(int $userId);

    public function findByEmail(string $email);

    public function authenticate(string $email, string $password);

    public function createUser(string $email, string $password);

    public function getPermanentSession(int $userId, string $securityToken);
}