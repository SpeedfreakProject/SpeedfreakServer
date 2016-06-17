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
 * Class ArrayOfCarClassType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ArrayOfCarClass")
 */
class ArrayOfCarClassType
{
    /**
     * @var array
     * @Serializer\XmlList(inline=true,entry="CarClass")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $arrayOfCarClasses = [];

    /**
     * ArrayOfCarClassType constructor.
     * @param array $arrayOfCarClasses
     */
    public function __construct(array $arrayOfCarClasses = [])
    {
        $this->arrayOfCarClasses = $arrayOfCarClasses;
    }

    /**
     * @return array
     */
    public function getArrayOfCarClasses()
    {
        return $this->arrayOfCarClasses;
    }

    /**
     * @param array $arrayOfCarClasses
     */
    public function setArrayOfCarClasses($arrayOfCarClasses)
    {
        $this->arrayOfCarClasses = $arrayOfCarClasses;
    }
}