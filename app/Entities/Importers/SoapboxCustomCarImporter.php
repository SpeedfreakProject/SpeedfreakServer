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
use Speedfreak\Entities\CustomCar;
use Speedfreak\Entities\Types\PaintsType;
use Speedfreak\Entities\Types\PerformancePartsType;
use Speedfreak\Entities\Types\SkillModPartsType;
use Speedfreak\Entities\Types\VinylsType;
use Speedfreak\Entities\Types\VisualPartsType;
use Speedfreak\Entities\Utilities\Marshaller;

class SoapboxCustomCarImporter implements IEntityImporter
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
        $statement = $db->prepare('SELECT * FROM CUSTOMCAR');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0 and CustomCar::all()->count() >= count($results)) {
            $command->info('Nothing to import.');
            return false;
        }

        $command->info('Importing ' . count($results) . ' custom ' . str_plural('car', count($results)));

        foreach($results as $i => $value) {
            $command->info('Importing custom car #' . ($i + 1));
            CustomCar::forceCreate([
                'baseCarId' => $value['BaseCarId'],
                'carClassHash' => $value['CarClassHash'],
                'isPreset' => $value['IsPreset'],
                'level' => $value['Level'],
                'name' => $value['Name'],
                'apiId' => $value['ApiId'],
                'paints' => Marshaller::unmarshal($value['Paints'], PaintsType::class),
                'performanceParts' => Marshaller::unmarshal($value['PerformanceParts'], PerformancePartsType::class),
                'physicsProfileHash' => $value['PhysicsProfileHash'],
                'rating' => $value['Rating'],
                'resalePrice' => $value['ResalePrice'],
                'skillModParts' => Marshaller::unmarshal($value['SkillModParts'], SkillModPartsType::class),
                'skillModSlotCount' => $value['SkillModSlotCount'],
                'vinyls' => Marshaller::unmarshal($value['Vinyls'], VinylsType::class),
                'visualParts' => Marshaller::unmarshal($value['VisualParts'], VisualPartsType::class),
                'idParentOwnedCarTrans' => $value['IdParentOwnedCarTrans'],
            ]);
        }

        return true;
    }
}