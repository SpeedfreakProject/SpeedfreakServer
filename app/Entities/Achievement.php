<?php

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
use Speedfreak\Entities\Achievements\AchievementDefinitionPacketType;
use Speedfreak\Entities\Achievements\AchievementRankPacketType;
use Speedfreak\Entities\Achievements\AchievementRanksType;

class Achievement extends Model
{
    protected $primaryKey = 'achievementDefinitionId';

    /**
     * Many personas can have the achievement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personas()
    {
        return $this->belongsToMany(Persona::class)
            ->withTimestamps()
            ->withPivot('achievedOn');
    }

    /**
     * An achievement can have many ranks.
     * Makes sense...
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ranks()
    {
        return $this->hasMany(AchievementRank::class);
    }

    public function getDefinitionPacket(Pivot $pivot = null) : AchievementDefinitionPacketType
    {
        return new AchievementDefinitionPacketType(
            $this->getKey(),
            new AchievementRanksType($this->getRankTypes()->all()),
            $this->getKey(),
            $pivot ? $pivot->canProgress : false,
            $pivot ? $pivot->currentValue : 0,
            true,
            $this->progressText,
            'None'
        );
    }

    public function getRanksForPersona(Persona $persona) : Collection
    {
        return collect($this->ranks)->filter(function(AchievementRank $rank) use ($persona) {
            return collect($rank->personas->pluck('id'))->contains($persona->getKey());
        });
    }

    protected function getRankTypes() : Collection
    {
        return collect($this->ranks)->map(function(AchievementRank $achievementRank) {
            return $achievementRank->getType();
        });
    }
}
