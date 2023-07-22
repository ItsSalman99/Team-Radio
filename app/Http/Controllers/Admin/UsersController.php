<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'password' => 'required'
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


    public function getUsers()
    {
        $users = User::where('user_type', 'user')->get();

        return view('Admin.Users.index', get_defined_vars());
    }

    public function getUsersNames()
    {
        $users = Username::all();

        return view('Admin.UserNames.index', get_defined_vars());
    }

}
