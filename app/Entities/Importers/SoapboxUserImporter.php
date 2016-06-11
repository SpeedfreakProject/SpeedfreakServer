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
use Speedfreak\User;
use PDO;

class SoapboxUserImporter implements IEntityImporter
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
        $statement = $db->prepare('SELECT * FROM USER');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0 and User::all()->count() >= count($results)) {
            $command->info('Nothing to import.');
            return false;
        }

        $command->info('Importing ' . count($results) . ' ' . str_plural('user', count($results)));

        foreach($results as $i => $row) {
            $command->info('Importing user #' . ($i + 1));
            User::forceCreate([
                'email' => $row['EMAIL'],
                'password' => bcrypt($row['PASSWORD']),
            ]);
        }
        
        return true;
    }
}