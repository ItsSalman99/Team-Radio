<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{

    public function login()
    {
        if (Auth::user()) {

            return redirect()->route('dashboard');
        } else {

            return view('auth.signin');
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {

            $check = Hash::check($request->password, $user->password);

            if ($check) {
                Auth::login($user);
                return response()->json([
                    'status' => true,
                    'msg' => 'Logged in successfull!'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Invalid Login!'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Account Not Found!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');

    }

}
