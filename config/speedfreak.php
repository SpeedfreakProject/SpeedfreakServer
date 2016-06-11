<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

return [
    /**
     * Server-specific options.
     */
    'server' => [
        'name' => env('SPEEDFREAK_SERVER_NAME', 'My Speedfreak Server'),
        'maximumPlayers' => env('SPEEDFREAK_MAX_PLAYERS', 150),
        'maintenanceMode' => env('SPEEDFREAK_SERVER_MAINTENANCE', false),
        'maintenanceMessage' => env('SPEEDFREAK_SERVER_MAINTENANCE_MESSAGE', 'Sorry, this server is currently undergoing maintenance. Try again later :-)')
    ],
];
