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

/**
 * Class WalletTransType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\AccessorOrder("custom", custom={"balance", "currency"})
 * @Serializer\Type(name="Speedfreak\Entities\Types\WalletTransType")
 */
class WalletTransType
{
    /**
     * @var int
     * @Serializer\SerializedName(value="Balance")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $balance;

    /**
     * @var string
     * @Serializer\SerializedName(value="Currency")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $currency;

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
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
}