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
use Speedfreak\Entities\Types\ServerInfoType;
use Speedfreak\Stats\StatisticsType;
use Speedfreak\Contracts\State;
use Speedfreak\Entities\Persona;
use Speedfreak\Http\Requests;
use Speedfreak\Management\Controller as NFSWController;
use Speedfreak\User;

class ServerStatsController extends NFSWController
{
    /**
     * Return some server statistics.
     *
     * @param State $state
     * @return Response
     */
    public function statistics(State $state) : Response
    {
        $stats = new StatisticsType;
        $stats->setPlayersOnline(count($state->getActiveUsers()));
        $stats->setMostRecentLogin(($session = $state->mostRecentSession()) ? $session->getCreated()->format('m/d/Y h:i:s') : '');
        $stats->setTotalUsers(User::all()->count());
        $stats->setTotalPersonas(Persona::all()->count());

        $serializer = SerializerBuilder::create()->build();

        return $this->sendXml($serializer->serialize($stats, 'xml'));
    }

    /**
     * Return some basic information about the server.
     *
     * @return Response
     */
    public function info() : Response
    {
        $info = new ServerInfoType;
        $info->setServerName(config('speedfreak.server.name'));
        $info->setMaintenanceMode(config('speedfreak.server.maintenanceMode'));
        $info->setMaintenanceMessage(config('speedfreak.server.maintenanceMessage'));
        $info->setMaxPlayers(config('speedfreak.server.maximumPlayers'));

        $serializer = SerializerBuilder::create()->build();

        return $this->sendXml($serializer->serialize($info, 'xml'));
    }

    /**
     * Show an info page.
     *
     * @param State $state
     * @return Response
     */
    public function infoUI(State $state)
    {
        if (!env('SPEEDFREAK_ALLOW_INFO_UI')) abort(403, 'Info UI disabled.');

        return view('info-ui', [
            'totalUsers' => User::all()->count(),
            'totalLoggedInUsers' => count($state->getActiveUsers()),
            'totalPersonas' => Persona::all()->count(),
            'mostRecentLogin' => ($session = $state->mostRecentSession()) ? $session->getCreated()->format('m/d/Y h:i:s') : null
        ]);
    }
}
