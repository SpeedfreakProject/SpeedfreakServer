<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Speedfreak\Http\Controllers';

    /**
     * All route parameter names in this array will automatically
     * have a pattern registered for them. The pattern will
     * ensure that they can be accessed with any casing.
     *
     * Basically, case-insensitive routing. You need to use route parameters, though.
     *
     * @var array
     */
    protected $caseInsensitiveRoutes = [
        'speedfreak',
        'speedfreak_engine',
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
        foreach($this->caseInsensitiveRoutes as $caseInsensitiveRoute) {
            $router->pattern($caseInsensitiveRoute, '(?i:' . $caseInsensitiveRoute . ')');
        }

        //dd($router->getPatterns());

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * Define any router patterns.
     *
     * @param Router $router
     */
    protected function definePatterns(Router $router)
    {
        foreach($this->caseInsensitiveRoutes as $caseInsensitiveRoute) {
            $router->pattern($caseInsensitiveRoute, '(?i:' . $caseInsensitiveRoute . ')');
        }

        dd($router->getPatterns());
//        $router->pattern('speedfreak', '(?i:speedfreak)');
//        $router->pattern('speedfreak_engine', '(?i:engine)');
//        $router->pattern('getrebroadcasters', '(?i:getrebroadcasters)');
//        $router->pattern('getregioninfo', '(?i:getregioninfo)');
//        $router->pattern('loginAnnouncements', '(?i:loginAnnouncements)');
//        $router->pattern('getsocialsettings', '(?i:getsocialsettings)');
//        $router->pattern('getblockeduserlist', '(?i:getblockeduserlist)');
//        $router->pattern('getblockersbyusers', '(?i:getblockersbyusers)');
//        $router->pattern('heartbeat', '(?i:heartbeat)');
//        $router->pattern('newsArticles', '(?i:newsArticles)');
//        $router->pattern('getsocialnetworkinfo', '(?i:getsocialnetworkinfo)');
//        $router->pattern('setsocialsettings', '(?i:setsocialsettings)');
//        $router->pattern('addfriendrequest', '(?i:addfriendrequest)');
//        $router->pattern('sendChatAnnouncement', '(?i:sendChatAnnouncement)');
//        $router->pattern('user', '(?i:user)');
//        $router->pattern('session', '(?i:session)');
//        $router->pattern('getChatInfo', '(?i:getChatInfo)');
//        $router->pattern('driver_persona', '(?i:driverpersona)');
//        $router->pattern('getExpLevelPointsMap', '(?i:GetExpLevelPointsMap)');
//
//        $router->pattern('authenticateUser', '(?i:AuthenticateUser)');
//        $router->pattern('createUser', '(?i:CreateUser)');
//        $router->pattern('getPermanentSession', '(?i:GetPermanentSession)');
    }
}
