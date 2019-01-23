<?php

namespace App\Http\Controllers\Admin\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allTeams()
    {
        return view("admin.teams.team");
    }

    public function editTeam(Request $request)
    {
        return view("admin.teams.team");
    }
}
