<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Request;

use SimpleXMLElement;
use Speedfreak\Contracts\Exceptions\PersonaIdMismatchException;
use Speedfreak\Contracts\State;
use Speedfreak\Entities\Business\DriverPersonaBO;
use Speedfreak\Entities\Types\ArrayOfInt;
use Speedfreak\Entities\Types\ArrayOfPersonaBaseType;
use Speedfreak\Entities\Types\ArrayOfStringType;
use Speedfreak\Entities\Types\PersonaIdArrayType;
use Speedfreak\Entities\Types\PersonaMottoType;
use Speedfreak\Entities\Types\PersonaPresenceType;
use Speedfreak\Entities\Types\ProfileDataType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;
use Speedfreak\Management\Controller as NFSWController;

class DriverPersonaController extends NFSWController
{
    /**
     * @var DriverPersonaBO
     */
    private $driverPersonaBO;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var State
     */
    private $state;

    /**
     * DriverPersonaController constructor.
     * @param DriverPersonaBO $driverPersonaBO
     * @param Request $request
     * @param State $state
     */
    public function __construct(DriverPersonaBO $driverPersonaBO, Request $request, State $state)
    {
        $this->driverPersonaBO = $driverPersonaBO;
        $this->request = $request;
        $this->state = $state;
    }

    private function getPersonaId(bool $isBypass = false) : string
    {
        $id = (int) $this->request->input('personaId');
        if ((($id === $this->getLoggedPersonaId() || $this->getLoggedPersonaId() == -1)) || $isBypass) {
            if (
                $this->getUserId() != -1 &&
                $this->getSecurityToken() != '' &&
                $this->state->getSession($this->getUserId())->getSecurityToken() == $this->getSecurityToken()
            ) {
                return $id;
            }
        }

        throw new PersonaIdMismatchException($this->getLoggedPersonaId(), $id);
    }

    public function getExpLevelPointsMap()
    {
        $map = [
            100,
            975,
            2025,
            3625,
            5875,
            8875,
            12725,
            23375,
            30375,
            39375,
            50575,
            64175,
            80375,
            99375,
            121375,
            146575,
            175175,
            207375,
            243375,
            283375,
            327575,
            376175,
            429375,
            487375,
            550375,
            618575,
            692175,
            771375,
            856375,
            950875,
            1055275,
            1169975,
            1295375,
            1431875,
            1579875,
            1739775,
            1911975,
            2096875,
            2294875,
            2506375,
            2731775,
            2971475,
            3225875,
            3495375,
            3780375,
            4081275,
            4398475,
            4732375,
            5083375,
            5481355,
            5898805,
            6336165,
            6793875,
            7272375,
            7772105,
            8293505,
            8837015,
            9403075,
            9992125
        ];

        return $this->sendXml(Marshaller::marshal(
            new ArrayOfInt($map),
            ArrayOfInt::class
        ));
    }

    public function reserveName()
    {
        $this->validateRequest([
           'name' => 'required|string'
        ]);

        $reserveName = $this->driverPersonaBO->reserveName($this->getParam('name'));
        return $this->sendXml(Marshaller::marshal(
            $reserveName, ArrayOfStringType::class
        ));
    }

    public function unreserveName()
    {
        return $this->sendXml('');
    }

    public function createPersona()
    {
        $this->validateRequest([
            'userId' => 'required',
            'name' => 'required|string',
            'iconIndex' => 'required'
        ]);

        $userId = $this->getParam('userId');
        $name = $this->getParam('name');
        $iconIndex = (int) $this->getParam('iconIndex');
        $createPersona = $this->driverPersonaBO->createPersona($userId, $name, $iconIndex);

        return $this->sendXml(Marshaller::marshal(
            $createPersona, ProfileDataType::class
        ));
    }

    public function getPersonaInfo()
    {
        $personaInfo = $this->driverPersonaBO->getPersonaInfo($this->getPersonaId(true));
        return $this->sendXml(Marshaller::marshal(
            $personaInfo, ProfileDataType::class
        ));
    }

    public function getPersonaBaseFromList()
    {
        $xmlTmp = $this->getRequest()->getContent();
        $xmlTmp = str_replace(':long', '', $xmlTmp);
        /* @var PersonaIdArrayType $personaIdArrayType */
        $personaIdArrayType = Marshaller::unmarshal($xmlTmp, PersonaIdArrayType::class);
        $personaIds = $personaIdArrayType->getPersonaIds()->getArray();

        return $this->sendXml(Marshaller::marshal(
            $this->driverPersonaBO->getPersonaBaseFromList($personaIds), ArrayOfPersonaBaseType::class
        ));
    }

    public function updatePersonaPresence()
    {
        return $this->sendXml('');
    }

    public function deletePersona()
    {
        $personaId = $this->getPersonaId();
        $this->driverPersonaBO->deletePersona($personaId);
        return $this->sendXml('<long>0</long>');
    }

    public function updateStatusMessage()
    {
        $mottoXml = $this->readInputStream();
        /* @var PersonaMottoType $personaMottoType */
        $personaMottoType = Marshaller::unmarshal($mottoXml, PersonaMottoType::class);
        $message = $personaMottoType->getMessage();
        $personaId = $personaMottoType->getPersonaId();

        return $this->sendXml(Marshaller::marshal(
            $this->driverPersonaBO->updateStatusMessage($personaId, $message),
            PersonaMottoType::class
        ));
    }

    public function getPersonaPresenceByName()
    {
        $presence = $this->driverPersonaBO->getPersonaPresenceByName($this->getParam('displayName'));
        if ($presence) {
            return $this->sendXml(Marshaller::marshal(
                $presence, PersonaPresenceType::class
            ));
        }
        return $this->sendXml('');
    }
}
