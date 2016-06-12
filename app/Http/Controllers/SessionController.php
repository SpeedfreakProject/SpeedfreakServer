<?php

namespace Speedfreak\Http\Controllers;

use Speedfreak\Management\Controller as NFSWController;
use Speedfreak\Http\Requests;
use Unirest\Request as UnirestRequest;

class SessionController extends NFSWController
{
    /**
     * Return an XML representation of the chat server,
     * from the actual chat server.
     * WILL NOT WORK IF THE SERVER IS OFFLINE!!!!!!!!!!!
     *
     * @return \Illuminate\Http\Response
     */
    public function getChatInfo()
    {
        $result = UnirestRequest::get('http://localhost:1337/Session/getChatInfo');

        return $this->sendXml($result->body);
    }
}
