<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Custom;

class PaintTrans
{
    private $slot;

    private $sat;

    private $hue;

    private $var;

    private $group;

    /**
     * PaintTrans constructor.
     * @param int $slot
     * @param int $sat
     * @param int $hue
     * @param int $var
     * @param int $group
     */
    public function __construct(int $slot, int $sat, int $hue, int $var, int $group)
    {
        $this->slot = $slot;
        $this->sat = $sat;
        $this->hue = $hue;
        $this->var = $var;
        $this->group = $group;
    }

    /**
     * @return int
     */
    public function getSlot() : int
    {
        return $this->slot;
    }

    /**
     * @param mixed $slot
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;
    }

    /**
     * @return int
     */
    public function getSat() : int
    {
        return $this->sat;
    }

    /**
     * @param mixed $sat
     */
    public function setSat($sat)
    {
        $this->sat = $sat;
    }

    /**
     * @return int
     */
    public function getHue() : int
    {
        return $this->hue;
    }

    /**
     * @param mixed $hue
     */
    public function setHue($hue)
    {
        $this->hue = $hue;
    }

    /**
     * @return int
     */
    public function getVar() : int
    {
        return $this->var;
    }

    /**
     * @param mixed $var
     */
    public function setVar($var)
    {
        $this->var = $var;
    }

    /**
     * @return int
     */
    public function getGroup() : int
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }
}