<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReportReasons;
use Illuminate\Http\Request;

class ReportReasonController extends Controller
{
    public function getAll()
    {
        $reasons = ReportReasons::where('status', 1)->get();

        return response()->json([
            'status' => true,
            'data' => $reasons
        ]);
    }
}
