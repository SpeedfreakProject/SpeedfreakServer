<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use Carbon\Carbon;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class LobbyInfoType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="LobbyInfoType")
 */
class LobbyInfoType
{
    /**
     * @var EventDefinitionType
     */
    protected $event;

    /**
     * @var Carbon
     */
    protected $lobbyDateTimeStart;

    /**
     * @return EventDefinitionType
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param EventDefinitionType $event
     */
    public function setEvent(EventDefinitionType $event)
    {
        $this->event = $event;
    }

    /**
     * @return Carbon
     */
    public function getLobbyDateTimeStart()
    {
        return $this->lobbyDateTimeStart;
    }

    /**
     * @param Carbon $lobbyDateTimeStart
     */
    public function setLobbyDateTimeStart($lobbyDateTimeStart)
    {
        $this->lobbyDateTimeStart = $lobbyDateTimeStart;
    }
}