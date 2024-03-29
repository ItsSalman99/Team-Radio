<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReportReasons;
use App\Models\User;
use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportUserController extends Controller
{

    public function getAll()
    {
        $token = request()->bearerToken();

        $user = User::where('token', '!=', NULL)
            ->where('token', $token)
            ->first();

        if ($user) {

            $reports = UserReport::where('reported_from', $user->id)
            ->with('reportedfrom', 'reportedto', 'reason')->get();

            return response()->json([
                'status' => true,
                'data' => $reports
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Token!!'
            ]);
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'reported_to' => 'required',
            'reason_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        try {

            $token = request()->bearerToken();

            $user = User::where('token', '!=', NULL)
                ->where('token', $token)
                ->first();

            if ($user) {
                $report = new UserReport();

                $report->reported_to = $request->reported_to;
                $report->reported_from = $user->id;
                $report->reason_id = $request->reason_id;

                $report->save();

                return response()->json([
                    'status' => true,
                    'data' => 'User has been reported!'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Token!!'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    
    public function updateReason(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reported_to' => 'required',
            'reason_id' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        try {

            $token = request()->bearerToken();

            $user = User::where('token', '!=', NULL)
                ->where('token', $token)
                ->first();

            if ($user) {
                $report = UserReport::where('reported_from',$user->id)
                ->where('reported_to',$request->reported_to)
                ->first();
                
                if($report)
                {
                    $report->reason_id = isset($request->reason_id) ? $request->reason_id : $report->reason_id;
    
                    $report->save();
    
                
                    $report = UserReport::where('id', $report->id)
                    ->with('reportedfrom', 'reportedto', 'reason')->first();

    
                    return response()->json([
                        'status' => true,
                        'data' => $report
                    ]);
                    
                }
                else{
                   return response()->json([
                        'status' => false,
                        'message' => 'Not Found!!'
                    ]); 
                }

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Token!!'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    
}
