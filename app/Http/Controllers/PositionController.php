<?php

namespace App\Http\Controllers;

use App\Models\Players\Position;

class PositionController extends Controller
{
    public function getPositions()
    {
        $positions = Position::all();

        return response()->json($positions);
    }
}
