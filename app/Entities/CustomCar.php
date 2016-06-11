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
use Speedfreak\Entities\Converters\PaintsConverter;
use Speedfreak\Entities\Types\PaintsType;

class CustomCar extends Model
{
    /**
     * Get the owned car record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ownedCar()
    {
        return $this->belongsTo(OwnedCar::class, 'idParentOwnedCarTrans');
    }

    public function getPaintsAttribute($xml)
    {
        if (!is_string($xml)) return $xml;

        return (new PaintsConverter)->convertToEntityAttribute($xml);
    }

    public function setPaintsAttribute(PaintsType $paints)
    {
        $this->attributes['paints'] = (new PaintsConverter)->convertToDatabaseColumn($paints);
    }
}
