<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Setting;
use App\Partner;
use App\Page;
use App\Menu;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Post::where('banner', 1)->where('status', 1)->get();
        $card1 = Setting::where('key', 'card1')->first();
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
        $about = Setting::where('key', 'about')->first();
        $call_to_action = Setting::where('key','call_to_action')->first();
        $contact_us = Setting::where('key','contact_us')->first();
        $phone_number = Setting::where('key', 'phone_number')->first();
        $email = Setting::where('key', 'email')->first();
        $address = Setting::where('key', 'address')->first();
        $partners = Partner::get();
        
            return view('frontend.index',[
                'banners' => $banners,
                'card1' => $card1,
                'card2' => $card2,
                'card3' => $card3,
                'services' => $services,
                'services_card1' => $services_card1,
                'services_card2' => $services_card2,
                'services_card3' => $services_card3,
                'services_card4' => $services_card4,
                'services_card5' => $services_card5,
                'services_card6' => $services_card6,
                'statistics'=> $statistics,
                'statistics1'=> $statistics1,
                'statistics2'=> $statistics2,
                'statistics3'=> $statistics3,
                'partners' => $partners,
                'about' => $about,
                'call_to_action'=>$call_to_action,
                'contact_us'=>$contact_us,
                'phone_number'=> $phone_number,
                'email'=>$email,
                'address'=>$address
            ]);
    }
    public function page($menu)
    {
        $menu_id = Menu::where('url', $menu)->first();
        $page = Page::where('menu_id', $menu_id->id)->first();
        
        return view('frontend.page', [
            'page' => $page
        ]);
    }
    public function news()
    {
        $posts = Post::where('status', 1)->take(2)->get();
        $skip = 2;
        return view('frontend.news', [
            'posts' => $posts,
            'skip' => $skip
        ]);
    }
    public function single_news(Post $post)
    {
        if (!isset($_COOKIE[$post->id])){
            $post->increment('view_count');
            setcookie($post->id, $post->id, time()+60*60*24*30);
        }
        return view('frontend.news_blog', [
            'post' => $post
        ]);
    }
    public function renderNews(Request $request)
    {
        $skip = $request->skip;
        $take = 2;
        $posts = Post::where('status', 1)->skip($skip)->take($take)->get();
        $skip += $take;
        $lang = \App::getLocale();
        if(is_null($posts)){
            return 'error';
        }
    
        $result = view('frontend.news-render', [
            'posts' => $posts,
            'lang' => $lang
        ])->render();

        $array = array([
            'result' => $result,
            'skip' => $skip
        ]);
        $res = json_encode($array);
        return $res;
    }
    public function contact()
    {
        $call_to_action = Setting::where('key', 'call_to_action')->first();
        $contact_us = Setting::where('key', 'contact_us')->first();
        $phone_number = Setting::where('key', 'phone_number')->first();
        $email = Setting::where('key', 'email')->first();
        $address = Setting::where('key', 'address')->first();
        return view('frontend.contact',[
            'call_to_action' => $call_to_action,
            'contact_us' => $contact_us,
            'phone_number' => $phone_number,
            'email' => $email,
            'address' => $address
        ]);
    }
}
