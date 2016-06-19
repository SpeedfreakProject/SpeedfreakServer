<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Achievements;

use Speedfreak\Entities\AchievementRank;
use Speedfreak\Entities\Achievements\AchievementsPacketType;
use Speedfreak\Entities\Persona;

interface IAchievementManager
{
    /**
     * Generate a packet of achievement definitions.
     * This can be serialized into XML.
     *
     * @return AchievementsPacketType
     */
    public function generatePacket() : AchievementsPacketType;

    /**
     * Get all of the given persona's achievements.
     *
     * @param Persona $persona
     * @return AchievementsPacketType
     */
    public function getAchievementsForPersona(Persona $persona) : AchievementsPacketType;

    /**
     * Activate an achievement rank for a persona.
     *
     * @param AchievementRank $rank
     * @param Persona $persona
     * @param array $context
     * @return void
     */
    public function activateRank(AchievementRank $rank, Persona $persona, array $context = []);

    /**
     * Isn't it obvious? The exact opposite of activateRank.
     *
     * @param AchievementRank $rank
     * @param Persona $persona
     * @param array $context
     * @return void
     */
    public function deactivateRank(AchievementRank $rank, Persona $persona, array $context = []);
}