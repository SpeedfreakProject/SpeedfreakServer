<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts;

use SimpleXMLElement;

interface IEntityRepository
{
    /**
     * Return all of the entities.
     *
     * @return array
     */
    public function all() : array;

    /**
     * Manipulate a SimpleXMLElement instance
     * and add the appropriate child elements.
     *
     * @param SimpleXMLElement $element
     * @return SimpleXMLElement
     */
    public function makeXML(SimpleXMLElement $element) : SimpleXMLElement;

    public function getById($id);
}