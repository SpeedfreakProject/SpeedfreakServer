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
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Entities\Types\ArrayOfCarClassType;
use Speedfreak\Entities\Types\ArrayOfUdpRelayInfoType;
use Speedfreak\Entities\Types\CarClassType;
use Speedfreak\Entities\Types\RegionInfoType;
use Speedfreak\Entities\Types\SocialSettingsType;
use Speedfreak\Entities\Types\SystemInfoType;
use Speedfreak\Entities\Types\UdpRelayInfoType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;
use SimpleXMLElement;

use Speedfreak\Management\Controller as NFSWController;

class DefaultController extends NFSWController
{
    public function systemInfo()
    {
        $info = new SystemInfoType;
        $info->setBranch('debug')
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

        return Marshaller::marshal($info, SystemInfoType::class);
    }

    public function getFriendListFromUserId()
    {
        return response(
            (new SimpleXMLElement('<PersonaFriendsList/>'))->asXML(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }

    public function carClasses()
    {
        $classes = [
            new CarClassType(-214211446, 999, 750),
            new CarClassType(-406473455, 599, 500),
            new CarClassType(-405837480, 749, 600),
            new CarClassType(415909161, 399, 250),
            new CarClassType(872416321, 249, 0),
            new CarClassType(1866825865, 499, 400),
        ];

        $arrayOfCarClass = new ArrayOfCarClassType;
        $arrayOfCarClass->setArrayOfCarClasses($classes);

        return Marshaller::marshal($arrayOfCarClass, ArrayOfCarClassType::class);
    }

    public function getReBroadcasters()
    {
        $arrayOfUdpRelayInfo = new ArrayOfUdpRelayInfoType;
        $arrayOfUdpRelayInfo->setUdpRelayInfo([
            new UdpRelayInfoType('127.0.0.1', 9999)
        ]);

        return Marshaller::marshal(
            $arrayOfUdpRelayInfo, ArrayOfUdpRelayInfoType::class
        );
    }

    public function getRegionInfo()
    {
        return Marshaller::marshal(
            new RegionInfoType, RegionInfoType::class
        );
    }

    public function loginAnnouncements()
    {
        return '<LoginAnnouncementsDefinition/>';
    }

    public function getSocialSettings()
    {
        return Marshaller::marshal(
            new SocialSettingsType, SocialSettingsType::class
        );
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

        return $xml->asXML();
    }

    public function getBlockedUserList()
    {
        return '<ArrayOflong/>';
    }

    public function getBlockersByUsers()
    {
        return '<ArrayOflong/>';
    }

    public function heartbeat()
    {
        return '';
    }

    public function newsArticles()
    {
        return '<ArrayOfNewsArticleTrans />';
    }

    public function getSocialNetworkInfo()
    {
        return '<SocialNetworkInfo />';
    }

    public function setSocialSettings()
    {
        return $this->sendXml('');
    }

    public function addFriendRequest()
    {
        return $this->sendXml('');
    }

    public function sendChatAnnouncement()
    {
        throw new EngineException("Not implemented yet ;)");
    }
}
