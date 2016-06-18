<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Request;

use Speedfreak\Http\Requests;

class AchievementsController extends Controller
{
    public function loadAll()
    {
        return '<AchievementsPacket />';
    }
}
