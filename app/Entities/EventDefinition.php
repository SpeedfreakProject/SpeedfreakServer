<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities;

use Illuminate\Database\Eloquent\Model;
use Speedfreak\Entities\Types\EngagePointType;
use Speedfreak\Entities\Types\EventDefinitionType;
use Speedfreak\Entities\Types\RewardModesType;

class EventDefinition extends Model
{
    public function getEventType() : EventDefinitionType
    {
        $type = new EventDefinitionType;
        $type->setEventId($this->id);
        $type->setCarClassHash($this->carClassHash);
        $type->setCoins($this->coins);
        $type->setEngagePoint(new EngagePointType);
        $type->setEngagePointX($this->engagePointX);
        $type->setEngagePointY($this->engagePointY);
        $type->setEngagePointZ($this->engagePointZ);
        $type->setEventLocalization($this->eventLocalization);
        $type->setEventModeDescriptionLocalization($this->eventModeDescriptionLocalization);
        $type->setEventModeIcon($this->eventModeIcon);
        $type->setEventModeId($this->eventModeId);
        $type->setEventModeLocalization($this->eventModeLocalization);
        $type->setIsEnabled($this->isEnabled);
        $type->setIsLocked($this->isLocked);
        $type->setLaps($this->laps);
        $type->setLength($this->length);
        $type->setMaxClassRating($this->maxClassRating);
        $type->setMaxEntrants($this->maxEntrants);
        $type->setMaxLevel($this->maxLevel);
        $type->setMinClassRating($this->minClassRating);
        $type->setMinEntrants($this->minEntrants);
        $type->setMinLevel($this->minLevel);
        $type->setRegionLocalization($this->regionLocalization);
        $type->setRewardModes(new RewardModesType);
        $type->setRewardMode1($this->rewardMode1);
        $type->setRewardMode2($this->rewardMode2);
        $type->setRewardMode3($this->rewardMode3);
        $type->setTimeLimit($this->timeLimit);
        $type->setTrackLayoutMap($this->trackLayoutMap);
        $type->setTrackLocalization($this->trackLocalization);

        return $type;
    }
}
