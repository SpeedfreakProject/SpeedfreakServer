<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Commerce;

use Speedfreak\Contracts\Commerce\INFSCommerce;

class NFSCommerce implements INFSCommerce
{
    /**
     * Map a product ID to its appropriate category ID.
     *
     * @param string $productId
     * @return string
     */
    public function mapToCategoryId(string $productId) : string
    {
        // TODO: Implement mapToCategoryId() method.
    }

    /**
     * Sell something. It can be an aftermarket part
     * or a regular part.
     *
     * @param string $data
     * @param int $type
     * @return void
     */
    public function sell(string $data, int $type)
    {
        // TODO: Implement sell() method.
    }
}