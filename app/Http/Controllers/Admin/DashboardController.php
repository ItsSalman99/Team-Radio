<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Username;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::where('user_type', 'user')->count();
        $totalSupportUser = User::where('user_type', 'support_user')->count();
        $totalUserNames = Username::count();
        
        $activeUsers = User::where('id', '!=', 1)
        ->where('status', 1)->get();
        $inactiveUsers = User::where('id', '!=', 1)
        ->where('status', 0)->get();
        
        $users = User::where('id', '!=', 1)
        ->where('status', 1)->get();
        
        
        if (Auth::user()) {

            return view('Admin.index', get_defined_vars());
        } else {
            redirect()->route('login');
        }
    }
    
    public function getUsers($status)
    {
        $users = User::where('status', $status)->get();
        
        return response()->json([
            'status' => true,
            'data' => $users
        ]);
        
    }
    
}
