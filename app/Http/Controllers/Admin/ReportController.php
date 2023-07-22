<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportReasons;
use App\Models\UserReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = UserReport::all();

        return view('Admin.Reports.index', get_defined_vars());
    }

    public function getReasonsOptions()
    {
        $options = ReportReasons::all();

        return view('Admin.Reports.Options.index', get_defined_vars());
    }
}
