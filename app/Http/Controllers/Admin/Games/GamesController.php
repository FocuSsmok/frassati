<?php

namespace App\Http\Controllers\Admin\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function games()
    {
        return view("admin.games.game");
    }

    public function teamGames(Request $request)
    {
        return view("admin.games.game");
    }
}
