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
use Speedfreak\Entities\BasketDefinition;

class SoapboxBasketImporter implements IEntityImporter
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

        $statement = $db->prepare('SELECT * FROM BASKETDEFINITION');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0 and BasketDefinition::all()->count() >= count($results)) {
            return false;
        }

        $bar = $output->createProgressBar(count($results));
        $command->info('Importing ' . count($results) . ' basket ' . str_plural('definition', count($results)));

        foreach($results as $value) {
            BasketDefinition::forceCreate([
                'id' => $value['id'],
                'productId' => $value['ProductId'],
                'ownedCarTrans' => $value['OwnedCarTrans']
            ]);

            $bar->advance();
        }

        $bar->finish();
        echo PHP_EOL;
        return true;
    }

    public function hasNewStuff(PDO $db) : bool
    {
        $statement = $db->prepare('SELECT * FROM BASKETDEFINITION');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return !(count($results) > 0 and BasketDefinition::all()->count() >= count($results));
    }
}