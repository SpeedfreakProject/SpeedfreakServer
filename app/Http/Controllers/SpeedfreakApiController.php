<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Request;

use Speedfreak\Entities\API\APIPersonaDataType;
use Speedfreak\Entities\API\APIProductDataType;
use Speedfreak\Entities\API\APIUserDataType;
use Speedfreak\Entities\OwnedCar;
use Speedfreak\Entities\Repositories\PersonaRepository;
use Speedfreak\Entities\Repositories\ProductRepository;
use Speedfreak\Entities\Repositories\UserRepository;
use Speedfreak\Entities\Types\ArrayOfOwnedCarTransType;
use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;
use Speedfreak\Entities\Types\ArrayOfPersonaIdsType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;

class SpeedfreakAPIController extends Controller
{
    /**
     * @var PersonaRepository
     */
    private $personaRepository;
    
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * SpeedfreakApiController constructor.
     * @param PersonaRepository $personaRepository
     * @param ProductRepository $productRepository
     * @param UserRepository $userRepository
     */
    public function __construct(PersonaRepository $personaRepository, ProductRepository $productRepository, UserRepository $userRepository)
    {
        $this->personaRepository = $personaRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    public function getPersonaData()
    {
        $personaId = (int) $this->getParam('personaId');
        $persona = $this->personaRepository->findById($personaId);

        $ownedCars = collect($persona->ownedCars);
        $types = $ownedCars->map(function(OwnedCar $ownedCar) {
            return $ownedCar->getOwnedCarType();
        })->all();

        $cars = new ArrayOfOwnedCarTransType;
        $cars->setOwnedCarTransList($types);

        $otherPersonas = new ArrayOfPersonaIdsType([]);
        if (count($persona->user->personas) > 1) {
            $otherPersonas = new ArrayOfPersonaIdsType(collect($persona->user->personas)->pluck('id')->all());
        }

        $apiPersonaData = new APIPersonaDataType;
        $apiPersonaData->setBadges(null);
        $apiPersonaData->setCars($cars);
        $apiPersonaData->setIconIndex($persona->iconIndex);
        $apiPersonaData->setLevel($persona->level);
        $apiPersonaData->setMotto($persona->motto);
        $apiPersonaData->setName($persona->name);
        $apiPersonaData->setOtherPersonas($otherPersonas);
        $apiPersonaData->setScore($persona->score);

        return Marshaller::marshal($apiPersonaData, APIPersonaDataType::class);
    }

    public function getProductData()
    {
        $productId = (int) $this->getParam('productId');
        $product = $this->productRepository->findById($productId);
        $type = new APIProductDataType;

        foreach([
            'id',
            'bundleItems',
            'categoryId',
            'categoryName',
            'currency',
            'description',
            'durationMinute',
            'hash',
            'icon',
            'level',
            'longDescription',
            'price',
            'priority',
            'productId',
            'productTitle',
            'productType',
            'secondaryIcon',
            'useCount',
            'visualStyle',
            'webIcon',
            'webLocation',
        ] as $column) {
            $type->{'set' . ucfirst($column)}($product->getAttribute($column));
        }

        return Marshaller::marshal($type, APIProductDataType::class);
    }

    public function getUserData()
    {
        $userId = (int) $this->getParam('userId');
        $user = $this->userRepository->findById($userId);
        $type = new APIUserDataType;
        $personas = new ArrayOfPersonaBaseType;
        $personas->setPersonaBase($user->getPersonaTypes());

        $type->setEmail($user->email);
        $type->setId($user->getKey());
        $type->setPersonas($personas);

        return Marshaller::marshal($type, APIUserDataType::class);
    }
}
