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
 * @Serializer\XmlRoot(name="ArrayOfOwnedCarTrans")
 */
class ArrayOfOwnedCarTrans
{
    /**
     * @var array
     * @Serializer\Type("array<Speedfreak\Entities\OwnedCar>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(entry="OwnedCarTrans",inline=true)
     */
    protected $ownedCarTrans = [];

    /**
     * @return array
     */
    public function getOwnedCarTrans()
    {
        return $this->ownedCarTrans;
    }

    /**
     * @param array $ownedCarTrans
     */
    public function setOwnedCarTrans($ownedCarTrans)
    {
        $this->ownedCarTrans = $ownedCarTrans;
    }
}