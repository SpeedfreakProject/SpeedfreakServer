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
 * Class ArrayOfInt
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ArrayOfint")
 */
class ArrayOfInt
{
    /**
     * @var int[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(inline=true,entry="int")
     */
    protected $integers = [];

    /**
     * ArrayOfInt constructor.
     * @param \int[] $integers
     */
    public function __construct(array $integers = [])
    {
        $this->integers = $integers;
    }

    /**
     * @return \int[]
     */
    public function getIntegers()
    {
        return $this->integers;
    }

    /**
     * @param \int[] $integers
     */
    public function setIntegers($integers)
    {
        $this->integers = $integers;
    }
}