<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportReasons;
use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class ReportController extends Controller
{
    public function index()
    {
        $reports = UserReport::all();

        return view('Admin.Reports.index', get_defined_vars());
    }

    public function getReasonsOptions()
    {
        $options = ReportReasons::all();

        return view('Admin.Reports.Options.index', get_defined_vars());
    }
    
    public function changeStatus($id)
    {
        $option = ReportReasons::where('id', $id)->first();
        
        if($option->status == 1)
        {
            $option->status = 0;
            $option->save();
        }
        else{
            $option->status = 1;
            $option->save();
        }
        
        return redirect()->back();
    }
    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $option = new ReportReasons;
        $option->reason = $request->reason;
        $option->save();
        
        return response()->json([
            'status' => true,
            'msg' => 'Successfully Added!!'
        ]);
    }
    
    public function editOption($id)
    {
        $option = ReportReasons::where('id', $id)->first();
        
        return response()->json([
            'status' => true,
            'data' => $option
        ]);
        
    }
    
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $option = ReportReasons::where('id', $id)->first();
        $option->reason = $request->reason;
        $option->save();

        toast('Success Toast','success');

        return redirect()->back();

    }
    
}
