<?php

namespace Speedfreak\Entities\Converters;

use SimpleXMLElement;
use Speedfreak\Contracts\IConverter;
use Speedfreak\Entities\Custom\VinylTrans;

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
        $element = new SimpleXMLElement($xmlString);
        $vinylTrans = $element->xpath('CustomVinylTrans');
        $newVinylTrans = [];

        foreach($vinylTrans as $element) {
            $element = (array) $element;

            array_push($newVinylTrans, new VinylTrans(
                
            ));
        }
    }

    /**
     * Convert an object to an XML string.
     *
     * @param $item
     * @return string
     */
    public function convertToDatabaseColumn($item)
    {
        // TODO: Implement convertToDatabaseColumn() method.
    }
}