<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'dob' => 'required',
            'car_number' => 'required',
            // 'car_number_id' => 'required',
            'helmet_color' => 'required',
            'team_color' => 'required',
            'country' => 'required',
            // 'country_id' => 'required',
            'driver_id' => 'nullable',
            'team_id' => 'nullable',
            'race_id' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
         $check = Username::where('username', $request->username)
        ->where('available', 0)->first();

        if ($check) {
            return response()->json([
                'status' => false,
                'msg' => 'Username is not available!'
            ]);
        }
        
        $user = new User();

        //required
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->country = $request->country;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        // $user->country_id = $request->country_id;
        // $user->car_number_id = $request->car_number_id;
        $user->car_number = $request->car_number;
        $user->helmet_color = $request->helmet_color;
        $user->team_color = $request->team_color;
        //nullable
        $user->driver_id = $request->driver_id;
        $user->team_id = $request->team_id;
        $user->race_id = $request->race_id;
        $user->fcm_token = $request->fcm_token;
        // return $user;
        $user->save();

        $token = $user->createToken("API TOKEN")->plainTextToken;

        $user = User::where('id', $user->id)->first();
        $user->token = $token;
        $user->save();
        if($check)
        {
            $check->available = 0;
            $check->save();
            
        }
        
        $user = User::where('id', $user->id)
            ->with('driver', 'team', 'race')
            ->first();

        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'fcm_token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('username', $request->username)
            ->where('user_type', 'user')
            ->with('driver', 'team', 'race')
            ->first();

        if ($user) {
            $check = Hash::check($request->password, $user->password);

            if ($check) {
                $user->fcm_token = $request->fcm_token;
                $user->save();
                $user = User::where('username', $request->username)
                ->where('user_type', 'user')
                ->with('driver', 'team', 'race')
                ->first();
                
                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Credentials does not matched!'
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'msg' => 'You dont have an account!'
        ]);
    }

    public function getLoggedIn()
    {
        $token = request()->bearerToken();

        $user = User::where('token', '!=', NULL)
        ->where('user_type', 'user')
            ->with('driver', 'team', 'race')
            ->where('token', $token)->first();

        if ($user) {

            return response()->json([
                'status' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Unauthenticated!!'
            ]);
        }
    }

    public function verifyPhone(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('phone', $request->phone)
        ->where('user_type', 'user')
        ->with('driver', 'team', 'race')
        ->first();

        if ($user) {

            return response()->json([
                'status' => false,
                'msg' => 'Phone number is already in use!'
            ]);
        } else {


            return response()->json([
                'status' => false,
                'msg' => 123456
            ]);
        }
    }

    public function deleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $token = request()->bearerToken();

        $user = User::where('token', '!=', NULL)
        ->where('user_type', 'user')
            ->where('token', $token)->first();

        if ($user) {

            if(Hash::check($request->password, $user->password))
            {
                $user->delete();
                return response()->json([
                    'status' => true,
                    'msg' => 'User deleted successfully!!'
                ]);
            }
            else{
                return response()->json([
                    'status' => false,
                    'msg' => 'Password does not matched!!'
                ]);
            }

        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Unauthenticated!!'
            ]);
        }
    }

    public function checkUsername(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $check = Username::where('username', $request->username)
        ->where('available', 0)->first();

        if ($check) {
            return response()->json([
                'status' => false,
                'msg' => 'Username is not available!'
            ]);
        } else {
            $user = User::where('username', $request->username)->first();

            if ($user) {

                return response()->json([
                    'status' => false,
                    'msg' => 'Username already taken!'
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'data' => $request->username
                ]);
            }
        }
    }

    public function logout()
    {
        $token = request()->bearerToken();

        $user = User::where('token', '!=', NULL)
        ->where('user_type', 'user')
        ->where('token', $token)->first();

        if ($user) {
            $user->fcm_token = NULL;
            $user->save();

            return response()->json([
                'status' => true,
                'msg' => 'Logged Out!!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Unauthenticated!!'
            ]);
        }
    }
}
