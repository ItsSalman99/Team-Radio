<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{

    public function forgetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            $otp = random_int(000000, 999999);

            $user->otp = $otp;
            $user->save();

            return response()->json([
                'status' => true,
                'data' => $otp
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'User not found!'
            ]);
        }
    }

    public function checkOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            if ($request->otp == $user->otp) {

                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Otp does not matched!'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'User not found!'
            ]);
        }
    }

    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user) {

            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'User not found!'
            ]);
        }
    }

}
