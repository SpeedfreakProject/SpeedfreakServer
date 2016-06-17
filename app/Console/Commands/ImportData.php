<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Console\Commands;

use Illuminate\Console\Command;
use Speedfreak\Contracts\IEntityImporter;
use Speedfreak\Entities\Importers\SoapboxBasketImporter;
use Speedfreak\Entities\Importers\SoapboxCategoryImporter;
use Speedfreak\Entities\Importers\SoapboxCustomCarImporter;
use Speedfreak\Entities\Importers\SoapboxEventImporter;
use Speedfreak\Entities\Importers\SoapboxOwnedCarImporter;
use Speedfreak\Entities\Importers\SoapboxPersonaImporter;
use Speedfreak\Entities\Importers\SoapboxProductImporter;
use Speedfreak\Entities\Importers\SoapboxUserImporter;
use Speedfreak\Entities\Importers\SoapboxVinylImporter;
use PDO;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nfsw:data-import {db=SOAPBOX} {--info} {--importer=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Soapbox data';

    /**
     * The importers to use, and what data types they handle.
     *
     * @var array
     */
    protected $importers = [
        SoapboxProductImporter::class => 'Products',
        SoapboxPersonaImporter::class => 'Personas',
        SoapboxVinylImporter::class => 'Vinyls',
        SoapboxUserImporter::class => 'Users',
        SoapboxOwnedCarImporter::class => 'Owned Cars',
        SoapboxCustomCarImporter::class => 'Custom Cars',
        SoapboxEventImporter::class => 'Event Definitions',
        SoapboxBasketImporter::class => 'Basket Definitions',
        SoapboxCategoryImporter::class => 'Shop Categories',
    ];

    /**
     * An array of importer classes to use for lookups.
     *
     * @var array
     */
    protected $classMap = [
        SoapboxProductImporter::class,
        SoapboxPersonaImporter::class,
        SoapboxVinylImporter::class,
        SoapboxUserImporter::class,
        SoapboxOwnedCarImporter::class,
        SoapboxCustomCarImporter::class,
        SoapboxEventImporter::class,
        SoapboxBasketImporter::class,
        SoapboxCategoryImporter::class,
    ];

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
        if ($this->option('info')) {
            $this->info('Speedfreak Data Importer v1.0.0');
            $this->warn('Imports data from a Soapbox database.');
            $this->info('Written by coderleo/leorblx');
            $this->line('');
            $this->info('Currently registered importers:');
            $headers = ['Class', 'Type'];
            $data = [];
            foreach($this->importers as $class => $type) {
                $data[] = [$class, $type];
            }

            $data = collect($data)->sortBy(function($item) {
                return strtolower(class_basename($item[0]));
            })->values();

            $this->table($headers, $data);
        }
        else
        {
            $this->info('Speedfreak Data Importer v1.0.0');
            $this->warn('Imports data from a Soapbox database.');
            $this->info('Written by coderleo/leorblx');
            sleep(.5);
            $this->warn('Note: Run this at your own risk. Be sure to back up your database!');

            $db = new PDO('mysql:host=localhost;dbname=' . $this->argument('db') . ';charset=utf8mb4', 'root');

            if (!($importer = $this->option('importer'))) {
                $new = array_filter($this->classMap, function($value) use ($db) {
                    return app($value)->hasNewStuff($db);
                });

                if (count($new) == 0) {
                    $this->info('Nothing to import.');
                    return;
                }

                if (count($new) > 0) {
                    $this->warn('Some importers have new data to insert:');
                    foreach($new as $item) {
                        $this->info('- ' . $item);
                    }
                }

                if ($this->confirm('Do you wish to continue?')) {
                    foreach($new as $type) {
                        $this->comment('Now importing from ' . class_basename($type));
                        $time = microtime(true);
                        app($type)->import($db, $this);
                        $now = microtime(true);
                        $this->info('Finished working with ' . class_basename($type) . ' in ' . number_format((float)$diff = $now - $time, 2, '.', '') . ' ' . str_plural('second', round($diff, 2)));
                    }
                }
            }
            else {
                $index = array_search($importer, $this->classMap);
                if ($index === false) {
                    $this->warn(sprintf('Importer %s could not be found. Available importers: ', $importer));
                    foreach($this->importers as $value) {
                        $this->info('- ' . $value);
                    }

                    return;
                }

                $instance = app($this->importers[$index]);
                if ($instance->hasNewStuff($db)) {
                    $this->comment('Importing from ' . $importer);
                    $time = microtime(true);
                    $instance->import($db, $this);
                    $now = microtime(true);
                    $this->info('Finished working with ' . class_basename($this->importers[$index]) . ' in ' . number_format((float)$diff = $now - $time, 2, '.', '') . ' ' . str_plural('second', round($diff, 2)));
                } else {
                    $this->line(sprintf('<info>Nothing to import for class</info> <comment>%s</comment>', $importer));
                }
            }
        }
    }
}
