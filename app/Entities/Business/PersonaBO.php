<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Business;

use Speedfreak\Entities\OwnedCar;
use Speedfreak\Entities\Repositories\OwnedCarRepository;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Repositories\ProductRepository;

use Speedfreak\Contracts\Business\PersonaBO as Contract;
use Speedfreak\Entities\Types\ArrayOfOwnedCarTrans;
use Speedfreak\Entities\Types\CarSlotInfoTrans;
use Speedfreak\Entities\Types\CarsOwnedByPersonaList;
use Speedfreak\Entities\Types\CommerceSessionResultTransType;
use Speedfreak\Entities\Types\ObtainableSlotsList;
use Speedfreak\Entities\Types\UpdatedCarType;

class PersonaBO implements Contract
{
    /**
     * @var OwnedCarRepository
     */
    private $ownedCarRepository;

    /**
     * @var ProductRepository
     */
    private $productRepository;
    
    /**
     * @var PersonaRepository
     */
    private $personaRepository;

    /**
     * PersonaBO constructor.
     * @param OwnedCarRepository $ownedCarRepository
     * @param ProductRepository $productRepository
     * @param PersonaRepository $personaRepository
     */
    public function __construct(
        OwnedCarRepository $ownedCarRepository,
        ProductRepository $productRepository,
        PersonaRepository $personaRepository)
    {
        $this->ownedCarRepository = $ownedCarRepository;
        $this->productRepository = $productRepository;
        $this->personaRepository = $personaRepository;
    }

    public function carslots(int $personaId) : CarSlotInfoTrans
    {
        $ownedCars = $this->ownedCarRepository->findByPersonaId($personaId);
        $carSlotInfoTrans = new CarSlotInfoTrans;
        $carsOwnedByPersonaList = new CarsOwnedByPersonaList;
        $carSlotInfoTrans->setCarsOwnedByPersonaList($carsOwnedByPersonaList);

        if ($ownedCars->count() > 0) {
            $carsOwnedByPersonaList->setOwnedCarList($ownedCars->all());
        }

        $carSlotInfoTrans->setDefaultOwnedCarIndex($this->personaRepository->findById($personaId)->curCarIndex);
        $carSlotInfoTrans->setOwnedCarSlotsCount(1);

        $obtainableSlotsList = new ObtainableSlotsList;

        $productList = [];
        $carSlotProductData = $this->productRepository->findByProductId('SRV-CARSLOT');

        $productList[] = $carSlotProductData;
        $obtainableSlotsList->setProductTransList($productList);

        $carSlotInfoTrans->setObtainableSlots($obtainableSlotsList);

        return $carSlotInfoTrans;
    }

    public function commerce(int $personaId, UpdatedCarType $updatedCar) : CommerceSessionResultTransType
    {
        return new CommerceSessionResultTransType;
    }

    public function basket(int $personaId, string $productId) : CommerceSessionResultTransType
    {
        return new CommerceSessionResultTransType;
    }

    public function defaultCar(int $personaId)
    {
        $persona = $this->personaRepository->findById($personaId);
        $ownedCars = $this->ownedCarRepository->findByPersonaId($personaId);
        $curCarIndex = $persona->curCarIndex;

        if ($ownedCars->count() > 0) {
            if ($curCarIndex > $ownedCars->count()) {
                $curCarIndex--;
                $ownedCar = $ownedCars->get($curCarIndex);
                $this->changeDefaultCar($personaId, $ownedCar->id);
            }

            $ownedCar = $ownedCars->get($curCarIndex);

            return $ownedCar;
        }

        return null;
    }

    public function changeDefaultCar(int $personaId, int $defaultCarId)
    {
        $persona = $this->personaRepository->findById($personaId);
        $ownedCars = $this->ownedCarRepository->findByPersonaId($personaId);
        $i = 0;

        foreach($ownedCars as $ownedCar) {
            if ($ownedCar->uniqueCarId == $defaultCarId) {
                break;
            }
            $i++;
        }

        $persona->forceFill([
            'curCarIndex' => $i
        ])->save();
    }

    public function getCars(int $personaId) : ArrayOfOwnedCarTrans
    {
        $arrayOfOwnedCarTrans = new ArrayOfOwnedCarTrans;
        $persona = $this->personaRepository->findById($personaId);
        $arrayOfOwnedCarTrans->setOwnedCarTrans($persona->ownedCars->all());

        return $arrayOfOwnedCarTrans;
    }

    public function sellCar(int $personaId, int $carId)
    {
        OwnedCar::findByIdOrFail($carId)->delete();

        return $this->defaultCar($personaId);
    }
}