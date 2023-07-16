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
            if($request->hasFile('avatar'))
            {
                $filename = $request->getSchemeAndHttpHost() . '/users/avatars/' . $request->avatar->getClientOriginalName();

                $user->avatar = $filename;
            }
            $user->first_name = $request->first_name != null ? $request->first_name : $user->first_name;
            $user->last_name = $request->last_name != null ? $request->last_name : $user->last_name;
            $user->phone = $request->phone != null ? $request->phone : $user->phone;
            $user->dob = $request->dob != null ? $request->dob : $user->dob;
            $user->msg_ribbon = $request->msg_ribbon != null ? $request->msg_ribbon : $user->msg_ribbon;

            if(User::where('email', $request->email)->first())
            {
                return response()->json([
                    'status' => false,
                    'msg' => 'Email already in use!'
                ]);
            }
            else{
                $user->email = $request->email != null ? $request->email : $user->email;
            }

            $user->team_id = $request->team_id != null ? $request->team_id : $user->team_id;
            $user->driver_id = $request->driver_id != null ? $request->driver_id : $user->driver_id;
            $user->race_id = $request->race_id != null ? $request->race_id : $user->race_id;

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
