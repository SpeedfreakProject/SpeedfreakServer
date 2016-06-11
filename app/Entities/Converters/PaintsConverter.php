<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Converters;

use Speedfreak\Constants;
use Speedfreak\Contracts\IConverter;
use Speedfreak\Entities\Custom\PaintTrans;
use Speedfreak\Entities\Types\PaintsType;
use SimpleXMLElement;

class PaintsConverter implements IConverter
{
    /**
     * @inheritdoc
     */
    public function convertToEntityAttribute(string $xmlString) : PaintsType
    {
        $xml = new SimpleXMLElement($xmlString);

        $paintTrans = $xml->xpath('CustomPaintTrans');
        $newPaintTrans = [];

        foreach($paintTrans as $paintTran) {
            $paintTran = (array) $paintTran;

            array_push($newPaintTrans, new PaintTrans(
                $paintTran['Slot'],
                $paintTran['Sat'],
                $paintTran['Hue'],
                $paintTran['Var'],
                $paintTran['Group']
            ));
        }

        return new PaintsType($newPaintTrans);
    }

    /**
     * @param PaintsType $item
     * @return mixed|string
     */
    public function convertToDatabaseColumn($item)
    {
        $xml = new SimpleXMLElement(sprintf('%s<Paints></Paints>', Constants::XML_TEMPLATE_STRING));

        foreach($item->customPaintTrans as $paintTrans) {
            $child = $xml->addChild('CustomPaintTrans');
            $child->addChild('Slot', $paintTrans->getSlot());
            $child->addChild('Sat', $paintTrans->getSat());
            $child->addChild('Hue', $paintTrans->getHue());
            $child->addChild('Var', $paintTrans->getVar());
            $child->addChild('Group', $paintTrans->getGroup());
        }

        return $xml->asXML();
    }
}