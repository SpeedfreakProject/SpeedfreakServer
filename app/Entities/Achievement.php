<?php

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Speedfreak\Entities\Achievements\AchievementDefinitionPacketType;
use Speedfreak\Entities\Achievements\AchievementRankPacketType;
use Speedfreak\Entities\Achievements\AchievementRanksType;

class Achievement extends Model
{
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

    public function getDefinitionPacket() : AchievementDefinitionPacketType
    {
        return new AchievementDefinitionPacketType(
            $this->getKey(),
            new AchievementRanksType($this->getRankTypes()->all()),
            $this->badgeDefinitionId,
            false,
            0,
            true,
            '',
            'None'
        );
    }

    protected function getRankTypes() : Collection
    {
        return collect($this->ranks)->map(function(AchievementRank $achievementRank) {
            return new AchievementRankPacketType(
                'N/A',
                $achievementRank->getKey(),
                $achievementRank->isRare,
                $achievementRank->rank,
                $achievementRank->points,
                $achievementRank->rarity,
                $achievementRank->rewardDescription,
                $achievementRank->rewardType,
                $achievementRank->rewardVisualStyle,
                'N/A',
                $achievementRank->thresholdValue
            );
        });
    }
}
