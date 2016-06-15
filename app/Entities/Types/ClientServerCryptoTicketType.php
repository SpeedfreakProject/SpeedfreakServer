<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class ClientServerCryptoTicket
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="ClientServerCryptoTicket")
 */
class ClientServerCryptoTicketType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("CryptoTicket")
     * @Serializer\Type("string")
     */
    protected $cryptoTicket = 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("SessionKey")
     * @Serializer\Type("string")
     */
    protected $sessionKey = 'AAAAAAAAAAAAAAAAAAAAAA==';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("TicketIv")
     * @Serializer\Type("string")
     */
    protected $ticketIv = 'AAAAAAAAAAAAAAAAAAAAAA==';
}