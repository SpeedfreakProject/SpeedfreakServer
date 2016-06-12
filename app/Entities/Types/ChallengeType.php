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
 * Class ChallengeType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ChallengeType")
 * @Serializer\AccessorOrder("custom", custom={"challengeId", "leftSize", "pattern", "rightSize"})
 */
class ChallengeType
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ChallengeId")
     */
    protected $challengeId;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("LeftSize")
     */
    protected $leftSize;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Pattern")
     */
    protected $pattern;

    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("RightSize")
     */
    protected $rightSize;

    /**
     * @return string
     */
    public function getChallengeId()
    {
        return $this->challengeId;
    }

    /**
     * @param string $challengeId
     */
    public function setChallengeId($challengeId)
    {
        $this->challengeId = $challengeId;
    }

    /**
     * @return int
     */
    public function getLeftSize()
    {
        return $this->leftSize;
    }

    /**
     * @param int $leftSize
     */
    public function setLeftSize($leftSize)
    {
        $this->leftSize = $leftSize;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @return int
     */
    public function getRightSize()
    {
        return $this->rightSize;
    }

    /**
     * @param int $rightSize
     */
    public function setRightSize($rightSize)
    {
        $this->rightSize = $rightSize;
    }
}