<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    
    public function getAll()
    {
        $races = Race::all();
        
        return response()->json([
            'status' => true,
            'data' => $races
        ]);
        
    }
    
}
