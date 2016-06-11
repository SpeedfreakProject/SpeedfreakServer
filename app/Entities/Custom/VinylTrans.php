<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Custom;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class VinylTrans
 * @package Speedfreak\Entities\Custom
 *
 * @Serializer\AccessorOrder("alphabetical")
 * @Serializer\XmlRoot(name="CustomVinylTrans")
 */
class VinylTrans
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Hash")
     * @Serializer\Type("string")
     */
    private $Hash;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Hue1")
     * @Serializer\Type("string")
     */
    private $Hue1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Hue2")
     * @Serializer\Type("string")
     */
    private $Hue2;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Hue3")
     * @Serializer\Type("string")
     */
    private $Hue3;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Hue4")
     * @Serializer\Type("string")
     */
    private $Hue4;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Layer")
     * @Serializer\Type("string")
     */
    private $Layer;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Mir")
     * @Serializer\Type("string")
     */
    private $Mir;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Rot")
     * @Serializer\Type("string")
     */
    private $Rot;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Sat1")
     * @Serializer\Type("string")
     */
    private $Sat1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Sat2")
     * @Serializer\Type("string")
     */
    private $Sat2;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Sat3")
     * @Serializer\Type("string")
     */
    private $Sat3;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Sat4")
     * @Serializer\Type("string")
     */
    private $Sat4;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="ScaleX")
     * @Serializer\Type("string")
     */
    private $ScaleX;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="ScaleY")
     * @Serializer\Type("string")
     */
    private $ScaleY;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Shear")
     * @Serializer\Type("string")
     */
    private $Shear;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="TranX")
     * @Serializer\Type("string")
     */
    private $TranX;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="TranY")
     * @Serializer\Type("string")
     */
    private $TranY;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Var1")
     * @Serializer\Type("string")
     */
    private $Var1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Var2")
     * @Serializer\Type("string")
     */
    private $Var2;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Var3")
     * @Serializer\Type("string")
     */
    private $Var3;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="Var4")
     * @Serializer\Type("string")
     */
    private $Var4;

    /**
     * VinylTrans constructor.
     * @param string $Hash
     * @param string $Hue1
     * @param string $Hue2
     * @param string $Hue3
     * @param string $Hue4
     * @param string $Layer
     * @param string $Mir
     * @param string $Rot
     * @param string $Sat1
     * @param string $Sat2
     * @param string $Sat3
     * @param string $Sat4
     * @param string $ScaleX
     * @param string $ScaleY
     * @param string $Shear
     * @param string $TranX
     * @param string $TranY
     * @param string $Var1
     * @param string $Var2
     * @param string $Var3
     * @param string $Var4
     */
    public function __construct($Hash, $Hue1, $Hue2, $Hue3, $Hue4, $Layer, $Mir, $Rot, $Sat1, $Sat2, $Sat3, $Sat4, $ScaleX, $ScaleY, $Shear, $TranX, $TranY, $Var1, $Var2, $Var3, $Var4)
    {
        $this->Hash = $Hash;
        $this->Hue1 = $Hue1;
        $this->Hue2 = $Hue2;
        $this->Hue3 = $Hue3;
        $this->Hue4 = $Hue4;
        $this->Layer = $Layer;
        $this->Mir = $Mir;
        $this->Rot = $Rot;
        $this->Sat1 = $Sat1;
        $this->Sat2 = $Sat2;
        $this->Sat3 = $Sat3;
        $this->Sat4 = $Sat4;
        $this->ScaleX = $ScaleX;
        $this->ScaleY = $ScaleY;
        $this->Shear = $Shear;
        $this->TranX = $TranX;
        $this->TranY = $TranY;
        $this->Var1 = $Var1;
        $this->Var2 = $Var2;
        $this->Var3 = $Var3;
        $this->Var4 = $Var4;
    }


    /**
     * @return string
     */
    public function getHash()
    {
        return $this->Hash;
    }

    /**
     * @param string $Hash
     */
    public function setHash($Hash)
    {
        $this->Hash = $Hash;
    }

    /**
     * @return string
     */
    public function getHue1()
    {
        return $this->Hue1;
    }

    /**
     * @param string $Hue1
     */
    public function setHue1($Hue1)
    {
        $this->Hue1 = $Hue1;
    }

    /**
     * @return string
     */
    public function getHue2()
    {
        return $this->Hue2;
    }

    /**
     * @param string $Hue2
     */
    public function setHue2($Hue2)
    {
        $this->Hue2 = $Hue2;
    }

    /**
     * @return string
     */
    public function getHue3()
    {
        return $this->Hue3;
    }

    /**
     * @param string $Hue3
     */
    public function setHue3($Hue3)
    {
        $this->Hue3 = $Hue3;
    }

    /**
     * @return string
     */
    public function getHue4()
    {
        return $this->Hue4;
    }

    /**
     * @param string $Hue4
     */
    public function setHue4($Hue4)
    {
        $this->Hue4 = $Hue4;
    }

    /**
     * @return string
     */
    public function getLayer()
    {
        return $this->Layer;
    }

    /**
     * @param string $Layer
     */
    public function setLayer($Layer)
    {
        $this->Layer = $Layer;
    }

    /**
     * @return string
     */
    public function getMir()
    {
        return $this->Mir;
    }

    /**
     * @param string $Mir
     */
    public function setMir($Mir)
    {
        $this->Mir = $Mir;
    }

    /**
     * @return string
     */
    public function getRot()
    {
        return $this->Rot;
    }

    /**
     * @param string $Rot
     */
    public function setRot($Rot)
    {
        $this->Rot = $Rot;
    }

    /**
     * @return string
     */
    public function getSat1()
    {
        return $this->Sat1;
    }

    /**
     * @param string $Sat1
     */
    public function setSat1($Sat1)
    {
        $this->Sat1 = $Sat1;
    }

    /**
     * @return string
     */
    public function getSat2()
    {
        return $this->Sat2;
    }

    /**
     * @param string $Sat2
     */
    public function setSat2($Sat2)
    {
        $this->Sat2 = $Sat2;
    }

    /**
     * @return string
     */
    public function getSat3()
    {
        return $this->Sat3;
    }

    /**
     * @param string $Sat3
     */
    public function setSat3($Sat3)
    {
        $this->Sat3 = $Sat3;
    }

    /**
     * @return string
     */
    public function getSat4()
    {
        return $this->Sat4;
    }

    /**
     * @param string $Sat4
     */
    public function setSat4($Sat4)
    {
        $this->Sat4 = $Sat4;
    }

    /**
     * @return string
     */
    public function getScaleX()
    {
        return $this->ScaleX;
    }

    /**
     * @param string $ScaleX
     */
    public function setScaleX($ScaleX)
    {
        $this->ScaleX = $ScaleX;
    }

    /**
     * @return string
     */
    public function getScaleY()
    {
        return $this->ScaleY;
    }

    /**
     * @param string $ScaleY
     */
    public function setScaleY($ScaleY)
    {
        $this->ScaleY = $ScaleY;
    }

    /**
     * @return string
     */
    public function getShear()
    {
        return $this->Shear;
    }

    /**
     * @param string $Shear
     */
    public function setShear($Shear)
    {
        $this->Shear = $Shear;
    }

    /**
     * @return string
     */
    public function getTranX()
    {
        return $this->TranX;
    }

    /**
     * @param string $TranX
     */
    public function setTranX($TranX)
    {
        $this->TranX = $TranX;
    }

    /**
     * @return string
     */
    public function getTranY()
    {
        return $this->TranY;
    }

    /**
     * @param string $TranY
     */
    public function setTranY($TranY)
    {
        $this->TranY = $TranY;
    }

    /**
     * @return string
     */
    public function getVar1()
    {
        return $this->Var1;
    }

    /**
     * @param string $Var1
     */
    public function setVar1($Var1)
    {
        $this->Var1 = $Var1;
    }

    /**
     * @return string
     */
    public function getVar2()
    {
        return $this->Var2;
    }

    /**
     * @param string $Var2
     */
    public function setVar2($Var2)
    {
        $this->Var2 = $Var2;
    }

    /**
     * @return string
     */
    public function getVar3()
    {
        return $this->Var3;
    }

    /**
     * @param string $Var3
     */
    public function setVar3($Var3)
    {
        $this->Var3 = $Var3;
    }

    /**
     * @return string
     */
    public function getVar4()
    {
        return $this->Var4;
    }

    /**
     * @param string $Var4
     */
    public function setVar4($Var4)
    {
        $this->Var4 = $Var4;
    }
}