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
    protected $signature = 'nfsw:data-import {db=SOAPBOX}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Soapbox data';

    protected $importers = [
        SoapboxProductImporter::class,
        SoapboxPersonaImporter::class,
        SoapboxVinylImporter::class,
        SoapboxUserImporter::class,
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
        $db = new PDO('mysql:host=localhost;dbname=' . $this->argument('db') . ';charset=utf8mb4', 'root');

        foreach($this->importers as $importer) {
            $this->info('Now importing from ' . $importer);
            $time = microtime(true);
            $result = app($importer)->import($db, $this);
            $now = microtime(true);

            if (!$result) $this->info('Nothing to do for ' . $importer . '...');
            $this->info('Finished working with ' . $importer . ' in ' . ($diff = $now - $time) . ' ' . str_plural('second', round($diff, 2)));
        }
    }
}
