<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    abort(401);
});

Route::group(['prefix' => 'Speedfreak/Engine'], function() {
    Route::get('getusersettings', 'DefaultController@getUserSettings');
    Route::get('systeminfo', 'DefaultController@systemInfo');
    Route::get('getfriendlistfromuserid', 'DefaultController@getFriendListFromUserId');
    Route::get('carclasses', 'DefaultController@carClasses');
    Route::get('getrebroadcasters', 'DefaultController@getReBroadcasters');
    Route::get('getregioninfo', 'DefaultController@getRegionInfo');
    Route::get('loginAnnouncements', 'DefaultController@loginAnnouncements');
    Route::get('getsocialsettings', 'DefaultController@getSocialSettings');
    Route::get('getblockeduserlist', 'DefaultController@getBlockedUserList');
    Route::get('getblockersbyusers', 'DefaultController@getBlockersByUsers');
    Route::get('heartbeat', 'DefaultController@heartbeat');
    Route::get('newsArticles', 'DefaultController@newsArticles');
    Route::get('getsocialnetworkinfo', 'DefaultController@getSocialNetworkInfo');
    Route::get('setsocialsettings', 'DefaultController@setSocialSettings');
    Route::get('addfriendrequest', 'DefaultController@addFriendRequest');
    Route::get('sendChatAnnouncement', 'DefaultController@sendChatAnnouncement');

    // Authentication
    Route::post('User/AuthenticateUser', 'UserController@authenticateUser');
    Route::post('User/CreateUser', 'UserController@createUser');
    Route::post('User/GetPermanentSession', 'UserController@getPermanentSession');

    // Personas
    Route::get('DriverPersona/GetExpLevelPointsMap', 'DriverPersonaController@getExpLevelPointsMap');

    // Statistics/client ping
    Route::get('Server/Statistics', 'ServerStatsController@statistics');
    Route::get('Server/Info', 'ServerStatsController@info');
    Route::get('Server/InfoUI', 'ServerStatsController@infoUI');

    // Chat
    Route::get('Session/GetChatInfo', 'SessionController@getChatInfo');
});