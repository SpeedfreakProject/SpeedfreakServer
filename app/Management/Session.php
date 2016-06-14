<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Management;

use Speedfreak\Events\Multiplayer\ChangedCurrentMpSession;

class Session
{
    protected static $xmppIp = '127.0.0.1';

    protected static $udpIp = '127.0.0.1';

    protected static $currentMpSessionId = 10000;

    public function getChatInfo() : string
    {
        return '';
    }

    /**
     * @return string
     */
    public static function getXmppIp()
    {
        return self::$xmppIp;
    }

    /**
     * @param string $xmppIp
     */
    public static function setXmppIp($xmppIp)
    {
        self::$xmppIp = $xmppIp;
    }

    /**
     * @return string
     */
    public static function getUdpIp()
    {
        return self::$udpIp;
    }

    /**
     * @param string $udpIp
     */
    public static function setUdpIp($udpIp)
    {
        self::$udpIp = $udpIp;
    }

    /**
     * @return int
     */
    public static function getCurrentMpSessionId()
    {
        return self::$currentMpSessionId;
    }

    /**
     * @return int
     */
    public static function getNextMpSessionId()
    {
        $result = self::$currentMpSessionId++;
        event(new ChangedCurrentMpSession($result));
        
        return $result;
    }

    /**
     * @param int $currentMpSessionId
     */
    public static function setCurrentMpSessionId($currentMpSessionId)
    {
        self::$currentMpSessionId = $currentMpSessionId;
    }
}