<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Response;
use JMS\Serializer\SerializerBuilder;
use Speedfreak\Constants;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Contracts\State;
use Speedfreak\Entities\Repositories\UserRepository;
use Speedfreak\Http\Requests;
use Speedfreak\Management\Controller as NFSWController;
use SimpleXMLElement;

class UserController extends NFSWController
{
    /**
     * The application state.
     *
     * @var State
     */
    protected $state;

    /**
     * UserController constructor.
     * @param State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Get a permanent session for the given user.
     *
     * @param UserRepository $userRepository
     * @return Response
     * @throws EngineException
     */
    public function getPermanentSession(UserRepository $userRepository)
    {
        $userId = (int) $this->getHeader('userId');
        $this->state->validateSecurityToken();
        $token = shuffleString($this->getSecureRandomText());
        $userInfo = $userRepository->getPermanentSession($userId, $token);
        $this->setSessionEntry("SecurityToken", $token);
        $serializer = SerializerBuilder::create()->build();

        return $this->sendXml($serializer->serialize($userInfo, 'xml'));
    }

    /**
     * Authenticate a user.
     * @param UserRepository $userRepository
     * @return \Illuminate\Http\Response
     */
    public function authenticateUser(UserRepository $userRepository)
    {
        $result = $userRepository->authenticate($this->getParam('email', ''), $this->getParam('password', ''));
        $token = shuffleString((string) time(), 16);

        $this->state->createSessionEntry($result, $token);
        $xml = new SimpleXMLElement('<LoginData></LoginData>');
        $xml->addChild('UserId', $result);
        $xml->addChild('LoginToken', $token);

        return $this->sendXml($xml->asXML());
    }

    /**
     * Register a user.
     * @param UserRepository $userRepository
     * @return \Illuminate\Http\Response
     * @throws EngineException
     */
    public function createUser(UserRepository $userRepository)
    {
        $this->validateRequest([
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:255'
        ]);

        if ($userRepository->createUser($this->getParam('email'), $this->getParam('password'))) {
            return $this->authenticateUser($userRepository);
        } else {
            throw new EngineException("Failed to authenticate user while registering.");
        }
    }
}
