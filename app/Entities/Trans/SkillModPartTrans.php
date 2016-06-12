<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Trans;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SkillModPartTrans
 * @package Speedfreak\Entities\Trans
 * @Serializer\XmlRoot(name="SkillModPartTrans")
 */
class SkillModPartTrans
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("SkillModPartAttribHash")
     * @Serializer\Type("string")
     */
    protected $skillModPartAttributeHash;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("IsFixed")
     * @Serializer\Type("string")
     */
    protected $isFixed;

    /**
     * @return string
     */
    public function getSkillModPartAttributeHash()
    {
        return $this->skillModPartAttributeHash;
    }

    /**
     * @param string $skillModPartAttributeHash
     */
    public function setSkillModPartAttributeHash($skillModPartAttributeHash)
    {
        $this->skillModPartAttributeHash = $skillModPartAttributeHash;
    }

    /**
     * @return string
     */
    public function getIsFixed()
    {
        return $this->isFixed;
    }

    /**
     * @param string $isFixed
     */
    public function setIsFixed($isFixed)
    {
        $this->isFixed = $isFixed;
    }
}