<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Traits;

use Speedfreak\Contracts\IValidationEntity;

trait ValidationEntity
{
    /**
     * The validation rules that should be used.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Custom validation messages to be used.
     * These are optional but recommended.
     *
     * @var array
     */
    protected $messages = [];

    /**
     * The validation errors.
     *
     * @var array
     */
    protected $errors = [];

    /**
     * @static
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function (IValidationEntity $model) {
            return $model->validate($model->getAttributes());
        });
    }

    /**
     * Validate the entity before it is persisted to the database.
     *
     * @param array $data
     * @return bool
     */
    public function validate(array $data) : bool
    {
        // make a new validator object
        $v = validator($data, $this->rules, $this->getMessages());

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors;

            return false;
        }

        // validation passed
        return true;
     }

    /**
     * Get an array of custom validation messages to use.
     *
     * @return array
     */
    public function getMessages() : array
    {
        return $this->messages;
    }

    /**
     * Get the validation errors.
     *
     * @return array
     */
    public function errors() : array
    {
        return $this->errors;
    }
 }