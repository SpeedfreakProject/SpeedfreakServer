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
     * @param object $object
     * @return string
     */
    public static function marshal($object) : string
    {
        if (!is_object($object)) throw new InvalidArgumentException("What? That's not an object.");
        if ($object instanceof Model || $object instanceof Collection) throw new InvalidArgumentException("Can not marshal models or model collections, they should have a wrapper class");

        $serializer = SerializerBuilder::create()->build();

        return $serializer->serialize($object, 'xml');
    }

    /**
     * Convert an XML string to an object.
     *
     * @param string $value
     * @param string $type
     * @return mixed
     */
    public static function unmarshal($value, string $type)
    {
        if (!is_string($value)) throw new InvalidArgumentException("Passed value is not an object.");

        $serializer = SerializerBuilder::create()->build();

        return $serializer->deserialize($value, $type, 'xml');
    }
}