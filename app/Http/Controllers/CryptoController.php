<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Request;

use Speedfreak\Entities\Types\ClientServerCryptoTicketType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;

class CryptoController extends Controller
{
    public function cryptoTicket()
    {
        return Marshaller::marshal(
            new ClientServerCryptoTicketType, ClientServerCryptoTicketType::class
        );
    }

    public function relayCryptoTicket()
    {
        return sprintf('<UdpRelayCryptoTicket>
            <CryptoTicket>%s</CryptoTicket>
            <SessionKey>AAAAAAAAAAAAAAAAAAAAAA==</SessionKey>
            <TicketIv>AAAAAAAAAAAAAAAAAAAAAA==</TicketIv>
        </UdpRelayCryptoTicket>', $this->getSession($this->getUserId())->getRelayCryptoTicket());
    }
}
