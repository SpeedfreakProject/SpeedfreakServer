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
use Speedfreak\Entities\Trans\SkillModPartTrans;

/**
 * Class SkillModPartsType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="SkillModParts")
 */
class SkillModPartsType
{
    /**
     * @var SkillModPartTrans[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(entry="SkillModPartTrans", inline=true)
     * @Serializer\Type("array<Speedfreak\Entities\Trans\SkillModPartTrans>")
     */
    protected $skillModPartTrans = [];

    /**
     * @return \Speedfreak\Entities\Trans\SkillModPartTrans[]
     */
    public function getSkillModPartTrans()
    {
        return $this->skillModPartTrans;
    }

    /**
     * @param \Speedfreak\Entities\Trans\SkillModPartTrans[] $skillModPartTrans
     */
    public function setSkillModPartTrans($skillModPartTrans)
    {
        $this->skillModPartTrans = $skillModPartTrans;
    }
}