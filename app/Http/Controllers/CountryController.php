<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getAll()
    {
        $countries = Country::all();

        return response()->json([
            'status' => true,
            'data' => $countries
        ]);

    }
}
