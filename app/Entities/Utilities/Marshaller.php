<?php

namespace Speedfreak\Entities\Utilities;

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
        if (is_object($object) && $object instanceof Model) throw new InvalidArgumentException("Can not marshal models, they should have a wrapper class");

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