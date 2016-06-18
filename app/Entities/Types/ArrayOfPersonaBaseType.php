<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ArrayOfPersonaBaseType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ArrayOfPersonaBase")
 * @Serializer\AccessorOrder("custom",custom={"personaBase"})
 */
class ArrayOfPersonaBaseType
{
    /**
     * @var PersonaBaseType[]
     * @Serializer\XmlList(entry="PersonaBase", inline=true)
     */
    protected $personaBase;

    /**
     * ArrayOfPersonaBaseType constructor.
     * @param PersonaBaseType[] $personaBase
     */
    public function __construct(array $personaBase = [])
    {
        $this->personaBase = $personaBase;
    }

    /**
     * @return PersonaBaseType[]
     */
    public function getPersonaBase() : array
    {
        return $this->personaBase;
    }

    /**
     * @param PersonaBaseType[] $personaBase
     */
    public function setPersonaBase(array $personaBase)
    {
        $this->personaBase = $personaBase;
    }
}