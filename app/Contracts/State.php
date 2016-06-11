<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts;

use Illuminate\Http\Request;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Management\SessionVO;

interface State
{
    /**
     * Get all of the current sessions.
     *
     * @param bool $fresh
     * @return SessionVO[]
     */
    public function getActiveUsers(bool $fresh = false) : array;

    /**
     * Determine if there is a session associated with the given user ID.
     *
     * @param int $userId
     * @return boolean
     */
    public function hasSession(int $userId);

    /**
     * Get the session associated with the given user ID.
     * Returns null if none is found.
     *
     * @param int $userId
     * @return SessionVO|null
     */
    public function getSession(int $userId);

    /**
     * Load the current sessions from the cache.
     *
     * @return SessionVO[]
     */
    public function refreshSessions() : array;

    /**
     * Add a new user/session, and return the new value from the cache.
     *
     * @param int $userId
     * @param string $securityToken
     * @return SessionVO[]
     */
    public function createSessionEntry(int $userId, string $securityToken) : array;

    /**
     * Get the most recent session.
     *
     * @return SessionVO|null
     */
    public function mostRecentSession();

    /**
     * Validate the current security token.
     * No need for a userId parameter, it's stored in a header.
     *
     * @return bool
     * @throws EngineException
     */
    public function validateSecurityToken();

    /**
     * Get the current request.
     *
     * @return Request
     */
    public function getRequest() : Request;
}