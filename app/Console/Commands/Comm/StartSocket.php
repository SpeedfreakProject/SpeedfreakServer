<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Console\Commands\Comm;

use Illuminate\Console\Command;
use Speedfreak\Sockets\Client;
use Speedfreak\Sockets\Server;

class StartSocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nfsw:start-socket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the socket server';

    protected $server;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Attempting to start socket server...');

        $server = new Server;
        $server->on('clientConnected', function(Client $client) {
            $this->info(sprintf('New client (IP: %s) has connected!', $client->getIpAddress()));
            $client->sendMessage('Welcome aboard!');
        });

        $server->on('beforeClientDisconnected', function(Client $client) {
            $client->sendMessage('Bye!');
            $this->info(sprintf('Client (IP: %s) is disconnecting.', $client->getIpAddress()));
        });

        $server->on('clientDisconnected', function(Client $client) {
            $this->info(sprintf('Client (IP: %s) has disconnected.', $client->getIpAddress()));
        });

        $server->on('serverShuttingDown', function() {
            $this->info(sprintf('Shutting down server...'));
        });

        $server->on('messageSent', function(Client $sender, string $message) {
            $this->info(sprintf('New message from client (%s): %s', $sender->getIpAddress(), $message));
        });

        $server->on('serverShutdown', function() use ($server) {
            $this->info(sprintf('Server shut down.'));
        });

        $server->run();
        $this->server = $server;
    }

    protected function closeServer(Server $server)
    {
        $this->info('Closing server...');
        $server->close();
    }

    protected function signalHandler($signal)
    {
        echo 'Signal received';

        switch($signal) {
            case SIGINT:
                if ($this->server) {
                    $this->closeServer($this->server);
                }
                break;
            default:
                break;
        }
    }
}
