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

Route::group(['prefix' => '{speedfreak}/{speedfreak_engine}'], function() {
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
    Route::get('newsarticles', 'DefaultController@newsArticles');
    Route::get('getsocialnetworkinfo', 'DefaultController@getSocialNetworkInfo');
    Route::get('setsocialsettings', 'DefaultController@setSocialSettings');
    Route::get('addfriendrequest', 'DefaultController@addFriendRequest');
    Route::get('sendchatannouncement', 'DefaultController@sendChatAnnouncement');

    // Authentication
    Route::post('user/authenticateuser', 'UserController@authenticateUser');
    Route::post('user/createuser', 'UserController@createUser');
    Route::post('user/getpermanentsession', 'UserController@getPermanentSession');

    // Personas
    Route::get('driverpersona/getexplevelpointsmap', 'DriverPersonaController@getExpLevelPointsMap');
    Route::post('driverpersona/reservename', 'DriverPersonaController@reserveName');
    Route::post('driverpersona/unreservename', 'DriverPersonaController@unreserveName');
    Route::post('driverpersona/createpersona', 'DriverPersonaController@createPersona');
    Route::get('driverpersona/getpersonainfo', 'DriverPersonaController@getPersonaInfo');
    Route::get('driverpersona/getpersonabasefromlist', 'DriverPersonaController@getPersonaBaseFromList');
    Route::post('driverpersona/updatepersonapresence', 'DriverPersonaController@updatePersonaPresence');
    Route::post('driverpersona/deletepersona', 'DriverPersonaController@deletePersona');
    Route::post('driverpersona/updatestatusmessage', 'DriverPersonaController@updateStatusMessage');
    Route::get('driverpersona/getpersonapresencebyname', 'DriverPersonaController@getPersonaPresenceByName');

    // Statistics/client ping
    Route::get('server/statistics', 'ServerStatsController@statistics');
    Route::get('server/info', 'ServerStatsController@info');
    Route::get('server/infoui', 'ServerStatsController@infoUI');

    // Chat
    Route::get('session/getchatinfo', 'SessionController@getChatInfo');

    // Leaderboard
    Route::get('leaderboard', 'LeaderboardController@index');

    // Crypto
    Route::get('crypto/cryptoticket', 'CryptoController@cryptoTicket');
    Route::get('crypto/relaycryptoticket', 'CryptoController@relayCryptoTicket');

    // Reporting
    Route::get('reporting/sendmultiplayerconnect', 'ReportingController@sendMultiplayerConnect');
    Route::get('reporting/sendhardwareinfo', 'ReportingController@sendHardwareInfo');
    Route::get('reporting/sendusersettings', 'ReportingController@sendUserSettings');
    Route::get('reporting/sendclientpingtime', 'ReportingController@sendClientPingTime');

    // SpeedAPI
    Route::get('speedfreakapi/getpersonadata', 'SpeedfreakAPIController@getPersonaData');
    Route::get('speedfreakapi/getproductdata', 'SpeedfreakAPIController@getProductData');
    Route::get('speedfreakapi/getuserdata', 'SpeedfreakAPIController@getUserData');
});