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
 * Class PersonaMottoType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\XmlRoot(name="PersonaMotto")
 * @Serializer\AccessorOrder("custom", custom={"message", "personaId"})
 */
class PersonaMottoType
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $message = "";

    /**
     * @var int
     * @Serializer\Type("int")
     */
    private $personaId = -1;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getPersonaId()
    {
        return $this->personaId;
    }

    /**
     * @param int $personaId
     */
    public function setPersonaId($personaId)
    {
        $this->personaId = $personaId;
    }
}