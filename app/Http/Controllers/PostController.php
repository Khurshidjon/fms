<?php

namespace App\Http\Controllers;

use App\Post;
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
    public function create()
    {
        return view('web_backend.post.create');
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
            'title'=>'required|string',
            'description'=>'required',
            'body'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
           
        ]);
        $post = New Post();
        $post->title = $request->title; 
        $post->description = $request->description; 
        $post->body = $request->body; 
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
            'title'=>'required|string',
            'description'=>'required',
            'body'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
           
        ]);
        $post->title = $request->title; 
        $post->description = $request->description; 
        $post->body = $request->body;
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
