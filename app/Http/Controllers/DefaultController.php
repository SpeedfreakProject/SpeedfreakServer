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
use Speedfreak\Entities\Types\SystemInfoType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;
use SimpleXMLElement;

use Speedfreak\Management\Controller as NFSWController;

class DefaultController extends NFSWController
{
    public function systemInfo()
    {
        $info = (new SystemInfoType)->setBranch('debug')
            ->setChangeList(620386)
            ->setClientVersion(638)
            ->setClientVersionCheck(true)
            ->setDeployed(Carbon::parse('6/12/2016 2:45PM')->format('m/d/Y H:i:s'))
            ->setEntitlementsToDownload(true)
            ->setJidPrepender('nfsw')
            ->setLauncherServiceUrl('http://10.100.15.202/LauncherService/onlineconfig.aspx')
            ->setNucleusNamespace('nfsw-live')
            ->setNucleusNamespaceWeb('nfs_web')
            ->setPersonaCacheTimeout(900);

        $info->setPortalSecureDomain(null);
        $info->setPortalDomain(null);
        $info->setPortalStoreFailurePage(null);
        $info->setPortalTimeOut(60000)
            ->setShardName('Speedfreak')
            ->setTime(Carbon::now()->toIso8601String())
            ->setVersion(1600);

        return $this->sendXml(Marshaller::marshal($info, SystemInfoType::class));
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
