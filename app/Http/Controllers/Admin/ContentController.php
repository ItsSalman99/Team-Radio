<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::first();
        
        return view('Admin.Content.index', get_defined_vars());
    }
    
    public function store(Request $request)
    {
        $content = Content::first();
        if(!$content)
        {
            $content = new Content();
            
        }
        
        if($request->type == 'about')
        {
            $content->about = $request->content;
        }
        else if($request->type == 'privacy')
        {
            $content->privacy = $request->content;
        }
        else if($request->type == 'terms')
        {
            $content->terms = $request->content;
        }
        
        $content->save();
        
        return response()->json([
            'status' => true,
            'msg' => ''
        ]);
        
    }
    
}
