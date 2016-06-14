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
 * Class UdpRelayInfoType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="UdpRelayInfo")
 */
class UdpRelayInfoType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Host")
     */
    protected $host;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Port")
     */
    protected $port;

    /**
     * UdpRelayInfoType constructor.
     * @param string $host
     * @param int $port
     */
    public function __construct(string $host = '127.0.0.1', int $port = 9999)
    {
        $this->setHost($host);
        $this->setPort($port);
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }
}