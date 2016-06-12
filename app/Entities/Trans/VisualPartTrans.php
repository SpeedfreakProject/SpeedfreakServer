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

class VisualPartTrans
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PartHash")
     * @Serializer\Type("string")
     */
    protected $partHash;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("SlotHash")
     * @Serializer\Type("string")
     */
    protected $slotHash;

    /**
     * @return string
     */
    public function getPartHash()
    {
        return $this->partHash;
    }

    /**
     * @param string $partHash
     */
    public function setPartHash($partHash)
    {
        $this->partHash = $partHash;
    }

    /**
     * @return string
     */
    public function getSlotHash()
    {
        return $this->slotHash;
    }

    /**
     * @param string $slotHash
     */
    public function setSlotHash($slotHash)
    {
        $this->slotHash = $slotHash;
    }
}