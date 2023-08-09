<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Username;
use App\Models\Race;
use App\Models\Team;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function getSupportedUsers()
    {
        $users = User::where('user_type', 'support_user')->get();

        return view('Admin.SupportedUser.index', get_defined_vars());
    }

    public function storeSupportedUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'country' => 'required',
            'timezone' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }


        try {
            $user = new User();

            //required
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->timezone = $request->timezone;
            $user->password = Hash::make($request->password);
            // $user->phone = 0;
            $user->user_type = 'support_user';
            $user->save();

            $token = $user->createToken("API TOKEN")->plainTextToken;

            $user = User::where('id', $user->id)->first();
            $user->token = $token;
            $user->save();

            return response()->json([
                'status' => true,
                'msg' => 'New User Created!'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }

    //ajax
    public function getSupportUsers($id)
    {
        $user = User::where('id', $id)
        ->where('user_type', 'support_user')->first();

        return response()->json([
            'status' => true,
            'data' => $user
        ]);

    }
    
    public function updateSupportedUsers(Request $request, $id)
    {
        try {
            $user = User::where('id', $id)
            ->where('user_type', 'support_user')->first();

            //required
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->country = $request->country;
            $user->timezone = $request->timezone;
            // $user->phone = 0;
            $user->save();


            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            // return response()->json([
            //     'status' => false,
            //     'msg' => $th->getMessage()
            // ]);
            
            return redirect()->back();
        }
    }
    
    public function resetSupportedUsers(Request $request, $id)
    {
        try {
            $user = User::where('id', $id)
            ->where('user_type', 'support_user')->first();
            
            $user->password = Hash::make($request->password);
            $user->save();



            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            // return response()->json([
            //     'status' => false,
            //     'msg' => $th->getMessage()
            // ]);
            
            return redirect()->back();
        }
    }


    public function getUsers()
    {
        $drivers = Driver::all();
        $teams = Team::all();
        $races = Race::all();
        
        $users = User::where('user_type', 'user')->get();

        return view('Admin.Users.index', get_defined_vars());
    }
    
    public function filterUsers(Request $request)
    {
        
        
        
        $drivers = Driver::all();
        $teams = Team::all();
        $races = Race::all();
        
        $query = User::where('user_type', 'user');
        
        $users = User::where('user_type', 'user')
        ->when($request->age, function ($query) use ($request) {
            $parsedDate = Carbon::parse($request->age)->formatLocalized('%-e-%B-%Y');
            return $query->where('dob', $parsedDate);
        })
        ->when($request->country, function ($query) use ($request) {
            return $query->where('country', $request->country);
        })
        ->when($request->driver, function ($query) use ($request) {
            return $query->where('driver_id', $request->driver);
        })
        ->when($request->team, function ($query) use ($request) {
            return $query->where('team_id', $request->team);
        })
        ->when($request->race, function ($query) use ($request) {
            return $query->where('race_id', $request->race);
        })
        ->when($request->car_number, function ($query) use ($request) {
            return $query->where('car_number', $request->car_number);
        })
        ->get();
        
        
        return view('Admin.Users.index', get_defined_vars());
    }
    
    public function blockWithReason(Request $request, $id)
    {
        
        $user = User::where('id', $id)->first();
        
        if($user->status == 1)
        {
            $user->status == 0;
            $user->block_reason = '';
            
            $user->save();
        }
        else{
            $user->status == 1;
            $user->block_reason = $request->reason;
            
            $user->save();
        }
        
        
        return redirect()->back();
    }

    public function getUsersNames()
    {
        $users = Username::all();

        return view('Admin.UserNames.index', get_defined_vars());
    }
    
    public function changeStatus($id)
    {
        
        $user = User::where('id', $id)->first();
    
        if($user->status == 1)
        {
            $user->status = 0;
            $user->save();
        }
        else{
            $user->status = 1;
            $user->save();
        }
        
        return redirect()->back();
        
    }
    
    public function addUserName(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:users,username',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $checkusername = UserName::where('username', $request->user_name)
        ->first();
        
        if($checkusername)
        {
            return response()->json([
                'status' => false,
                'msg' => 'Username already exists!'
            ]);
        }
        
        $username = new UserName();
        
        $username->username = $request->user_name;
        $username->save();
        
        return response()->json([
            'status' => true,
            'msg' => 'New username created!'
        ]);
        
    }
    
    public function changeUserNameStatus($id)
    {
        
        $user = UserName::where('id', $id)->first();
    
        if($user->available == 1)
        {
            $user->available = 0;
            $user->save();
        }
        else{
            $user->available = 1;
            $user->save();
        }
        
        return redirect()->back();
        
    }

}
