<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

class InventoryItemTransType
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("EntitlementTag")
     * @var string
     */
    protected $entitlementTag = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ExpirationDate")
     * @var string
     */
    protected $expirationDate = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Hash")
     * @var float
     */
    protected $hash = 0;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("InventoryId")
     * @var float
     */
    protected $inventoryId = 0;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ProductId")
     * @var string
     */
    protected $productId = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RemainingUseCount")
     * @var int
     */
    protected $remainingUseCount = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ResellPrice")
     * @var float
     */
    protected $resellPrice = 0;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Status")
     * @var string
     */
    protected $status = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("StringHash")
     * @var string
     */
    protected $stringHash = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("VirtualItemType")
     * @var string
     */
    protected $virtualItemType = '';

    /**
     * @return string
     */
    public function getEntitlementTag()
    {
        return $this->entitlementTag;
    }

    /**
     * @param string $entitlementTag
     */
    public function setEntitlementTag($entitlementTag)
    {
        $this->entitlementTag = $entitlementTag;
    }

    /**
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return float
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param float $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return float
     */
    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    /**
     * @param float $inventoryId
     */
    public function setInventoryId($inventoryId)
    {
        $this->inventoryId = $inventoryId;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getRemainingUseCount()
    {
        return $this->remainingUseCount;
    }

    /**
     * @param int $remainingUseCount
     */
    public function setRemainingUseCount($remainingUseCount)
    {
        $this->remainingUseCount = $remainingUseCount;
    }

    /**
     * @return float
     */
    public function getResellPrice()
    {
        return $this->resellPrice;
    }

    /**
     * @param float $resellPrice
     */
    public function setResellPrice($resellPrice)
    {
        $this->resellPrice = $resellPrice;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStringHash()
    {
        return $this->stringHash;
    }

    /**
     * @param string $stringHash
     */
    public function setStringHash($stringHash)
    {
        $this->stringHash = $stringHash;
    }

    /**
     * @return string
     */
    public function getVirtualItemType()
    {
        return $this->virtualItemType;
    }

    /**
     * @param string $virtualItemType
     */
    public function setVirtualItemType($virtualItemType)
    {
        $this->virtualItemType = $virtualItemType;
    }
}