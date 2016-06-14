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
 * Class ArrayOfUdpRelayInfoType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ArrayOfUdpRelayInfo")
 */
class ArrayOfUdpRelayInfoType
{
    /**
     * @var UdpRelayInfoType[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(inline=true,entry="UdpRelayInfo")
     * @Serializer\Type("array<Speedfreak\Entities\Types\UdpRelayInfoType>")
     */
    protected $udpRelayInfo = [];

    /**
     * @return UdpRelayInfoType[]
     */
    public function getUdpRelayInfo()
    {
        return $this->udpRelayInfo;
    }

    /**
     * @param UdpRelayInfoType[] $udpRelayInfo
     */
    public function setUdpRelayInfo($udpRelayInfo)
    {
        $this->udpRelayInfo = $udpRelayInfo;
    }
}