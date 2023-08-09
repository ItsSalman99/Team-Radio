<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        return view('Admin.FeedBack.index');        
    }
}
