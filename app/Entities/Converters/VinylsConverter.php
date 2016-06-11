<?php

namespace Speedfreak\Entities\Converters;

use Speedfreak\Contracts\IConverter;
use Speedfreak\Entities\Types\VinylsType;
use Speedfreak\Entities\Utilities\Marshaller;

class VinylsConverter implements IConverter
{
    /**
     * Convert a string to the appropriate object.
     *
     * @param string $xmlString
     * @return mixed
     */
    public function convertToEntityAttribute(string $xmlString)
    {
        return Marshaller::unmarshal($xmlString, VinylsType::class);
    }

    /**
     * Convert an object to an XML string.
     *
     * @param VinylsType $item
     * @return string
     */
    public function convertToDatabaseColumn($item)
    {
        return Marshaller::marshal($item);
    }
}