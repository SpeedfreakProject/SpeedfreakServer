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
use Speedfreak\Entities\Types\LoginDataType;
use Speedfreak\Entities\Types\UserInfoType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;
use Speedfreak\Http\Requests\RegisterRequest;
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
        $token = shuffleString($this->getSecureRandomText());
        $this->state->validateSecurityToken();
        $userInfo = $userRepository->getPermanentSession($userId, $token);

        $this->setSessionEntry("SecurityToken", $token);

        return Marshaller::marshal(
            $userInfo, UserInfoType::class
        );
    }

    /**
     * Securely log-out the current user.
     *
     * @return string
     * @throws EngineException
     */
    public function secureLogout()
    {
        $this->checkSecurityToken();
        $this->state->removeSession((int) $this->getParam('userId'));

        return '';
    }

    /**
     * Securely log-in to a persona.
     *
     * @return string
     * @throws EngineException
     */
    public function secureLoginPersona()
    {
        $this->checkSecurityToken();
        $this->setSessionEntry('PersonaId', (int) $this->getParam('personaId'));

        return '';
    }

    /**
     * Securely log out of a persona.
     *
     * @return string
     * @throws EngineException
     */
    public function secureLogoutPersona()
    {
        $this->checkSecurityToken();
        $this->setSessionEntry('PersonaId', 0);

        return '';
    }

    /**
     * Authenticate a user.
     * @param UserRepository $userRepository
     * @return Response
     */
    public function authenticateUser(UserRepository $userRepository)
    {
        $this->validateRequest([
            'password' => 'required|string|min:8|max:255',
        ]);

        $result = $userRepository->authenticate($this->getParam('email', ''), $this->getParam('password', ''));
        $token = shuffleString((string) time(), 16);

        $this->state->createSessionEntry($result, $token);

        $data = new LoginDataType;
        $data->setUserId($result);
        $data->setLoginToken($token);

        return Marshaller::marshal(
            $data, LoginDataType::class
        );
    }

    /**
     * Register a user.
     * @param RegisterRequest $registerRequest
     * @param UserRepository $userRepository
     * @return Response
     * @throws EngineException
     */
    public function createUser(RegisterRequest $registerRequest, UserRepository $userRepository)
    {
        if ($userRepository->createUser($this->getParam('email'), $this->getParam('password'))) {
            return $this->authenticateUser($userRepository);
        } else {
            throw new EngineException("Failed to authenticate user while registering.");
        }
    }
}
