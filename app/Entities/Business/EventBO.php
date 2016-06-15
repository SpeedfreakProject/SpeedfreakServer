<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Business;

use Speedfreak\Contracts\Business\EventBO as Contract;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Types\AccoladesType;
use Speedfreak\Entities\Types\FinalRewardsType;
use Speedfreak\Entities\Types\OriginalRewardsType;
use Speedfreak\Entities\Types\PursuitEventResultType;

class EventBO implements Contract
{
    /**
     * @var PersonaRepository
     */
    private $personaRepository;

    public function __construct(PersonaRepository $personaRepository)
    {
        $this->personaRepository = $personaRepository;
    }
    
    public function arbitration(int $personaId, string $arbitrationXml) : PursuitEventResultType
    {
        $persona = $this->personaRepository->findById($personaId);
        $level = $persona->level;
        if ($level == 1) {
            $persona->forceFill(['level' => 2])->save();
        }

        $persona->forceFill(['cash' => $persona->cash + 133769420])->save();
        $pursuitResult = new PursuitEventResultType;
        $pursuitResult->setDurability(100);
        $pursuitResult->setEventId(1);
        $pursuitResult->setEventSessionId(1000000000);
        $pursuitResult->setExitPath('ExitToFreeroam');
        $pursuitResult->setInviteLifetimeInMilliseconds(0);
        $pursuitResult->setLobbyInviteId(0);
        $pursuitResult->setPersonaId($personaId);
        $pursuitResult->setHeat(1);

        $finalRewards = new FinalRewardsType;
        $finalRewards->setRep(1337);
        $finalRewards->setTokens(133769420);

        $originalAwards = new OriginalRewardsType;
        $originalAwards->setRep(1337);
        $originalAwards->setTokens(133769420);

        $accolades = new AccoladesType;
        $accolades->setHasLeveledUp('false');
        $accolades->setLuckyDrawInfo('');
        $accolades->setRewardInfo('');
        $accolades->setFinalRewards($finalRewards);
        $accolades->setOriginalRewards($originalAwards);

        $pursuitResult->setAccolades($accolades);

        return $pursuitResult;
    }

    public function bust(int $personaId) : PursuitEventResultType
    {
        $pursuitResult = new PursuitEventResultType;
        $pursuitResult->setDurability(100);
        $pursuitResult->setEventId(1);
        $pursuitResult->setEventSessionId(1000000000);
        $pursuitResult->setExitPath('ExitToFreeroam');
        $pursuitResult->setInviteLifetimeInMilliseconds(0);
        $pursuitResult->setLobbyInviteId(0);
        $pursuitResult->setPersonaId($personaId);
        $pursuitResult->setHeat(1);

        $finalRewards = new FinalRewardsType;
        $finalRewards->setRep(0);
        $finalRewards->setTokens(0);

        $originalAwards = new OriginalRewardsType;
        $originalAwards->setRep(0);
        $originalAwards->setTokens(0);

        $accolades = new AccoladesType;
        $accolades->setHasLeveledUp('false');
        $accolades->setLuckyDrawInfo('');
        $accolades->setRewardInfo('');
        $accolades->setFinalRewards($finalRewards);
        $accolades->setOriginalRewards($originalAwards);

        $pursuitResult->setAccolades($accolades);

        return $pursuitResult;
    }
}