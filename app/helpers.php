<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

/**
 * Shuffle a string X times (where X is $times)
 *
 * @param string $string
 * @param int $times
 * @return string
 */
function shuffleString(string $string, int $times = 1) : string {
    for ($i = 0; $i < $times; $i++) {
        $string = str_shuffle($string);
    }

    return $string;
}

/**
 * Get the user
 */
function user()
{
    if (! isset($_SERVER['SUDO_USER'])) {
        return $_SERVER['USER'];
    }
    return $_SERVER['SUDO_USER'];
}

function overflow32($v)
{
    $v = $v % 4294967296;
    if ($v > 2147483647) return $v - 4294967296;
    elseif ($v < -2147483648) return $v + 4294967296;
    else return $v;
}

function hashCode( $s )
{
    $h = 0;
    $len = strlen($s);
    for($i = 0; $i < $len; $i++)
    {
        $h = overflow32(31 * $h + ord($s[$i]));
    }

    return $h;
}

function random_str(
    $length,
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
) {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    if ($max < 1) {
        throw new Exception('$keyspace must be at least two characters long');
    }
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}
