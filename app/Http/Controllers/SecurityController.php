<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Request;

use Speedfreak\Entities\Types\FraudConfigType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;

class SecurityController extends Controller
{
    public function fraudConfig()
    {
        $config = new FraudConfigType;
        $config->setUserId($this->getUserId());

        return Marshaller::marshal(
            $config, FraudConfigType::class
        );
    }

    public function generateWebToken()
    {
        return '';
    }
}
