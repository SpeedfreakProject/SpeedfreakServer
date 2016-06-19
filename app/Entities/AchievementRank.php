<?php

namespace Speedfreak\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
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

    public function getType(Pivot $pivot = null) : AchievementRankPacketType
    {
        new AchievementRankPacketType(
            $pivot ? Carbon::parse($pivot->achievedOn)->toIso8601String() : 'N/A',
            $this->getKey(),
            $this->isRare,
            $this->rank,
            $this->points,
            $this->rarity,
            $this->rewardDescription,
            $this->rewardType,
            $this->rewardVisualStyle,
            $pivot ? $pivot->state : 'N/A',
            $this->thresholdValue
        );
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
