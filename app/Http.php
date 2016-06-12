<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak;

use Unirest\Request;
use Unirest\Response;

class Http
{
    public static function get(string $url, array $headers = []) : Response
    {
        return Request::get($url, $headers);
    }

    public static function post(string $url, array $headers = [], $body = null) : Response
    {
        return Request::post($url, $headers, $body);
    }
}