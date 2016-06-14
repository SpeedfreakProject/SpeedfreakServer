<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Importers;

use Illuminate\Console\Command;
use Speedfreak\Contracts\IEntityImporter;
use Speedfreak\Entities\VinylProduct;
use PDO;

class SoapboxVinylImporter implements IEntityImporter
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

        $statement = $db->prepare('SELECT * FROM VINYLPRODUCT');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0 and VinylProduct::all()->count() >= count($results)) {
            return false;
        }

        $bar = $output->createProgressBar(count($results));

        $command->info('Importing ' . count($results) . ' ' . str_plural('vinyl', count($results)));
        foreach($results as $i => $row) {
            (new VinylProduct)->forceCreate([
                'bundleItems' => $row['bundleItems'],
                'categoryId' => $row['categoryId'],
                'categoryName' => $row['categoryName'],
                'currency' => $row['currency'],
                'description' => $row['description'],
                'durationMinute' => $row['durationMinute'],
                'hash' => $row['hash'],
                'icon' => $row['icon'],
                'level' => $row['level'],
                'longDescription' => $row['longDescription'],
                'price' => $row['price'],
                'priority' => $row['priority'],
                'productId' => $row['productId'],
                'productTitle' => $row['productTitle'],
                'productType' => $row['productType'],
                'secondaryIcon' => $row['secondaryIcon'],
                'useCount' => $row['useCount'],
                'visualStyle' => $row['visualStyle'],
                'webIcon' => $row['webIcon'],
                'webLocation' => $row['webLocation'],
            ]);

            $bar->advance();
        }

        $bar->finish();
        echo PHP_EOL;
        return true;
    }

    public function hasNewStuff(PDO $db) : bool
    {
        $statement = $db->prepare('SELECT * FROM VINYLPRODUCT');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return !(count($results) > 0 and VinylProduct::all()->count() >= count($results));
    }
}