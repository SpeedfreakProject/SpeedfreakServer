<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SystemInfoType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="SystemInfo")
 */
class SystemInfoType
{
    /**
     * @var string
     * @Serializer\SerializedName("Branch")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $branch = 'debug';

    /**
     * @var int
     * @Serializer\SerializedName("ChangeList")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $changeList = 620386;

    /**
     * @var int
     * @Serializer\SerializedName("ClientVersion")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $clientVersion = 1337;

    /**
     * @var bool
     * @Serializer\SerializedName("ClientVersionCheck")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $clientVersionCheck = true;

    /**
     * @var string
     * @Serializer\SerializedName("Deployed")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $deployed;

    /**
     * @var bool
     * @Serializer\SerializedName("EntitlementsToDownload")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $entitlementsToDownload = true;

    /**
     * @var string
     * @Serializer\SerializedName("JidPrepender")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $jidPrepender = 'nfsw';

    /**
     * @var string
     * @Serializer\SerializedName("LauncherServiceUrl")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $launcherServiceUrl = 'http://10.100.15.202/LauncherService/onlineconfig.aspx';

    /**
     * @var string
     * @Serializer\SerializedName("NucleusNamespace")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $nucleusNamespace = 'nfsw-live';

    /**
     * @var string
     * @Serializer\SerializedName("NucleusNamespaceWeb")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $nucleusNamespaceWeb = 'nfs_web';

    /**
     * @var int
     * @Serializer\SerializedName("PersonaCacheTimeout")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $personaCacheTimeout = 900;

    /**
     * @var string
     * @Serializer\SerializedName("PortalDomain")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $portalDomain;

    /**
     * @var string
     * @Serializer\SerializedName("PortalSecureDomain")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $portalSecureDomain;

    /**
     * @var string
     * @Serializer\SerializedName("PortalStoreFailurePage")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $portalStoreFailurePage;

    /**
     * @var int
     * @Serializer\SerializedName("PortalTimeOut")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $portalTimeOut = 60000;

    /**
     * @var string
     * @Serializer\SerializedName("ShardName")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $shardName = 'Speedfreak';

    /**
     * @var string
     * @Serializer\SerializedName("Time")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $time;

    /**
     * @var int
     * @Serializer\SerializedName("Version")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $version = 1600;

    /**
     * @return string
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param string $branch
     * @return SystemInfoType
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
        return $this;
    }

    /**
     * @return int
     */
    public function getChangeList()
    {
        return $this->changeList;
    }

    /**
     * @param int $changeList
     * @return SystemInfoType
     */
    public function setChangeList($changeList)
    {
        $this->changeList = $changeList;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientVersion()
    {
        return $this->clientVersion;
    }

    /**
     * @param int $clientVersion
     * @return SystemInfoType
     */
    public function setClientVersion($clientVersion)
    {
        $this->clientVersion = $clientVersion;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isClientVersionCheck()
    {
        return $this->clientVersionCheck;
    }

    /**
     * @param boolean $clientVersionCheck
     * @return SystemInfoType
     */
    public function setClientVersionCheck($clientVersionCheck)
    {
        $this->clientVersionCheck = $clientVersionCheck;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeployed()
    {
        return $this->deployed;
    }

    /**
     * @param string $deployed
     * @return SystemInfoType
     */
    public function setDeployed($deployed)
    {
        $this->deployed = $deployed;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isEntitlementsToDownload()
    {
        return $this->entitlementsToDownload;
    }

    /**
     * @param boolean $entitlementsToDownload
     * @return SystemInfoType
     */
    public function setEntitlementsToDownload($entitlementsToDownload)
    {
        $this->entitlementsToDownload = $entitlementsToDownload;
        return $this;
    }

    /**
     * @return string
     */
    public function getJidPrepender()
    {
        return $this->jidPrepender;
    }

    /**
     * @param string $jidPrepender
     * @return SystemInfoType
     */
    public function setJidPrepender($jidPrepender)
    {
        $this->jidPrepender = $jidPrepender;
        return $this;
    }

    /**
     * @return string
     */
    public function getLauncherServiceUrl()
    {
        return $this->launcherServiceUrl;
    }

    /**
     * @param string $launcherServiceUrl
     * @return SystemInfoType
     */
    public function setLauncherServiceUrl($launcherServiceUrl)
    {
        $this->launcherServiceUrl = $launcherServiceUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getNucleusNamespace()
    {
        return $this->nucleusNamespace;
    }

    /**
     * @param string $nucleusNamespace
     * @return SystemInfoType
     */
    public function setNucleusNamespace($nucleusNamespace)
    {
        $this->nucleusNamespace = $nucleusNamespace;
        return $this;
    }

    /**
     * @return string
     */
    public function getNucleusNamespaceWeb()
    {
        return $this->nucleusNamespaceWeb;
    }

    /**
     * @param string $nucleusNamespaceWeb
     * @return SystemInfoType
     */
    public function setNucleusNamespaceWeb($nucleusNamespaceWeb)
    {
        $this->nucleusNamespaceWeb = $nucleusNamespaceWeb;
        return $this;
    }

    /**
     * @return int
     */
    public function getPersonaCacheTimeout()
    {
        return $this->personaCacheTimeout;
    }

    /**
     * @param int $personaCacheTimeout
     * @return SystemInfoType
     */
    public function setPersonaCacheTimeout($personaCacheTimeout)
    {
        $this->personaCacheTimeout = $personaCacheTimeout;
        return $this;
    }

    /**
     * @return string
     */
    public function getPortalDomain()
    {
        return $this->portalDomain;
    }

    /**
     * @param string $portalDomain
     * @return SystemInfoType
     */
    public function setPortalDomain($portalDomain)
    {
        $this->portalDomain = $portalDomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getPortalSecureDomain()
    {
        return $this->portalSecureDomain;
    }

    /**
     * @param string $portalSecureDomain
     * @return SystemInfoType
     */
    public function setPortalSecureDomain($portalSecureDomain)
    {
        $this->portalSecureDomain = $portalSecureDomain;
        return $this;
    }

    /**
     * @return int
     */
    public function getPortalTimeOut()
    {
        return $this->portalTimeOut;
    }

    /**
     * @param int $portalTimeOut
     * @return SystemInfoType
     */
    public function setPortalTimeOut($portalTimeOut)
    {
        $this->portalTimeOut = $portalTimeOut;
        return $this;
    }

    /**
     * @return string
     */
    public function getShardName()
    {
        return $this->shardName;
    }

    /**
     * @param string $shardName
     * @return SystemInfoType
     */
    public function setShardName($shardName)
    {
        $this->shardName = $shardName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return SystemInfoType
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return SystemInfoType
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getPortalStoreFailurePage()
    {
        return $this->portalStoreFailurePage;
    }

    /**
     * @param string $portalStoreFailurePage
     * @return SystemInfoType
     */
    public function setPortalStoreFailurePage($portalStoreFailurePage)
    {
        $this->portalStoreFailurePage = $portalStoreFailurePage;
        return $this;
    }
}