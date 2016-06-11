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

use Speedfreak\Constants;
use Speedfreak\Entities\Custom\PaintTrans;
use SimpleXMLElement;

class PaintsType
{
    /**
     * @var PaintTrans[]
     */
    public $customPaintTrans = [];

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