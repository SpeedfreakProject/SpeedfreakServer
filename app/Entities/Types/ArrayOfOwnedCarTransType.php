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
 * Class ArrayOfOwnedCarTrans
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ArrayOfOwnedCarTransType")
 */
class ArrayOfOwnedCarTransType
{
    /**
     * @var array
     * @Serializer\Type("array<Speedfreak\Entities\Types\OwnedCarType>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(entry="OwnedCarTrans",inline=true)
     */
    protected $ownedCarTransList = [];

    /**
     * @return array
     */
    public function getOwnedCarTransList()
    {
        return $this->ownedCarTransList;
    }

    /**
     * @param array $ownedCarTransList
     */
    public function setOwnedCarTransList($ownedCarTransList)
    {
        $this->ownedCarTransList = $ownedCarTransList;
    }
}