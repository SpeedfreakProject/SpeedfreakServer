<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ServerInfoType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\XmlRoot(name="ServerInfoType")
 * @Serializer\AccessorOrder("custom", custom={"serverName", "maintenanceMessage", "maintenanceMode", "maxPlayers"})
 */
class ServerInfoType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="ServerName")
     */
    private $serverName = "";

    /**
     * @var bool
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="MaintenanceMode")
     */
    private $maintenanceMode = false;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="MaintenanceMessage")
     */
    private $maintenanceMessage = "";

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="MaxPlayers")
     */
    private $maxPlayers = 150;

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @param string $serverName
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

    /**
     * @return boolean
     */
    public function isMaintenanceMode()
    {
        return $this->maintenanceMode;
    }

    /**
     * @param boolean $maintenanceMode
     */
    public function setMaintenanceMode($maintenanceMode)
    {
        $this->maintenanceMode = $maintenanceMode;
    }

    /**
     * @return int
     */
    public function getMaxPlayers()
    {
        return $this->maxPlayers;
    }

    /**
     * @param int $maxPlayers
     */
    public function setMaxPlayers($maxPlayers)
    {
        $this->maxPlayers = $maxPlayers;
    }

    /**
     * @return string
     */
    public function getMaintenanceMessage()
    {
        return $this->maintenanceMessage;
    }

    /**
     * @param string $maintenanceMessage
     */
    public function setMaintenanceMessage($maintenanceMessage)
    {
        $this->maintenanceMessage = $maintenanceMessage;
    }
}