<?php

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use Speedfreak\Entities\Achievements\AchievementRankPacketType;
use Speedfreak\Entities\Achievements\AchievementRankPersonaPivot;

class AchievementRank extends Model
{
    protected $primaryKey = 'achievementRankId';

    /**
     * Many personas can belong to the rank.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personas()
    {
        return $this->belongsToMany(Persona::class)
            ->withTimestamps()
            ->withPivot('state', 'achievedOn');
    }

    /**
     * @inheritdoc
     */
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Persona) return new AchievementRankPersonaPivot($parent, $attributes, $table, $exists);

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}
