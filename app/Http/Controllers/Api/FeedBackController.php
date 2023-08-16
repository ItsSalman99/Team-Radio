<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserFeedBack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedBackController extends Controller
{
    
    public function getAll()
    {
        $token = request()->bearerToken();
        
        $user = User::where('token', $token)->first();
        
        if($user)
        {
            $feedback = UserFeedBack::where('from', $user->id)
            ->with('feedback_from', 'feedback_to')->get();
            
            return response()->json([
                'status' => true,
                'data' => $feedback
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!!'
            ]);
        }
        
        
        
    }
    
    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'to' => 'required',
            'feedback' => 'required',
        ]);
        
        
        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $token = request()->bearerToken();
        
        $user = User::where('token', $token)->first();
        
        if($user)
        {
            $feedback = new UserFeedBack();
        
            $feedback->to = $request->to;
            $feedback->from = $user->id;
            $feedback->feedback = $request->feedback;
            $feedback->save();
            
            $feedback = UserFeedBack::where('id', $feedback->id)
            ->with('feedback_from', 'feedback_to')->first();
            
            return response()->json([
                'status' => true,
                'data' => $feedback
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!!'
            ]);
        }
        
    }
    
}
