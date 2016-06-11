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
 * Class WalletsType
 * @package Speedfreak\Entities\Types
 * 
 * @Serializer\AccessorOrder("custom", custom={"walletTrans"})
 * @Serializer\Type(name="Speedfreak\Entities\Types\WalletsType")
 */
class WalletsType
{
    /**
     * @var WalletTransType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="WalletTrans")
     */
    protected $walletTrans;

    /**
     * @return WalletTransType
     */
    public function getWalletTrans()
    {
        return $this->walletTrans;
    }

    /**
     * @param WalletTransType $walletTrans
     */
    public function setWalletTrans($walletTrans)
    {
        $this->walletTrans = $walletTrans;
    }
}