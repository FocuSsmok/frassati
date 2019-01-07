<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function getPlayers(Request $request)
    {
        $ageGroup = $request["team"];
        $players = DB::table("players_age_groups")
            ->join("players", "player_id", "=", "players.id")
            ->join("age_groups", "age_group_id", "=", "age_groups.id")
            ->join("positions", "position_id", "=", "positions.id")
            ->select(
                "players_age_groups.goals",
                "players_age_groups.assists",
                "players_age_groups.yellow_cards",
                "players_age_groups.red_cards",
                "players.first_name",
                "players.surname",
                "positions.name as position",
                "age_groups.name as age_group")
            ->where("age_groups.name", '=', $ageGroup)
            ->get();
        // $players = Player::all();
        // $players = DB::table("players")->get();
        // $positions = DB::table("positions")->get();
        // $ageGroups = DB::table("age_groups")->get();

        return response()->json($players, 200);

        // return view('playground.players', ["playersList" => $players, "positions" => $positions, "ageGroups" => $ageGroups]);
    }
}
