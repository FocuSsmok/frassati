<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function getPlayers(Request $request)
    {

        // $players = DB::table("players_age_group")->join('age_group', 'players_age_group.age_group_id', '=', 'age_group.id')->select("players_age_group.*", 'age_group.name AS age_group')->get();

        // $players = Player::all();
        $players = DB::table("players")->get();
        $positions = DB::table("positions")->get();
        $ageGroups = DB::table("age_groups")->get();

        // return response()->json($players, 200);

        return view('playground.players', ["playersList" => $players, "positions" => $positions, "ageGroups" => $ageGroups]);
    }
}
