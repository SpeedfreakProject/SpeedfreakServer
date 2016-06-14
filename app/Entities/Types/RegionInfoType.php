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
 * Class RegionInfoType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="RegionInfo")
 */
class RegionInfoType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CountdownProposalInMilliseconds")
     */
    protected $countdownProposalInMilliseconds = 3000;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DirectConnectTimeoutInMilliseconds")
     */
    protected $directConnectTimeoutInMilliseconds = 1000;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DropOutTimeInMilliseconds")
     */
    protected $dropOutTimeInMilliseconds = 15000;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EventLoadTimeoutInMilliseconds")
     */
    protected $eventLoadTimeoutInMilliseconds = 30000;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("HeartbeatIntervalInMilliseconds")
     */
    protected $heartbeatIntervalInMilliseconds = 1000;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("UdpRelayBandwidthInBps")
     */
    protected $udpRelayBandwidthInBps = 9600;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("UdpRelayTimeoutInMilliseconds")
     */
    protected $udpRelayTimeoutInMilliseconds = 60000;

    /**
     * RegionInfoType constructor.
     * @param int $countdownProposalInMilliseconds
     * @param int $directConnectTimeoutInMilliseconds
     * @param int $dropOutTimeInMilliseconds
     * @param int $eventLoadTimeoutInMilliseconds
     * @param int $heartbeatIntervalInMilliseconds
     * @param int $udpRelayBandwidthInBps
     * @param int $udpRelayTimeoutInMilliseconds
     */
    public function __construct(
        int $countdownProposalInMilliseconds = 3000,
        int $directConnectTimeoutInMilliseconds = 1000,
        int $dropOutTimeInMilliseconds = 15000,
        int $eventLoadTimeoutInMilliseconds = 30000,
        int $heartbeatIntervalInMilliseconds = 1000,
        int $udpRelayBandwidthInBps = 9600,
        int $udpRelayTimeoutInMilliseconds = 60000
    ) {
        $this->countdownProposalInMilliseconds = $countdownProposalInMilliseconds;
        $this->directConnectTimeoutInMilliseconds = $directConnectTimeoutInMilliseconds;
        $this->dropOutTimeInMilliseconds = $dropOutTimeInMilliseconds;
        $this->eventLoadTimeoutInMilliseconds = $eventLoadTimeoutInMilliseconds;
        $this->heartbeatIntervalInMilliseconds = $heartbeatIntervalInMilliseconds;
        $this->udpRelayBandwidthInBps = $udpRelayBandwidthInBps;
        $this->udpRelayTimeoutInMilliseconds = $udpRelayTimeoutInMilliseconds;
    }

    /**
     * @return int
     */
    public function getCountdownProposalInMilliseconds()
    {
        return $this->countdownProposalInMilliseconds;
    }

    /**
     * @param int $countdownProposalInMilliseconds
     */
    public function setCountdownProposalInMilliseconds($countdownProposalInMilliseconds)
    {
        $this->countdownProposalInMilliseconds = $countdownProposalInMilliseconds;
    }

    /**
     * @return int
     */
    public function getDirectConnectTimeoutInMilliseconds()
    {
        return $this->directConnectTimeoutInMilliseconds;
    }

    /**
     * @param int $directConnectTimeoutInMilliseconds
     */
    public function setDirectConnectTimeoutInMilliseconds($directConnectTimeoutInMilliseconds)
    {
        $this->directConnectTimeoutInMilliseconds = $directConnectTimeoutInMilliseconds;
    }

    /**
     * @return int
     */
    public function getDropOutTimeInMilliseconds()
    {
        return $this->dropOutTimeInMilliseconds;
    }

    /**
     * @param int $dropOutTimeInMilliseconds
     */
    public function setDropOutTimeInMilliseconds($dropOutTimeInMilliseconds)
    {
        $this->dropOutTimeInMilliseconds = $dropOutTimeInMilliseconds;
    }

    /**
     * @return int
     */
    public function getEventLoadTimeoutInMilliseconds()
    {
        return $this->eventLoadTimeoutInMilliseconds;
    }

    /**
     * @param int $eventLoadTimeoutInMilliseconds
     */
    public function setEventLoadTimeoutInMilliseconds($eventLoadTimeoutInMilliseconds)
    {
        $this->eventLoadTimeoutInMilliseconds = $eventLoadTimeoutInMilliseconds;
    }

    /**
     * @return int
     */
    public function getHeartbeatIntervalInMilliseconds()
    {
        return $this->heartbeatIntervalInMilliseconds;
    }

    /**
     * @param int $heartbeatIntervalInMilliseconds
     */
    public function setHeartbeatIntervalInMilliseconds($heartbeatIntervalInMilliseconds)
    {
        $this->heartbeatIntervalInMilliseconds = $heartbeatIntervalInMilliseconds;
    }

    /**
     * @return int
     */
    public function getUdpRelayBandwidthInBps()
    {
        return $this->udpRelayBandwidthInBps;
    }

    /**
     * @param int $udpRelayBandwidthInBps
     */
    public function setUdpRelayBandwidthInBps($udpRelayBandwidthInBps)
    {
        $this->udpRelayBandwidthInBps = $udpRelayBandwidthInBps;
    }

    /**
     * @return int
     */
    public function getUdpRelayTimeoutInMilliseconds()
    {
        return $this->udpRelayTimeoutInMilliseconds;
    }

    /**
     * @param int $udpRelayTimeoutInMilliseconds
     */
    public function setUdpRelayTimeoutInMilliseconds($udpRelayTimeoutInMilliseconds)
    {
        $this->udpRelayTimeoutInMilliseconds = $udpRelayTimeoutInMilliseconds;
    }
}