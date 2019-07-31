<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest()->paginate(3);
        return view('web_backend.post.index',['post'=>$post]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id=null)
    {       
       
        return view('web_backend.post.create',['user_id'=>$user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title_uz' => 'required|string',
            'title_ўз' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'description_uz' => 'required',
            'description_ўз' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'body_uz' => 'required',
            'body_ўз' => 'required',
            'body_ru' => 'required',
            'body_en' => 'required',
            'status' => 'required',
            'banner' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
           
        ]);
        $post = New Post();
        $post->user_id = Auth::id();
        $post->title_uz = $request->title_uz;
        $post->title_ўз = $request->title_ўз;
        $post->title_ru = $request->title_ru;
        $post->title_en = $request->title_en;
        $post->description_uz = $request->description_uz;
        $post->description_ўз = $request->description_ўз;
        $post->description_ru = $request->description_ru;
        $post->description_en = $request->description_en;
        $post->body_uz = $request->body_uz;
        $post->body_ўз = $request->body_ўз;
        $post->body_ru = $request->body_ru;
        $post->body_en = $request->body_en;
        $post->status = $request->get('status');
        $post->status = $request->banner;
        $post->image = $request->file('image')->store('imageFolder', 'public');
        $post->save();
        return redirect()->route('post.index')->with('message','Post has been created Successfully!:)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\web\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\web\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('web_backend.post.edit',['post'=>$post]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\web\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'user_id'=>'required',
            'title_uz'=>'required|string',
            'title_ўз'=>'required|string',
            'title_ru'=>'required|string',
            'title_en'=>'required|string',
            'description_uz'=>'required',
            'description_ўз'=>'required',
            'description_ru'=>'required',
            'description_en'=>'required',
            'body_uz'=>'required',
            'body_ўз'=>'required',
            'body_ru'=>'required',
            'body_en'=>'required',
            'status'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
        ]);
        $post->user_id = $request->get('user_id');
        $post->title_uz = $request->title_uz; 
        $post->title_ўз = $request->title_ўз; 
        $post->title_ru = $request->title_ru; 
        $post->title_en = $request->title_en; 
        $post->description_uz = $request->description_uz; 
        $post->description_ўз = $request->description_ўз; 
        $post->description_ru = $request->description_ru; 
        $post->description_en = $request->description_en; 
        $post->body_uz = $request->body_uz;
        $post->body_ўз = $request->body_ўз;
        $post->body_ru = $request->body_ru;
        $post->body_en = $request->body_en;
        $post->status = $request->get('status');
        if($request->file('image')){
            $post->image = $request->file('image')->store('imageFolder', 'public');
        } 
         $post->save();
        return redirect()->route('post.index')->with('message','Post has been created Successfully!:)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\web\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
