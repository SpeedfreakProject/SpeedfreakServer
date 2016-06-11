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

error_reporting(E_ALL ^ E_WARNING);

use Closure;
use Exception;
use Illuminate\Support\Facades\App;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Contracts\Exceptions\InvalidSocketException;
use Speedfreak\Entities\Product;

class Server
{
    /**
     * The socket instance.
     *
     * @var resource
     */
    public $socket;

    /**
     * The currently connected clients.
     *
     * @var Client[]
     */
    protected $clients = [];

    /**
     * An array of connected sockets.
     *
     * @var resource[]
     */
    protected $connections = [];

    /**
     * If the server is open or not.
     *
     * @var bool
     */
    protected $isOpen = false;

    /**
     * Whether new sockets can be bound or not.
     *
     * @var bool
     */
    protected $canBind = false;

    /**
     * An array of hook functions.
     *
     * @var array
     */
    protected $hooks = [
        'clientConnected' => null,
        'clientDisconnected' => null,
        'beforeClientDisconnected' => null,
        'messageSent' => null,
        'serverShuttingDown' => null,
        'serverShutdown' => null,
    ];

    /**
     * Server constructor.
     */
    public function __construct()
    {
        if (!App::runningInConsole()) throw new Exception("Can only run from console");

        $this->ping();
    }

    protected function ping()
    {
        try {
            $client = stream_socket_client('tcp://192.168.6.104:9002', $errCode, $errMsg);

            if ($client === false) {
                echo 'Socket did not return a response.' . PHP_EOL;
                echo 'Server is clear for starting!' . PHP_EOL;
                $this->canBind = true;
                $this->socket = null;
            } else {
                $this->canBind = false;
                $this->socket = socket_import_stream($client);
                $this->isOpen = true;
            }
        } catch (Exception $exception) {
            echo 'Failed to open connection to socket.' . PHP_EOL;
            $this->canBind = true;
            $this->isOpen = false;
        }
    }

    /**
     * Initialize the base socket.
     */
    protected function initializeSocket()
    {
        if ($this->canBind && !$this->socket) {
            if (($sock = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
                throw new InvalidSocketException("socket_create() failed: " . socket_strerror(socket_last_error()));
            }

            socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, true);
            socket_set_nonblock($sock);

            if (@socket_bind($sock, '192.168.6.104', 9002) === false) {
                $this->canBind = false;
                echo("socket_bind() failed: " . socket_strerror(socket_last_error()) . PHP_EOL);
            }

            if (@socket_listen($sock, 5) === false) {
                $this->canBind = false;
                echo("socket_listen() failed: " . socket_strerror(socket_last_error()) . PHP_EOL);
            }

            $this->socket = $sock;
            $this->isOpen = true;
        } else {
            echo 'Socket has already been started, doing nothing...' . PHP_EOL;
            $this->isOpen = true;
        }

        return true;
    }

    /**
     * Register a new client.
     *
     * @param $socket
     * @return Client
     */
    protected function registerClient($socket)
    {
        socket_getpeername($socket, $ip);

        return $this->clients[] = new Client($socket, $ip);
    }

    public function close()
    {
        if (!$this->isOpen) throw new EngineException("Socket hasn't been started");

        socket_close($this->socket);
        $this->socket = null;
        $this->isOpen = false;
        $this->canBind = true;
        pcntl_signal_dispatch();
        collect($this->clients)->each(function(Client $client) {
            $client->sendMessage('Server closed');
            socket_close($client->getSocket());
        });
    }

    public function run()
    {
        echo 'Running...' . PHP_EOL;

        set_time_limit(0);
        $this->initializeSocket();

        echo 'Registering shutdown function...' . PHP_EOL;
        register_shutdown_function(function () {
            echo 'Shutdown called' . PHP_EOL;
            if ($this->isOpen) $this->close();
        });

        echo 'Has socket: ' . (!is_null($this->socket) ? 'Yes :)' : 'Nope :(') . PHP_EOL;

        if (!$this->socket) throw new EngineException("No socket bound." . PHP_EOL);
        do {
            $read = array_merge([$this->socket], collect($this->clients)->pluck('socket')->all());
            $null = null;

            if (socket_select($read, $null, $null, 5) < 1) {
                continue;
            }

            if (in_array($this->socket, $read)) {
                if (($connection = socket_accept($this->socket)) === false) {
                    echo("socket_accept() failed: " . socket_strerror(socket_last_error($this->socket)));
                    break;
                }

                $client = $this->registerClient($connection);
                $client->sendMessage('Testing 123...');
                $this->callHook('clientConnected', [$client]);
            }

            foreach($this->clients as $key => $client) {
                if (in_array($client->getSocket(), $read)) {
                    pcntl_signal_dispatch();
                    if (false === ($buf = socket_read($client->getSocket(), 2048, PHP_NORMAL_READ))) {
                        echo "socket_read() failed: " . socket_strerror(socket_last_error($client->getSocket())) . PHP_EOL;

                        // Remove the client
                        $this->callHook('beforeClientDisconnected', [$client]);

                        unset($this->clients[$key]);
                        $this->callHook('clientDisconnected', [$client]);

                        socket_close($client->getSocket());

                        if (count($this->clients) == 0) {
                            $this->callHook('serverShuttingDown');
                            $this->close();
                            $this->callHook('serverShutdown');
                        }

                        break 2;
                    }

                    if (!$buf = trim($buf)) continue;

                    foreach($this->clients as $k => $c) {
                        if ($c != $client) $c->sendMessage(sprintf('Message from %s: %s', $client->getIpAddress(), $buf));
                    }

                    preg_match('/\bgetProduct\b ([0-9]+)/', $buf, $matches);

                    if (count($matches) > 0) {
                        array_shift($matches);
                        $productId = $matches[0];

                        /* @var Product $product */
                        if ($product = Product::query()->find($productId)) {
                            $client->sendMessage('Product Details: ');
                            $client->sendMessage('ID: ' . $productId);
                            $client->sendMessage('Title: ' . $product->productTitle);
                            $client->sendMessage('Price: ' . $product->price . ', in ' . $product->currency);
                        }
                    }

                    if ($buf == 'quit') {
                        unset($this->clients[$key]);
                        $client->sendMessage('bye!');
                        socket_close($client->getSocket());
                        $this->callHook('clientDisconnected', [$client]);

                        if (count($this->clients) == 0) $this->close();
                        break;
                    }

                    $client->sendMessage('Sent message: ' . $buf);
                    $this->callHook('messageSent', [$client, $buf]);
                }
            }

            pcntl_signal_dispatch();
        } while ($this->isOpen);

        // Only close if there are some clients. Duh. Otherwise it would be closed already.
        if (count($this->clients) > 0 and $this->isOpen) $this->close();
    }

    public function on($hook, Closure $callback)
    {
        $this->hooks[$hook] = $callback;
    }

    protected function callHook($name, array $args = [])
    {
        if (isset($this->hooks[$name])) {
            if ($this->hooks[$name] instanceof Closure) {
                call_user_func_array($this->hooks[$name], $args);
            }
        }
    }
}

