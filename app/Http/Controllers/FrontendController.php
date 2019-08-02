<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Setting;
use App\Partner;

class FrontendController extends Controller
{
    public function index()
    {
        $post=Post::where('banner',1)->get();
        $card1=Setting::where('key','card1')->first();
        $card2 = Setting::where('key', 'card2')->first();
        $card3 = Setting::where('key', 'card3')->first();
        $services = Setting::where('key','services')->first(); 
        $services_card1 = Setting::where('key','services_card1')->first(); 
        $services_card2 = Setting::where('key','services_card2')->first(); 
        $services_card3 = Setting::where('key','services_card3')->first(); 
        $services_card4 = Setting::where('key','services_card4')->first(); 
        $services_card5 = Setting::where('key','services_card5')->first(); 
        $services_card6 = Setting::where('key','services_card6')->first();
        $statistics = Setting::where('key', 'statistics')->first();
        $statistics1 = Setting::where('key', 'statistics1')->first();
        $statistics2 = Setting::where('key', 'statistics2')->first();
        $statistics3 = Setting::where('key', 'statistics3')->first();
        $partners = Partner::get();
        
            return view('frontend.index',[
                'post'=>$post,
                'card1'=>$card1,
                'card2'=>$card2,
                'card3'=>$card3,
                'services'=>$services,
                'services_card1'=> $services_card1,
                'services_card2'=>$services_card2,
                'services_card3'=>$services_card3,
                'services_card4'=>$services_card4,
                'services_card5'=>$services_card5,
                'services_card6'=>$services_card6,
            'statistics'=> $statistics,
            'statistics1'=> $statistics1,
            'statistics2'=> $statistics2,
            'statistics3'=> $statistics3,
            'partners'=>$partners
            ]);
        }

}
