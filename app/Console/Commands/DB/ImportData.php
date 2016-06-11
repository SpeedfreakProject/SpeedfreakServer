<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Console\Commands\DB;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Speedfreak\Entities\Product;
use PDO;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nfsw:import-data {db=SOAPBOX}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from the Soapbox database. Thanks, Nilzao!';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $db = new PDO('mysql:host=localhost;dbname=' . $this->argument('db') . ';charset=utf8mb4', 'root');

        $this->executeProducts($db);
    }

    private function executeProducts(PDO $db)
    {
        $statement = $db->prepare('SELECT * FROM PRODUCT');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

////        if (count($results) > 0 && count($results) == Product::all()->count()) {
////            $this->info('Nothing new to add.');
////            return;
////        }
////        if ((count($results) > 0) && count($results) == Product::all()->count()) {
////            $this->info('[Products] Nothing new.');
////            return;
////        }
////
////        $counter = 0;
////        $this->info(sprintf('Migrating %s products to database %s', count($results), 'nfsw_server'));
//        $counter = 0;
//        while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//            Log::info(json_encode($row));
//            $counter++;
//            $this->info(sprintf('Migrating product #' . $counter));
//
//            (new Product)->forceCreate([
//                'bundleItems' => $row['bundleItems'],
//                'categoryId' => $row['categoryId'],
//                'categoryName' => $row['categoryName'],
//                'currency' => $row['currency'],
//                'description' => $row['description'],
//                'durationMinute' => $row['durationMinute'],
//                'hash' => $row['hash'],
//                'icon' => $row['icon'],
//                'level' => $row['level'],
//                'longDescription' => $row['longDescription'],
//                'price' => $row['price'],
//                'priority' => $row['priority'],
//                'productId' => $row['productId'],
//                'productTitle' => $row['productTitle'],
//                'productType' => $row['productType'],
//                'secondaryIcon' => $row['secondaryIcon'],
//                'useCount' => $row['useCount'],
//                'visualStyle' => $row['visualStyle'],
//                'webIcon' => $row['webIcon'],
//                'webLocation' => $row['webLocation'],
//            ]);
//        }
    }
}
