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

class CarClassType
{
    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CarClassHash")
     */
    protected $carClassHash;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MaxRating")
     */
    protected $maxRating;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("MinRating")
     */
    protected $minRating;

    /**
     * CarClassType constructor.
     * @param int $carClassHash
     * @param int $maxRating
     * @param int $minRating
     */
    public function __construct(int $carClassHash = 0, int $maxRating = 999, int $minRating = 0)
    {
        $this->setCarClassHash($carClassHash);
        $this->setMaxRating($maxRating);
        $this->setMinRating($minRating);
    }

    /**
     * @return int
     */
    public function getCarClassHash()
    {
        return $this->carClassHash;
    }

    /**
     * @param int $carClassHash
     */
    public function setCarClassHash($carClassHash)
    {
        $this->carClassHash = $carClassHash;
    }

    /**
     * @return int
     */
    public function getMaxRating()
    {
        return $this->maxRating;
    }

    /**
     * @param int $maxRating
     */
    public function setMaxRating($maxRating)
    {
        $this->maxRating = $maxRating;
    }

    /**
     * @return int
     */
    public function getMinRating()
    {
        return $this->minRating;
    }

    /**
     * @param int $minRating
     */
    public function setMinRating($minRating)
    {
        $this->minRating = $minRating;
    }
}