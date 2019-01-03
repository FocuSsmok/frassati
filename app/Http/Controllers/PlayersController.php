<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayersController extends Controller
{
    //
    public function getPlayers(Request $request)
    {
        $players = DB::table("players")->get();

        return response()->json($players, 200);
    }
}
