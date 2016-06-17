<?php

namespace Speedfreak\Http\Controllers;

use Illuminate\Http\Response;
use Speedfreak\Entities\Leaderboards\LeaderboardManager;
use Speedfreak\Entities\Types\LeaderboardType;
use Speedfreak\Entities\Utilities\Marshaller;
use Speedfreak\Http\Requests;

use Speedfreak\Management\Controller as NFSWController;

class LeaderboardController extends NFSWController
{
    /**
     * Return an XML-formatted leaderboard.
     *
     * @param LeaderboardManager $leaderboard
     * @return Response
     */
    public function index(LeaderboardManager $leaderboard)
    {
        $value = new LeaderboardType;
        $value->setLeaderboard($leaderboard->getTopFive($this->getParam('items', 5))->all());

        return Marshaller::marshal($value, LeaderboardType::class);
    }
}
