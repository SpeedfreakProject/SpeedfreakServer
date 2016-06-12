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

use Carbon\Carbon;
use Speedfreak\Http\Requests;
use SimpleXMLElement;

class DefaultController extends Controller
{
    public function systemInfo()
    {
        $xml = new SimpleXMLElement('<SystemInfo></SystemInfo>');
        $xml->addChild('Branch', 'debug');
        $xml->addChild('ChangeList', 620386);
        $xml->addChild('ClientVersion', 638);
        $xml->addChild('ClientVersionCheck', true);
        $xml->addChild('Deployed', Carbon::parse('6/7/2016 7:10PM')->format('m/d/Y H:i:s'));
        $xml->addChild('EntitlementsToDownload', true);
        $xml->addChild('JidPrepender', 'nfsw');
        $xml->addChild('LauncherServiceUrl', 'http://10.100.15.202/LauncherService/onlineconfig.aspx');
        $xml->addChild('NucleusNamespace', 'nfsw-live');
        $xml->addChild('NucleusNamespaceWeb', 'nfs_web');
        $xml->addChild('PersonaCacheTimeout', 900);
        $xml->addChild('PortalDomain');
        $xml->addChild('PortalSecureDomain');
        $xml->addChild('PortalStoreFailurePage');
        $xml->addChild('PortalTimeOut', 60000);
        $xml->addChild('ShardName', 'Speedfreak');
        $xml->addChild('Time', Carbon::now()->toIso8601String());
        $xml->addChild('Version', 1600);

        return response($xml->asXML(), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function getUserSettings()
    {
        $xml = new SimpleXMLElement('<User_Settings></User_Settings>');
        $xml->addChild('CarCacheAgeLimit', 600);
        $xml->addChild('IsRaceNowEnabled', true);
        $xml->addChild('MaxCarCacheSize', 250);
        $xml->addChild('MinRaceNowLevel', 2);
        $xml->addChild('VoipAvailable', false);

        $availableSceneryGroups = $xml->addChild('activatedHolidaySceneryGroups');
        $availableSceneryGroups->addChild('string', 'SCENERY_GROUP_CHRISTMAS');

        $activeHolidayIds = $xml->addChild('activeHolidayIds');
        $activeHolidayIds->addChild('long', 0);

        $unavailableSceneryGroups = $xml->addChild('disactivatedHolidaySceneryGroups');
        $unavailableSceneryGroups->addChild('string', 'SCENERY_GROUP_CHRISTMAS_DISABLE');

        $xml->addChild('firstTimeLogin', false);
        $xml->addChild('maxLevel', 60);
        $xml->addChild('starterPackApplied', false);
        $xml->addChild('userId', 1);

        return response($xml->asXML(), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function getFriendListFromUserId()
    {
        return response(
            (new SimpleXMLElement('<PersonaFriendsList/>'))->asXML(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }
}
