<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Setting;

class FrontendController extends Controller
{
    public function index()
    {
        $post=Post::where('banner',1)->get();
        $setting_one = Setting::where('key', 4)->first();

        return view('frontend.index', [
            'post'=>$post,
            'set_one' => $setting_one
        ]);
    }
    public function settings()
    {
        
    }

}
