<?php

namespace Speedfreak\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Speedfreak\Entities\Achievements\AchievementDefinitionPacketType;
use Speedfreak\Entities\Achievements\AchievementManager;
use Speedfreak\Entities\Achievements\AchievementRankPacketType;
use Speedfreak\Entities\Achievements\AchievementRanksType;
use Speedfreak\Entities\Achievements\AchievementsPacketType;
use Speedfreak\Entities\Achievements\DefinitionsType;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;

class AchievementsController extends Controller
{
    public function loadAll(AchievementManager $achievementManager, PersonaRepository $personaRepository)
    {
        return Marshaller::marshal(
            $achievementManager->getAchievementsForPersona(
                $personaRepository->findById(100)
            ), AchievementsPacketType::class
        );
    }
}
