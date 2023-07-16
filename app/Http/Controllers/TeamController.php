<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
