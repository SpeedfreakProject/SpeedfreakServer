<?php

namespace Speedfreak\Entities\Utilities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use JMS\Serializer\SerializerBuilder;

class Marshaller
{
    /**
     * Convert an object to XML.
     *
     * @param mixed $object
     * @param string $reqClass
     * @param string $format
     * @return string
     */
    public static function marshal($object, string $reqClass = '', string $format = 'xml') : string
    {
        if (is_object($object) && ($object instanceof Model || $object instanceof Collection)) throw new InvalidArgumentException("Can not marshal models or model collections, they should have a wrapper class");
        if (is_object($object) && ($reqClass != '' && ($reqClass != get_class($object)))) throw new InvalidArgumentException("Expected an object of type " . $reqClass . ', got ' . get_class($object));

        $serializer = SerializerBuilder::create()->build();

        return $serializer->serialize($object, $format);
    }

    /**
     * Convert an XML string to an object.
     *
     * @param string $value
     * @param string $type
     * @param string $format
     * @return mixed
     */
    public static function unmarshal($value, string $type, string $format = 'xml')
    {
        if (!is_string($value)) throw new InvalidArgumentException("Passed value is not an object.");

        $serializer = SerializerBuilder::create()->build();

        return $serializer->deserialize($value, $type, $format);
    }
}