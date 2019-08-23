<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Setting;
use App\Partner;
use App\Page;
use App\Menu;
use App\Album;
use App\Gallery;
use App\FrontContact;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Post::where('banner', 1)->where('status', 1)->get();
        $card1 = Setting::where('key', 'card1')->where('status', 1)->first();
        $card2 = Setting::where('key', 'card2')->where('status', 1)->first();
        $card3 = Setting::where('key', 'card3')->where('status', 1)->first();
        $services = Setting::where('key','services')->where('status', 1)->first(); 
        $services_card1 = Setting::where('key','services_card1')->where('status', 1)->first(); 
        $services_card2 = Setting::where('key','services_card2')->where('status', 1)->first(); 
        $services_card3 = Setting::where('key','services_card3')->where('status', 1)->first(); 
        $services_card4 = Setting::where('key','services_card4')->where('status', 1)->first(); 
        $services_card5 = Setting::where('key','services_card5')->where('status', 1)->first(); 
        $services_card6 = Setting::where('key','services_card6')->where('status', 1)->first();
        $statistics = Setting::where('key', 'statistics')->where('status', 1)->first();
        $statistics1 = Setting::where('key', 'statistics1')->where('status', 1)->first();
        $statistics2 = Setting::where('key', 'statistics2')->where('status', 1)->first();
        $statistics3 = Setting::where('key', 'statistics3')->where('status', 1)->first();
        $about = Setting::where('key', 'about')->where('status', 1)->first();
        $call_to_action = Setting::where('key','call_to_action')->where('status', 1)->first();
        $contact_us = Setting::where('key','contact_us')->where('status', 1)->first();
        $phone_number = Setting::where('key', 'phone_number')->where('status', 1)->first();
        $email = Setting::where('key', 'email')->where('status', 1)->first();
        $address = Setting::where('key', 'address')->where('status', 1)->first();
        $partners = Partner::get();
        $albums = Album::where('status', 0)->get();
        $galleries = Gallery::all();
        
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
                'address'=>$address,
                'albums' => $albums,
                'galleries' => $galleries
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
    public function subjectStore(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email' => 'required|string',
            'subject'=>'required',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);
        $content = new FrontContact();
        $content->name = $request->name;
        $content->subject = $request->subject;
        $content->email = $request->email;
        $content->message = $request->message;
        $content->save();

        return redirect()->back()->with('message', 'Contact has been created Successfully!');
    }
    public function refreshCaptcha()
    {
        return captcha_img('flat');
    }
    public function gallery()
    {
        $albums = Album::where('status', 0)->get();
        $galleries = Gallery::all();
        return view('frontend.gallery', compact(['albums', 'galleries']));
    }
}