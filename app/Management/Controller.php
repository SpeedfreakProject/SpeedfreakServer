<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Management;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Http\Controllers\Controller as NFSWController;

/**
 * Class Controller
 * @package Speedfreak\Management
 *
 * Extends the default controller to add some more helpers.
 */
abstract class Controller extends NFSWController
{
    /**
     * Generate a cryptographically secure string.
     *
     * @return string
     */
    protected function getSecureRandomText() : string
    {
        return random_str(32);
    }

    /**
     * Get a header from the current request.
     *
     * @param string $param
     * @param mixed $default
     * @return array|string
     */
    protected function getHeader(string $param, $default = null)
    {
        return app('Speedfreak\Contracts\State')->getRequest()->header($param, $default);
    }

    /**
     * Get a parameter from the current request.
     *
     * @param string $param
     * @param mixed $default
     * @return mixed
     */
    protected function getParam(string $param, $default = null)
    {
        return app('Speedfreak\Contracts\State')->getRequest()->input($param, $default);
    }

    /**
     * Validate the current request.
     *
     * @param array $rules
     * @param array $messages
     */
    protected function validateRequest(array $rules, array $messages = [])
    {
        $this->validate($this->getRequest(), $rules, $messages);
    }

    /**
     * Get the current user ID.
     *
     * @return int
     */
    protected function getUserId()
    {
        return (int) $this->getHeader('userId', -1);
    }

    /**
     * Get the session associated with the given user ID.
     *
     * @param int $userId
     * @return SessionVO
     */
    protected function getSession(int $userId)
    {
        return app('Speedfreak\Contracts\State')->getSession($userId);
    }

    /**
     * Send a response as XML.
     *
     * @param string $xml
     * @param int $statusCode
     * @param array $extraHeaders
     * @return \Illuminate\Http\Response
     */
    protected function sendXml(string $xml, int $statusCode = 200, array $extraHeaders = [])
    {
        return response($xml, $statusCode, array_merge($extraHeaders, [
            'Content-Type' => 'application/xml'
        ]));
    }

    /**
     * Set a value on the current session.
     *
     * @param string $propertyName
     * @param $value
     */
    protected function setSessionEntry(string $propertyName, $value)
    {
        try {
            if (($session = $this->getSession($this->getUserId())) != null) {
                call_user_func([$session, sprintf('set%s', Str::ucfirst(camel_case($propertyName)))], $value);
                app('Speedfreak\Contracts\State')->writeSessionToCache($session);
            }
        } catch (\BadMethodCallException $exception) {
            // no-op
        } catch (\Exception $exception) {
            // no-op
        }
    }

    /**
     * Validate the current security token.
     *
     * @throws EngineException
     */
    protected function checkSecurityToken()
    {
        $securityToken = $this->getHeader('securityToken');
        $userId = (int) $this->getHeader('userId');

        if (($session = $this->getSession($userId)) != null) {
            if ((int) $session->getSecurityToken() != $securityToken) throw new EngineException("Session error: Invalid security token.");
        }

        throw new EngineException("Session error: Invalid session.");
    }

    /**
     * Get the current request.
     *
     * @return Request
     */
    protected function getRequest() : Request
    {
        return request();
    }

    /**
     * Get the request's target.
     *
     * @return string
     */
    protected function getTarget() : string
    {
        return $this->getRequest()->path();
    }
}