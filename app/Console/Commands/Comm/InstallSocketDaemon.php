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

class InstallSocketDaemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nfsw:install-socket-daemon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install a daemon for the socket server';

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
        if (php_uname('s') != 'Darwin') {
            $this->error('Not running on Mac');
            return;
        }

        if (!file_exists(base_path('daemon.plist'))) {
            $this->error('Could not locate daemon.plist');
            return;
        }

        if (file_exists('/Library/LaunchDaemons/net.laravelnfsw.server.plist')) {
            $this->info('The daemon file has already been installed.');
            return;
        }

        try {
            file_put_contents(base_path('copy.daemon.plist'), str_replace('$BASEDIR', base_path(), file_get_contents(base_path('daemon.plist'))));
            $this->info('Copying daemon.plist to LaunchDaemons. You may need to enter your sudo password.');
            $path = '/Library/LaunchDaemons/net.laravelnfsw.server.plist';

            exec('sudo cp ' . base_path('copy.daemon.plist') . ' ' . $path);
            exec('sudo chmod 600 ' . $path);
            exec('sudo chown root ' . $path);
            $this->info('Daemon successfully installed to ' . $path);
            $this->info('Run "sudo launchctl load -w ' . $path . '" to load the daemon.');
        } catch (\Exception $ex) {
            $this->error('Failed to install daemon: ' . $ex->getMessage());
            $this->error(sprintf('Try running "sudo chown -R %s %s".', 'root', '/Library/LaunchDaemons'));
        }
    }
}
