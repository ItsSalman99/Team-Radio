<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    
    public function index()
    {
        return view('Admin.Notifications.index');
    }
    
}
