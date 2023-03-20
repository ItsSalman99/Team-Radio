<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'country_id' => 'nullable',
            'driver_id' => 'nullable',
            'team_id' => 'nullable',
            'race_id' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => true,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->driver_id = $request->driver_id;
        $user->team_id = $request->team_id;
        $user->race_id = $request->race_id;

        $user->save();

        $token = $user->createToken("API TOKEN")->plainTextToken;

        $user = User::where('id', $user->id)->first();
        $user->token = $token;
        $user->save();

        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => true,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('username', $request->username)->first();

        if ($user) {
            $check = Hash::check($request->password, $user->password);

            if ($check) {

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
}
