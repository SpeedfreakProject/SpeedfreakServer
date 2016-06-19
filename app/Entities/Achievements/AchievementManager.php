<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Achievements;

use Carbon\Carbon;
use Speedfreak\Contracts\Achievements\IAchievementManager;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Entities\Achievement;
use Speedfreak\Entities\AchievementRank;
use Speedfreak\Entities\Persona;

class AchievementManager implements IAchievementManager
{
    /**
     * Generate a packet of achievement definitions.
     * This can be serialized into XML.
     *
     * @return AchievementsPacketType
     */
    public function generatePacket() : AchievementsPacketType
    {
        return new AchievementsPacketType(new DefinitionsType([
            new AchievementDefinitionPacketType(1, new AchievementRanksType([
                new AchievementRankPacketType(
                    Carbon::now()->toIso8601String(), -1, true, 1337, 9999, 100, 'hacker', 'cash'
                ), new AchievementRankPacketType(
                    Carbon::now()->toIso8601String(), -1, true, 1337, 1200000, 500, 'hacker!!!!!!', 'cash'
                )
            ])),
        ]), new BadgesType([
            new BadgeDefinitionPacketType(
                'ACH_ICON_BG_COMPETE',
                1,
                'ACH_ICON_FRAME',
                'GM_ACHIEVEMENT_0000013D',
                'ACH_INCUR_COSTTOSTATE',
                'GM_ACHIEVEMENT_00000026'
            )
        ]));
    }

    /**
     * Get all of the given persona's achievements.
     *
     * @param Persona $persona
     * @return AchievementsPacketType
     */
    public function getAchievementsForPersona(Persona $persona) : AchievementsPacketType
    {
        return new AchievementsPacketType(
            new DefinitionsType(
                collect($persona->achievements)->map(function(Achievement $achievement) use ($persona) {
                    return new AchievementDefinitionPacketType(
                        $achievement->getKey(),
                        new AchievementRanksType($achievement->getRanksForPersona($persona)->all()),
                        $achievement->badgeDefinitionId,
                        $achievement->pivot->canProgress,
                        $achievement->pivot->currentValue,
                        true,
                        $achievement->pivot->progressText,
                        $achievement->statConversion
                    );
                })->all()
            ),
            new BadgesType([
                new BadgeDefinitionPacketType(
                    'ACH_ICON_BG_COMPETE',
                    1,
                    'ACH_ICON_FRAME',
                    'GM_ACHIEVEMENT_0000013D',
                    'ACH_INCUR_COSTTOSTATE',
                    'GM_ACHIEVEMENT_00000026'
                )
            ])
        );
    }

    /**
     * Activate an achievement rank for a persona.
     *
     * @param AchievementRank $rank
     * @param Persona $persona
     * @param array $context
     * @throws EngineException
     */
    public function activateRank(AchievementRank $rank, Persona $persona, array $context = [])
    {
        if (!($persona->ranks->contains($rank))) {
            $persona->ranks()->attach($rank, [
                'achievedOn' => Carbon::now()->toIso8601String()
            ]);

            return;
        }

        throw new EngineException('This persona already has this rank.');
    }

    /**
     * Isn't it obvious? The exact opposite of activateRank.
     *
     * @param AchievementRank $rank
     * @param Persona $persona
     * @param array $context
     * @throws EngineException
     */
    public function deactivateRank(AchievementRank $rank, Persona $persona, array $context = [])
    {
        if ($persona->ranks->contains($rank)) {
            $persona->ranks()->detach($rank);

            return;
        }

        throw new EngineException('This persona does not have this rank.');
    }
}