<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\API;

use JMS\Serializer\Annotation as Serializer;

class APIBasketDataType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Id")
     */
    protected $productId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("OwnedCarTrans")
     */
    protected $ownedCarTrans;

    /**
     * @var APIProductDataType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Product")
     */
    protected $product;

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getOwnedCarTrans()
    {
        return $this->ownedCarTrans;
    }

    /**
     * @param string $ownedCarTrans
     */
    public function setOwnedCarTrans($ownedCarTrans)
    {
        $this->ownedCarTrans = $ownedCarTrans;
    }

    /**
     * @return APIProductDataType
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param APIProductDataType $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }
}