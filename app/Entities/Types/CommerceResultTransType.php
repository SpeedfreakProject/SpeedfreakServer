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
 * Class CommerceResultTransType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="CommerceResultTrans")
 */
class CommerceResultTransType
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CommerceItems")
     * @var string
     */
    protected $commerceItems = '';

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("InvalidBasket")
     * @var string
     */
    protected $invalidBasket = '';

    /**
     * @var InventoryItemsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("InventoryItems")
     */
    protected $inventoryItemsType;

    /**
     * @var PurchasedCarsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PurchasedCars")
     */
    protected $purchasedCars;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Status")
     * @var string
     */
    protected $status = '';

    /**
     * @var WalletsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Wallets")
     */
    protected $wallets;

    /**
     * @return string
     */
    public function getCommerceItems()
    {
        return $this->commerceItems;
    }

    /**
     * @param string $commerceItems
     */
    public function setCommerceItems($commerceItems)
    {
        $this->commerceItems = $commerceItems;
    }

    /**
     * @return string
     */
    public function getInvalidBasket()
    {
        return $this->invalidBasket;
    }

    /**
     * @param string $invalidBasket
     */
    public function setInvalidBasket($invalidBasket)
    {
        $this->invalidBasket = $invalidBasket;
    }

    /**
     * @return InventoryItemsType
     */
    public function getInventoryItemsType()
    {
        return $this->inventoryItemsType;
    }

    /**
     * @param InventoryItemsType $inventoryItemsType
     */
    public function setInventoryItemsType($inventoryItemsType)
    {
        $this->inventoryItemsType = $inventoryItemsType;
    }

    /**
     * @return PurchasedCarsType
     */
    public function getPurchasedCars()
    {
        return $this->purchasedCars;
    }

    /**
     * @param PurchasedCarsType $purchasedCars
     */
    public function setPurchasedCars($purchasedCars)
    {
        $this->purchasedCars = $purchasedCars;
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
     * @return WalletsType
     */
    public function getWallets()
    {
        return $this->wallets;
    }

    /**
     * @param WalletsType $wallets
     */
    public function setWallets($wallets)
    {
        $this->wallets = $wallets;
    }
}