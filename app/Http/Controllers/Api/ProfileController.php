<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if ($user) {
            if ($request->hasFile('profile_picture')) {
                $filename = $request->getSchemeAndHttpHost() . '/upload/users/profile/' . $request->profile_picture->getClientOriginalName();
                $request->profile_picture->move(public_path('/upload/users/profile/'), $filename);
                $user->profile_picture = $filename;
            }
            $user->first_name = $request->first_name != null ? $request->first_name : $user->first_name;
            $user->last_name = $request->last_name != null ? $request->last_name : $user->last_name;
            $user->phone = $request->phone != null ? $request->phone : $user->phone;
            $user->dob = $request->dob != null ? $request->dob : $user->dob;
            $user->msg_ribbon = $request->msg_ribbon != null ? $request->msg_ribbon : $user->msg_ribbon;
            
            $user->helmet_color = $request->helmet_color != null ? $request->helmet_color : $user->helmet_color;
            $user->team_color = $request->team_color != null ? $request->team_color : $user->team_color;

            if (User::where('email', $request->email)->first()) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Email already in use!'
                ]);
            } else {
                $user->email = $request->email != null ? $request->email : $user->email;
            }


            $user->car_number = $request->car_number != null ? $request->car_number : $user->car_number;
            
            $user->country = $request->country != null ? $request->country : $user->country;

            // $user->car_number_id = $request->car_number_id != null ? $request->car_number_id : $user->car_number_id;;

            $user->team_id = $request->team_id != null ? $request->team_id : $user->team_id;
            $user->driver_id = $request->driver_id != null ? $request->driver_id : $user->driver_id;
            $user->race_id = $request->race_id != null ? $request->race_id : $user->race_id;

            // $user->country_id = $request->country_id;
            // $user->driver_id = $request->driver_id;
            // $user->team_id = $request->team_id;
            // $user->race_id = $request->race_id;

            $user->save();
            
            $user = User::where('id', $user->id)
            ->with('driver', 'team', 'race')
            ->first();

            return response()->json([
                'status' => true,
                'data' => $user
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

    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $token = request()->bearerToken();

        $user = User::where('token', '!=', NULL)
        ->where('token', $token)->first();

        if ($user) {

            if (Hash::check($request->old_password, $user->password)) {

                $user->password = Hash::make($request->new_password);
                $user->save();

                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Password does not matched!'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'User not found!'
            ]);
        }
    }
}
