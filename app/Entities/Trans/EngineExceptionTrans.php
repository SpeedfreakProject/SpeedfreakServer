<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Trans;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class EngineExceptionTrans
 * @package Speedfreak\Entities\Trans
 *
 * @Serializer\XmlRoot(name="EngineExceptionTrans")
 * @Serializer\AccessorOrder("custom", custom={ "description", "errorCode", "innerException", "message",
"stackTrace" })
 */
class EngineExceptionTrans
{
    /**
     * @XmlElement(cdata=false)
     * @Serializer\SerializedName("Description")
     * @var string
     */
    private $description;

    /**
     * @XmlElement
     * @Serializer\SerializedName("ErrorCode")
     * @var string
     */
    private $errorCode;

    /**
     * @XmlElement
     * @Serializer\SerializedName("InnerException")
     * @var string
     */
    private $innerException;

    /**
     * @XmlElement
     * @Serializer\SerializedName("Message")
     * @var string
     */
    private $message;

    /**
     * @XmlElement
     * @Serializer\SerializedName("StackTrace")
     * @var string
     */
    private $stackTrace;
}