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
use Speedfreak\Entities\Product;

/**
 * Class ObtainableSlotsList
 * @package Speedfreak\Entities\Types
 * @Serializer\AccessorOrder("custom", custom={ "productTransList" })
 */
class ObtainableSlotsList
{
    /**
     * @var Product[]
     * @Serializer\XmlList(inline=true, entry="ProductTrans")
     */
    protected $productTransList = [];

    /**
     * @return \Speedfreak\Entities\Product[]
     */
    public function getProductTransList()
    {
        return $this->productTransList;
    }

    /**
     * @param \Speedfreak\Entities\Product[] $productTransList
     */
    public function setProductTransList($productTransList)
    {
        $this->productTransList = $productTransList;
    }
}