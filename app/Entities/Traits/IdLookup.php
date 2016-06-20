<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Traits;

trait IdLookup
{
    /**
     * @param int $id
     * @static
     * @return static
     */
    public static function findById(int $id)
    {
        return self::query()->find($id);
    }

    /**
     * @param int $id
     * @static
     * @return static
     */
    public static function findByIdOrFail(int $id)
    {
        return self::query()->findOrFail($id);
    }

    /**
     * Get the first model where the given fields are matched.
     *
     * @param array $fields
     * @param array $columns
     * @return static
     */
    public static function firstWhere(array $fields = [], array $columns = ['*'])
    {
        /* @var \Illuminate\Database\Eloquent\Builder $builder */
        $builder = self::query();

        foreach($fields as $key => $value) {
            $builder->where($key, self::parseOperator($value), $value);
        }

        return $builder->first($columns);
    }

    protected static function parseOperator(string $value) : string
    {
        preg_match('/(<|>)[A-Za-z0-9]+/', $value, $matches, 0);

        if (count($matches) > 0) {
            return $matches[0];
        }

        return '=';
    }
}