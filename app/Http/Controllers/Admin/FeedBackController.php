<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserFeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        $feedbacks = UserFeedBack::all();
        
        return view('Admin.FeedBack.index', get_defined_vars());        
    }
}
