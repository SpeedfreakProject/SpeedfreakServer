<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Stats;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class StatisticsType
 * @package NFSWServer\Stats
 *
 * @Serializer\XmlRoot(name="StatisticsType")
 */
class StatisticsType
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="PlayersOnline")
     * @var int
     */
    private $playersOnline;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="MostRecentLogin")
     * @var string
     */
    private $mostRecentLogin;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="TotalUsers")
     * @var int
     */
    private $totalUsers;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="TotalPersonas")
     * @var int
     */
    private $totalPersonas;

    /**
     * @return int
     */
    public function getPlayersOnline()
    {
        return $this->playersOnline;
    }

    /**
     * @param int $playersOnline
     */
    public function setPlayersOnline($playersOnline)
    {
        $this->playersOnline = $playersOnline;
    }

    /**
     * @return string
     */
    public function getMostRecentLogin()
    {
        return $this->mostRecentLogin;
    }

    /**
     * @param string $mostRecentLogin
     */
    public function setMostRecentLogin($mostRecentLogin)
    {
        $this->mostRecentLogin = $mostRecentLogin;
    }

    /**
     * @return int
     */
    public function getTotalUsers()
    {
        return $this->totalUsers;
    }

    /**
     * @param int $totalUsers
     */
    public function setTotalUsers($totalUsers)
    {
        $this->totalUsers = $totalUsers;
    }

    /**
     * @return int
     */
    public function getTotalPersonas()
    {
        return $this->totalPersonas;
    }

    /**
     * @param int $totalPersonas
     */
    public function setTotalPersonas($totalPersonas)
    {
        $this->totalPersonas = $totalPersonas;
    }
}