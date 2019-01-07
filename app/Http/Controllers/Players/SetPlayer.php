<?php

namespace App\Http\Controllers\Players;

use App\Http\Controllers\Controller;
use App\Models\Players\PlayersAgeGroup;
use Illuminate\Http\Request;

class SetPlayer extends Controller
{
    public function setPlayers(Request $request)
    {
        $player = new PlayersAgeGroup();
        $player->player_id = $request["player"];
        $player->age_group_id = $request["ageGroup"];
        $player->position_id = $request["position"];
        $player->goals = $request["goals"];
        $player->assists = $request["assists"];
        $player->yellow_cards = $request["yellowCards"];
        $player->red_cards = $request["redCards"];

        $result = $player->save();

        return response()->json($result, 200);
    }
}
