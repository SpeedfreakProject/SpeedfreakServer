<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Trans;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class PerformancePartTrans
 * @package Speedfreak\Entities\Trans
 * @Serializer\XmlRoot(name="PerformancePartTrans")
 */
class PerformancePartTrans
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PerformancePartAttribHash")
     * @Serializer\Type("string")
     */
    protected $PerformancePartAttributeHash;

    /**
     * @return string
     */
    public function getPerformancePartAttributeHash()
    {
        return $this->PerformancePartAttributeHash;
    }

    /**
     * @param string $PerformancePartAttributeHash
     */
    public function setPerformancePartAttributeHash($PerformancePartAttributeHash)
    {
        $this->PerformancePartAttributeHash = $PerformancePartAttributeHash;
    }
}