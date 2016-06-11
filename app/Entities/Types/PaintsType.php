<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\Custom\PaintTrans;

/**
 * Class PaintsType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="Paints")
 */
class PaintsType
{
    /**
     * @var PaintTrans[]
     * @Serializer\XmlList(inline=true, entry="CustomPaintTrans")
     * @Serializer\Type("array<Speedfreak\Entities\Custom\PaintTrans>")
     */
    private $customPaintTrans = [];

    /**
     * PaintsType constructor.
     * @param array $customPaintTrans
     */
    public function __construct(array $customPaintTrans = [])
    {
        $this->customPaintTrans = $customPaintTrans;
    }

    /**
     * @return \Speedfreak\Entities\Custom\PaintTrans[]
     */
    public function getCustomPaintTrans()
    {
        return $this->customPaintTrans;
    }

    /**
     * @param \Speedfreak\Entities\Custom\PaintTrans[] $customPaintTrans
     */
    public function setCustomPaintTrans($customPaintTrans)
    {
        $this->customPaintTrans = $customPaintTrans;
    }
}