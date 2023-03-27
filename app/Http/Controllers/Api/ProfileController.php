<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if ($user) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->dob = $request->dob;
            $user->email = $request->email;
            // $user->country_id = $request->country_id;
            // $user->driver_id = $request->driver_id;
            // $user->team_id = $request->team_id;
            // $user->race_id = $request->race_id;

            $user->save();

            return response()->json([
                'status' => true,
                'msg' => 'Profile updated successfully!!'
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Invalid User!!'
        ]);
    }

    public function resetPassword(Request $request)
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => true,
                'msg' => 'Password updated successfully!!'
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Invalid User!'
        ]);
    }
}
