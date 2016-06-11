<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Request;

use SimpleXMLElement;
use Speedfreak\Http\Requests;
use Speedfreak\Management\Controller as NFSWController;

class DriverPersonaController extends NFSWController
{
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

        $element = new SimpleXMLElement("<ArrayOfint></ArrayOfint>");
        foreach($map as $value) {
            $element->addChild('int', $value);
        }

        return $this->sendXml($element->asXML());
    }
}
