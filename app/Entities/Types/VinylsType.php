<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;
use Speedfreak\Entities\Custom\VinylTrans;

/**
 * Class VinylsType
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="Vinyls")
 */
class VinylsType
{
    /**
     * @var VinylTrans[]
     * @Serializer\Type("array<Speedfreak\Entities\Custom\VinylTrans>")
     * @Serializer\XmlList(entry="CustomVinylTrans", inline = true)
     */
    private $customVinylTrans;

    /**
     * VinylsType constructor.
     * @param array $customVinylTrans
     */
    public function __construct(array $customVinylTrans = [])
    {
        $this->customVinylTrans = $customVinylTrans;
    }

    /**
     * @return \Speedfreak\Entities\Custom\VinylTrans[]
     */
    public function getCustomVinylTrans()
    {
        return $this->customVinylTrans;
    }

    /**
     * @param \Speedfreak\Entities\Custom\VinylTrans[] $customVinylTrans
     */
    public function setCustomVinylTrans($customVinylTrans)
    {
        $this->customVinylTrans = $customVinylTrans;
    }
}