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
use Speedfreak\Entities\Trans\VisualPartTrans;

/**
 * Class VisualPartsType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="VisualParts")
 */
class VisualPartsType
{
    /**
     * @var VisualPartTrans[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(entry="VisualPartTrans", inline=true)
     * @Serializer\Type("array<Speedfreak\Entities\Trans\VisualPartTrans>")
     */
    protected $visualPartTrans = [];

    /**
     * @return \Speedfreak\Entities\Trans\VisualPartTrans[]
     */
    public function getVisualPartTrans()
    {
        return $this->visualPartTrans;
    }

    /**
     * @param \Speedfreak\Entities\Trans\VisualPartTrans[] $visualPartTrans
     */
    public function setVisualPartTrans($visualPartTrans)
    {
        $this->visualPartTrans = $visualPartTrans;
    }
}