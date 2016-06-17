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
use Speedfreak\Entities\EventDefinition;

class EventsType
{
    /**
     * @var EventDefinition[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(inline=true,entry="EventDefinition")
     */
    protected $events = [];

    /**
     * @return \Speedfreak\Entities\EventDefinition[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param \Speedfreak\Entities\EventDefinition[] $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }
}