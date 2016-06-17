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
    throw new \Speedfreak\Contracts\Exceptions\EngineException('There is nothing to see here.');
});

Route::group(['prefix' => 'speedfreak/Engine.svc'], function() {
    Route::match(['GET', 'POST', 'PUT', 'PATCH', 'UPDATE'], '/', function() {
        throw new \Speedfreak\Contracts\Exceptions\EngineException("Nothing to see here.");
    });

    Route::get('getusersettings', 'DefaultController@getUserSettings');
    Route::get('systeminfo', 'DefaultController@systemInfo');
    Route::get('getfriendlistfromuserid', 'DefaultController@getFriendListFromUserId');
    Route::get('carclasses', 'DefaultController@carClasses');
    Route::get('getrebroadcasters', 'DefaultController@getReBroadcasters');
    Route::get('getregioninfo', 'DefaultController@getRegionInfo');
    Route::get('LoginAnnouncements', 'DefaultController@loginAnnouncements');
    Route::get('LoginAnnouncements/ImagesPath', 'DefaultController@announcementImagesPath');
    Route::get('getsocialsettings', 'DefaultController@getSocialSettings');
    Route::get('getblockeduserlist', 'DefaultController@getBlockedUserList');
    Route::get('getblockersbyusers', 'DefaultController@getBlockersByUsers');
    Route::get('heartbeat', 'DefaultController@heartbeat');
    Route::get('NewsArticles', 'DefaultController@newsArticles');
    Route::get('getsocialnetworkinfo', 'DefaultController@getSocialNetworkInfo');
    Route::get('setsocialsettings', 'DefaultController@setSocialSettings');
    Route::get('addfriendrequest', 'DefaultController@addFriendRequest');
    Route::get('sendchatannouncement', 'DefaultController@sendChatAnnouncement');

    // Authentication
    Route::post('User/AuthenticateUser', 'UserController@authenticateUser');
    Route::post('User/CreateUser', 'UserController@createUser');
    Route::post('User/GetPermanentSession', 'UserController@getPermanentSession');

    // Personas
    Route::get('DriverPersona/GetExpLevelPointsMap', 'DriverPersonaController@getExpLevelPointsMap');
    Route::post('DriverPersona/ReserveName', 'DriverPersonaController@reserveName');
    Route::post('DriverPersona/UnreserveName', 'DriverPersonaController@unreserveName');
    Route::post('DriverPersona/CreatePersona', 'DriverPersonaController@createPersona');
    Route::get('DriverPersona/GetPersonaInfo', 'DriverPersonaController@getPersonaInfo');
    Route::get('DriverPersona/GetPersonaBaseFromList', 'DriverPersonaController@getPersonaBaseFromList');
    Route::post('DriverPersona/UpdatePersonaPresence', 'DriverPersonaController@updatePersonaPresence');
    Route::post('DriverPersona/DeletePersona', 'DriverPersonaController@deletePersona');
    Route::post('DriverPersona/UpdateStatusMessage', 'DriverPersonaController@updateStatusMessage');
    Route::get('DriverPersona/GetPersonaPresenceByName', 'DriverPersonaController@getPersonaPresenceByName');

    // Statistics/client ping
    Route::get('server/statistics', 'ServerStatsController@statistics');
    Route::get('server/info', 'ServerStatsController@info');
    Route::get('server/infoui', 'ServerStatsController@infoUI');

    // Chat
    Route::get('Session/GetChatInfo', 'SessionController@getChatInfo');

    // Leaderboard
    Route::get('leaderboard', 'LeaderboardController@index');

    // Crypto
    Route::get('crypto/cryptoticket', 'CryptoController@cryptoTicket');
    Route::get('crypto/relaycryptoticket/{personaId}', 'CryptoController@relayCryptoTicket');

    // Reporting
    Route::get('Reporting/SendMultiplayerConnect', 'ReportingController@sendMultiplayerConnect');
    Route::get('Reporting/SendHardwareInfo', 'ReportingController@sendHardwareInfo');
    Route::get('Reporting/SendUserSettings', 'ReportingController@sendUserSettings');
    Route::get('Reporting/SendClientPingTime', 'ReportingController@sendClientPingTime');

    // SpeedAPI
    Route::get('speedfreakapi/getpersonadata', 'SpeedfreakAPIController@getPersonaData');
    Route::get('speedfreakapi/getproductdata', 'SpeedfreakAPIController@getProductData');
    Route::get('speedfreakapi/getuserdata', 'SpeedfreakAPIController@getUserData');
});