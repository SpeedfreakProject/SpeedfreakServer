<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\API;

use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;

/**
 * Class APIUserDataType
 * @package Speedfreak\Entities\API
 * @Serializer\XmlRoot(name="UserData")
 */
class APIUserDataType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Id")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Email")
     */
    protected $email;

    /**
     * @var ArrayOfPersonaBaseType
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Personas")
     */
    protected $personas;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return ArrayOfPersonaBaseType
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * @param ArrayOfPersonaBaseType $personas
     */
    public function setPersonas($personas)
    {
        $this->personas = $personas;
    }
}