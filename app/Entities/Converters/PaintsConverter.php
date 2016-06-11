<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Converters;

use Speedfreak\Contracts\IConverter;
use Speedfreak\Entities\Types\PaintsType;
use Speedfreak\Entities\Utilities\Marshaller;

class PaintsConverter implements IConverter
{
    /**
     * @inheritdoc
     */
    public function convertToEntityAttribute(string $xmlString) : PaintsType
    {
        return Marshaller::unmarshal($xmlString, PaintsType::class);
    }

    /**
     * @param PaintsType $item
     * @return mixed|string
     */
    public function convertToDatabaseColumn($item)
    {
        return Marshaller::marshal($item);
    }
}