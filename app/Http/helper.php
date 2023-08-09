<?php


use App\Models\User;
use App\Models\Username;
use Carbon\Carbon;


if (!function_exists('checkUserName')) {

    function checkUserName($username)
    {
        
        $check = User::where('username', $username)->first();
        
        if($check)
        {
            return true;
        }
        else{
            return false;
        }
        
    }
}


if (!function_exists('userChart')) {
    function userChart()
    {
        //  $users = [
        // ['month' => 'Jan', 'count' => 1292],
        // ['month' => 'Feb', 'count' => 4432],
        // ['month' => 'Mar', 'count' => 4432],
        // ['month' => 'Apr', 'count' => 4432],
        // ['month' => 'May', 'count' => 4432],
        // ['month' => 'June', 'count' => 4432],
        // ['month' => 'July', 'count' => 4432],
        // ['month' => 'Aug', 'count' => 4432],
        // ['month' => 'Sept', 'count' => 4432],
        // ['month' => 'Nov', 'count' => 4432],
        // ['month' => 'Dec', 'count' => 4432],
        // ['month' => 'Oct', 'count' => 4432],
        //];
        
        $users = User::select('created_at')
        ->orderBy('created_at', 'asc') 
                 ->get()
                 ->groupBy(function ($user) {
                     return $user->created_at->format('M'); // Group users by month
                 })
                 ->map(function ($users, $month) {
                     return ['month' => $month, 'count' => count($users)];
                 })
                 ->values();
        
        return $users;
    
    }
}

?>