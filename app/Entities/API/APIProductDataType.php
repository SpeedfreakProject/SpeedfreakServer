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

/**
 * Class APIProductDataType
 * @package Speedfreak\Entities\API
 * @Serializer\XmlRoot("ProductData")
 */
class APIProductDataType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Id")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("BundleItems")
     */
    protected $bundleItems;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CategoryId")
     */
    protected $categoryId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CategoryName")
     */
    protected $categoryName;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Currency")
     */
    protected $currency;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Description")
     */
    protected $description;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("DurationMinute")
     */
    protected $durationMinute;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Hash")
     */
    protected $hash;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Icon")
     */
    protected $icon;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Level")
     */
    protected $level;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("LongDescription")
     */
    protected $longDescription;

    /**
     * @var double
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Price")
     */
    protected $price;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Priority")
     */
    protected $priority;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ProductId")
     */
    protected $productId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ProductTitle")
     */
    protected $productTitle;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ProductType")
     */
    protected $productType;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("SecondaryIcon")
     */
    protected $secondaryIcon;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("UseCount")
     */
    protected $useCount;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("VisualStyle")
     */
    protected $visualStyle;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("WebIcon")
     */
    protected $webIcon;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("WebLocation")
     */
    protected $webLocation;

    /**
     * @return string
     */
    public function getBundleItems()
    {
        return $this->bundleItems;
    }

    /**
     * @param string $bundleItems
     */
    public function setBundleItems($bundleItems)
    {
        $this->bundleItems = $bundleItems;
    }

    /**
     * @return string
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param string $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDurationMinute()
    {
        return $this->durationMinute;
    }

    /**
     * @param string $durationMinute
     */
    public function setDurationMinute($durationMinute)
    {
        $this->durationMinute = $durationMinute;
    }

    /**
     * @return int
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param int $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * @param string $longDescription
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
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
     * @return string
     */
    public function getProductTitle()
    {
        return $this->productTitle;
    }

    /**
     * @param string $productTitle
     */
    public function setProductTitle($productTitle)
    {
        $this->productTitle = $productTitle;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * @return string
     */
    public function getSecondaryIcon()
    {
        return $this->secondaryIcon;
    }

    /**
     * @param string $secondaryIcon
     */
    public function setSecondaryIcon($secondaryIcon)
    {
        $this->secondaryIcon = $secondaryIcon;
    }

    /**
     * @return int
     */
    public function getUseCount()
    {
        return $this->useCount;
    }

    /**
     * @param int $useCount
     */
    public function setUseCount($useCount)
    {
        $this->useCount = $useCount;
    }

    /**
     * @return string
     */
    public function getVisualStyle()
    {
        return $this->visualStyle;
    }

    /**
     * @param string $visualStyle
     */
    public function setVisualStyle($visualStyle)
    {
        $this->visualStyle = $visualStyle;
    }

    /**
     * @return string
     */
    public function getWebIcon()
    {
        return $this->webIcon;
    }

    /**
     * @param string $webIcon
     */
    public function setWebIcon($webIcon)
    {
        $this->webIcon = $webIcon;
    }

    /**
     * @return string
     */
    public function getWebLocation()
    {
        return $this->webLocation;
    }

    /**
     * @param string $webLocation
     */
    public function setWebLocation($webLocation)
    {
        $this->webLocation = $webLocation;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}