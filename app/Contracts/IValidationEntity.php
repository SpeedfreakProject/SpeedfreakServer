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

interface IValidationEntity
{
    /**
     * Validate the entity before it is persisted to the database.
     *
     * @param array $data
     * @return bool
     */
    public function validate(array $data) : bool;

    /**
     * Get an array of custom validation messages to use.
     *
     * @return array
     */
    public function getMessages() : array;

    /**
     * Get the validation errors.
     *
     * @return array
     */
    public function errors() : array;
}