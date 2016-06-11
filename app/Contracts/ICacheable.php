<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts;

use Illuminate\Cache\Repository;

interface ICacheable
{
    /**
     * Save values to the cache.
     *
     * @param Repository $cache
     */
    public function saveToCache(Repository $cache);

    /**
     * Get the "tag" to use when caching.
     *
     * @return string
     */
    public function getTag() : string;

    /**
     * Get the key to use when caching.
     *
     * @return string
     */
    public function getKey() : string;

    /**
     * Refresh values from the cache.
     *
     * @param Repository $cache
     * @return void
     */
    public function refresh(Repository $cache);
}