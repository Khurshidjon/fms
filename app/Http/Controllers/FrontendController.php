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
        $setting=Setting::where('key',4)->latest()->paginate(3);
        foreach ($setting as $set) {
        
            return view('frontend.index',[
                'post'=>$post,
                'set'=>$set
                ]);
        }
    }
    public function settings()
    {
        
    }

}
