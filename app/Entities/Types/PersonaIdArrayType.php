<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class PersonaIdArrayType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="PersonaIdArray")
 */
class PersonaIdArrayType
{
    /**
     * @var PersonaIdsType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("PersonaIds")
     */
    protected $personaIds;

    /**
     * @return PersonaIdsType
     */
    public function getPersonaIds()
    {
        return $this->personaIds;
    }

    /**
     * @param PersonaIdsType $personaIds
     */
    public function setPersonaIds($personaIds)
    {
        $this->personaIds = $personaIds;
    }
}