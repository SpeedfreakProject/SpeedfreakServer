<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Sockets;
use Illuminate\Contracts\Support\Arrayable;
use Speedfreak\Contracts\Exceptions\InvalidSocketException;

/**
 * Class Client
 * @package Speedfreak\Sockets
 *
 * This whole XMPP socket thing is highly experimental.
 */
class Client implements Arrayable
{
    const MESSAGE_SEND_FAILED = 0;
    const MESSAGE_SEND_SUCCESS = 1;

    /**
     * The client's unique socket.
     *
     * @var resource
     */
    public $socket;

    /**
     * The client's IP address.
     *
     * @var string
     */
    protected $ipAddress;

    /**
     * Client constructor.
     *
     * @param $socket
     * @param string $ipAddress
     */
    public function __construct($socket, string $ipAddress)
    {
        $this->validateSocket($socket);

        $this->socket = $socket;
        $this->ipAddress = $ipAddress;
    }

    /**
     * Send a message to the client.
     *
     * @param string $message
     * @return int
     */
    public function sendMessage(string $message) : int
    {
        $result = socket_write($this->socket, $message . PHP_EOL, strlen($message . PHP_EOL));

        if ($result === FALSE) return self::MESSAGE_SEND_FAILED;

        return self::MESSAGE_SEND_SUCCESS;
    }

    /**
     * Get the client's unique socket.
     *
     * @return resource
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Get the client's IP address.
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Validate a value to see if it's most likely a socket
     *
     * @param $value
     * @return bool
     */
    private function validateSocket($value)
    {
        if (!is_resource($value)) throw new InvalidSocketException("Invalid value passed as socket");

        return true;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'ipAddress' => $this->ipAddress
        ];
    }
}