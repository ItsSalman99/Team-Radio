<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{

    public function getAll()
    {

        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if ($user) {

            $members = TeamMember::where('user_id', $user->id)->get();

            return response()->json([
                'status' => true,
                'data' => $members
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Unauthorized User!'
            ]);
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => true,
                'msg' => $validator->errors()->first()
            ]);
        }

        $token = request()->bearerToken();

        $user = User::where('token', $token)->first();

        if ($user) {
            $team = new TeamMember();

            $team->name = $request->name;
            $team->user_id = $user->id;
            $team->save();

            return response()->json([
                'status' => true,
                'data' => $team
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Unauthorized User!'
            ]);
        }
    }
}
