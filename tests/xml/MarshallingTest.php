<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use NFSWServer\Entities\Types\PaintsType;

class MarshallingTest extends TestCase
{
    /** @test */
    public function it_properly_converts_paints()
    {
        $xmlString = '<Paints><CustomPaintTrans><Slot>1</Slot><Sat>199999</Sat><Hue>2000100</Hue><Var>169</Var><Group>664</Group></CustomPaintTrans><CustomPaintTrans><Slot>2</Slot><Sat>199999</Sat><Hue>2000100</Hue><Var>169</Var><Group>665</Group></CustomPaintTrans></Paints>';

        /* @var PaintsType $converted */
        $converted = app('NFSWServer\Entities\Converters\PaintsConverter')->convertToEntityAttribute($xmlString);
        $this->assertInstanceOf(PaintsType::class, $converted);
        $this->assertTrue(count($customPaints = $converted->getCustomPaintTrans()) > 0);
        $this->assertEquals(1, $customPaints[0]->getSlot());
        $this->assertEquals(2, $customPaints[1]->getSlot());
        $this->assertEquals(199999, $customPaints[0]->getSat());
        $this->assertEquals(664, $customPaints[0]->getGroup());
        $this->assertEquals(665, $customPaints[1]->getGroup());

        $toXml = app('NFSWServer\Entities\Converters\PaintsConverter')->convertToDatabaseColumn($converted);
        $this->assertInternalType('string', $toXml);
    }
}
