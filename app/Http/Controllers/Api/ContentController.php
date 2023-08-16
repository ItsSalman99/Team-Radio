<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function getAll($type)
    {
        $content = Content::first();
        if($type == 'about')
        {
            return response()->json([
                'status' => true,
                'data' => $content->about
            ]);
            
        }
        else if($type == 'terms')
        {
            return response()->json([
                'status' => true,
                'data' => $content->terms
            ]);
            
        }
        else if($type == 'privacy')
        {
            return response()->json([
                'status' => true,
                'data' => $content->privacy
            ]);
            
        }
    }
}
