<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function getAll()
    {
        $drivers = Driver::all();
        
        return response()->json([
            'status' => true,
            'data' => $drivers
        ]);
        
    }
}
