<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Importers;

use Illuminate\Console\Command;
use PDO;
use Speedfreak\Contracts\IEntityImporter;
use Speedfreak\Entities\EventDefinition;

class SoapboxEventImporter implements IEntityImporter
{
    /**
     * Import data from another database.
     *
     * @param PDO $db
     * @param Command $command
     * @return bool
     */
    public function import(PDO $db, Command $command) : bool
    {
        /* @var \Illuminate\Console\OutputStyle $output */
        $output = $command->getOutput();

        $statement = $db->prepare('SELECT * FROM EVENTDEFINITION');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0 and EventDefinition::all()->count() >= count($results)) {
            return false;
        }

        $bar = $output->createProgressBar(count($results));
        $command->info('Importing ' . count($results) . ' ' . str_plural('event', count($results)));

        foreach($results as $event) {
            EventDefinition::forceCreate([
                'eventId' => $event['eventId'],
                'carClassHash' => $event['carClassHash'],
                'coins' => $event['coins'],
                'engagePointX' => $event['engagePointX'],
                'engagePointY' => $event['engagePointY'],
                'engagePointZ' => $event['engagePointZ'],
                'eventLocalization' => $event['eventLocalization'],
                'eventModeDescriptionLocalization' => $event['eventModeDescriptionLocalization'],
                'eventModeIcon' => $event['eventModeIcon'],
                'eventModeId' => $event['eventModeId'],
                'eventModeLocalization' => $event['eventModeLocalization'],
                'isEnabled' => $event['isEnabled'],
                'isLocked' => $event['isLocked'],
                'laps' => $event['laps'],
                'length' => $event['length'],
                'maxClassRating' => $event['maxClassRating'],
                'maxEntrants' => $event['maxEntrants'],
                'maxLevel' => $event['maxLevel'],
                'minClassRating' => $event['minClassRating'],
                'minEntrants' => $event['minEntrants'],
                'minLevel' => $event['minLevel'],
                'regionLocalization' => $event['regionLocalization'],
                'rewardMode1' => $event['rewardMode1'],
                'rewardMode2' => $event['rewardMode2'],
                'rewardMode3' => $event['rewardMode3'],
                'timeLimit' => $event['timeLimit'],
                'trackLayoutMap' => $event['trackLayoutMap'],
                'trackLocalization' => $event['trackLocalization'],
            ]);

            $bar->advance();
        }

        $bar->finish();
        echo PHP_EOL;
        return true;
    }

    public function hasNewStuff(PDO $db) : bool
    {
        $statement = $db->prepare('SELECT * FROM EVENTDEFINITION');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return !(count($results) > 0 and EventDefinition::all()->count() >= count($results));
    }
}