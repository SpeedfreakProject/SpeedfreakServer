<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use Speedfreak\Entities\Traits\IdLookup;
use Speedfreak\Entities\Types\OwnedCarType;
use Speedfreak\Entities\Utilities\Marshaller;

class BasketDefinition extends Model
{
    use IdLookup;

    /**
     * Get the owned car XML as an object
     *
     * @param string $ownedCarTrans
     * @return OwnedCarType
     */
    public function getOwnedCarTransAttribute(string $ownedCarTrans) : OwnedCarType
    {
        return Marshaller::unmarshal($ownedCarTrans, OwnedCarType::class);
    }
}
