<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getAll()
    {
        $teams = Team::all();

        return response()->json([
            'status' => true,
            'data' => $teams
        ]);
    }
}
