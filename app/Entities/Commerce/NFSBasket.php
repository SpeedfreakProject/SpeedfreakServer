<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Commerce;

use Illuminate\Log\Writer;
use Illuminate\Support\Str;
use Speedfreak\Contracts\Commerce\INFSBasket;
use Speedfreak\Contracts\Commerce\ShoppingCartPurchaseResult;
use Speedfreak\Entities\Business\PersonaBO;
use Speedfreak\Entities\CustomCar;
use Speedfreak\Entities\OwnedCar;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Repositories\BasketDefinitionRepository;
use Speedfreak\Entities\Repositories\OwnedCarRepository;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Repositories\ProductRepository;
use Speedfreak\Entities\Types\CommerceResultTransType;
use Speedfreak\Entities\Types\CustomCarType;
use Speedfreak\Entities\Types\InventoryItemsType;
use Speedfreak\Entities\Types\InventoryItemTransType;
use Speedfreak\Entities\Types\PurchasedCarsType;
use Speedfreak\Entities\Types\WalletsType;
use Speedfreak\Entities\Types\WalletTransType;

class NFSBasket implements INFSBasket
{
    /**
     * The logger instance.
     *
     * @var Writer
     */
    private $logger;

    /**
     * @var NFSEconomy
     */
    private $economy;

    /**
     * @var BasketDefinitionRepository
     */
    private $basketDefinitionRepository;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var PersonaBO
     */
    private $personaBO;
    
    /**
     * @var OwnedCarRepository
     */
    private $ownedCarRepository;

    /**
     * @var PersonaRepository
     */
    private $personaRepository;

    /**
     * NFSBasket constructor.
     * @param Writer $logger
     * @param NFSEconomy $economy
     * @param BasketDefinitionRepository $basketDefinitionRepository
     * @param OwnedCarRepository $ownedCarRepository
     * @param ProductRepository $productRepository
     * @param PersonaRepository $personaRepository
     * @param PersonaBO $personaBO
     */
    public function __construct(
        Writer $logger,
        NFSEconomy $economy,
        BasketDefinitionRepository $basketDefinitionRepository,
        OwnedCarRepository $ownedCarRepository,
        ProductRepository $productRepository,
        PersonaRepository $personaRepository,
        PersonaBO $personaBO
    ) {
        $this->logger = $logger;
        $this->economy = $economy;
        $this->basketDefinitionRepository = $basketDefinitionRepository;
        $this->productRepository = $productRepository;
        $this->personaBO = $personaBO;
        $this->ownedCarRepository = $ownedCarRepository;
        $this->personaRepository = $personaRepository;
    }

    /**
     * Process a string of basket XML.
     *
     * @param string $basketXml
     * @return void
     */
    public function processBasket(string $basketXml)
    {
        // TODO: Implement processBasket() method.
    }

    /**
     * Sell a car by its serial number.
     * Requires passing in the persona that owns the car
     * so we don't get people selling someone else's cars.
     * That would *not* be good.
     *
     * @param Persona $persona
     * @param int $serialNumber
     * @return bool
     */
    public function sellCar(Persona $persona, int $serialNumber) : bool
    {
        // Before we do anything else, check and see if they have more than one car.
        if (!($persona->ownedCars->count() > 1)) {
            // they don't have more than one car, so don't let them sell it.
            $this->logger->warning(sprintf('Persona %s tried to sell their only car. Not happening :^)'));
            return false;
        }

        /* @var OwnedCar $car */
        $car = $persona->ownedCars()->find($serialNumber);

        if (!$car) {
            $this->logger->warning(sprintf('Persona %s tried to sell a car they do not own (serial # - %s.) Thief!!!', $persona->getKey(), $serialNumber));
            return false;
        }

        /* @var CustomCarType $customCar */
        $customCar = $car->customCar()->first()->getCustomCarType();
        if (!$customCar) {
            $this->logger->warning(sprintf('No custom car record exists for owned car ID %s', $car->getKey()));
            return false;
        }

        $this->logger->info(sprintf('Selling car (serial # - %s) from persona %s', $serialNumber, $persona->getKey()));
        $car->delete();
        $this->logger->info(sprintf('Sold car (serial # - %s.)', $serialNumber));

        $this->economy->transaction($persona, $customCar->getResalePrice(), 'CASH', false);

        return true;
    }

    /**
     * Map a basket ID to the appropriate category ID.
     *
     * @param string $basketId
     * @return string|null
     */
    public function mapBasketIdToCategory(string $basketId)
    {
        if (Str::contains($basketId, 'SRV-POWERUP')) {
            return 'STORE_POWERUPS';
        } elseif (Str::contains($basketId, 'SRV-CARSLOT')) {
            return 'NFSW_NA_EP_CARSLOTS';
        } elseif (Str::contains($basketId, 'SRV-REPAIR')) {
            return 'NFSW_NA_EP_REPAIRS';
        } elseif (Str::contains($basketId, 'SRV-THREVIVE')) {
            return 'STORE_STREAK_RECOVERY';
        } elseif (Str::contains($basketId, 'SRV-CAR')) {
            return 'NFSW_NA_EP_PRESET_RIDES_ALL_Category';
        }

        return null;
    }

    /**
     * Purchase a car.
     *
     * @param Persona $persona
     * @param string $productId
     * @return CommerceResultTransType|null
     */
    public function purchaseCar(Persona $persona, string $productId)
    {
        $basketDef = $this->basketDefinitionRepository->findByProductId($productId);
        $product = $this->productRepository->findByProductId($productId);
        $commerceResultType = new CommerceResultTransType;
        $purchasedCarsType = new PurchasedCarsType;

        if (!$product) {
            $this->logger->warning(sprintf(
                'Persona %s tried to purchase a car that does not exist: %s', $persona->getKey(), $productId
            ));

            return null;
        }

        $this->economy->transaction($persona, $product->price, NFSEconomy::CURRENCY_IGC, true);

        $walletsType = new WalletsType;
        $cashWallet = new WalletTransType;
        $cashWallet->setCurrency('CASH');
        $cashWallet->setBalance((int) $persona->fresh()->getAttribute('cash'));
        $walletsType->setWalletTrans($cashWallet);
        $commerceResultType->setWallets($walletsType);

        // create dummy response
        $inventoryItemTransType = new InventoryItemTransType;
        $inventoryItemsType = new InventoryItemsType;
        $inventoryItemsType->setInventoryItemTransType($inventoryItemTransType);

        $commerceResultType->setCommerceItems('');
        $commerceResultType->setInvalidBasket('');
        $commerceResultType->setInventoryItemsType($inventoryItemsType);

        $commerceResultType->setPurchasedCars($purchasedCarsType);
        $commerceResultType->setStatus(ShoppingCartPurchaseResult::aFail_itemNotAvailable);

        // Basket handling
        if ($basketDef != null) {
            $ownedCar = new OwnedCar;

            /* @var \Speedfreak\Entities\Types\CustomCarType $customCar */
            $customCar = $basketDef->ownedCarTrans->getCustomCar();
            $customCarEntity = new CustomCar;

            $customCarEntity->forceFill([
                'apiId' => $customCar->getApiId(),
                'baseCarId' => $customCar->getBaseCarId(),
                'carClassHash' => $customCar->getCarClassHash(),
                'paints' => $customCar->getPaints(),
                'performanceParts' => $customCar->getPerformanceParts(),
                'physicsProfileHash' => $customCar->getPhysicsProfileHash(),
                'rating' => $customCar->getRating(),
                'resalePrice' => $customCar->getResalePrice(),
                'skillModParts' => $customCar->getSkillModParts(),
                'skillModSlotCount' => $customCar->getSkillModSlotCount(),
                'vinyls' => $customCar->getVinyls(),
                'visualParts' => $customCar->getVisualParts()
            ]);

            $ownedCar->customCar()->save($customCarEntity);
            $ownedCar->persona()->associate($persona);
            $ownedCar->forceFill([
                'durability' => 100,
                'expirationDate' => null,
                'heatLevel' => 0,
                'ownershipType' => 'PresetCar',
                'productId' => $productId
            ]);

            /* @var OwnedCar $ownedCar */
            $ownedCar->save();
            $this->personaBO->changeDefaultCar($persona->getKey(), (int) $ownedCar->fresh()->getKey());
            $purchasedCarsType->setOwnedCarTrans($ownedCar->getOwnedCarType());
            $commerceResultType->setPurchasedCars($purchasedCarsType);
            $commerceResultType->setStatus(ShoppingCartPurchaseResult::aSuccess);
        }

        return $commerceResultType;
    }
}