<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests\PostRequest;
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
    public function store(PostRequest $postRrequest)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title_uz = $postRrequest->title_uz;
        $post->title_cyrl = $postRrequest->title_cyrl;
        $post->title_ru = $postRrequest->title_ru;
        $post->title_en = $postRrequest->title_en;
        $post->description_uz = $postRrequest->description_uz;
        $post->description_cyrl = $postRrequest->description_cyrl;
        $post->description_ru = $postRrequest->description_ru;
        $post->description_en = $postRrequest->description_en;
        $post->body_uz = $postRrequest->body_uz;
        $post->body_cyrl = $postRrequest->body_cyrl;
        $post->body_ru = $postRrequest->body_ru;
        $post->body_en = $postRrequest->body_en;
        if($postRrequest->banner == 'on'){
            $post->banner = 1;
        }
        $post->image = $postRrequest->file('image')->store('imageFolder', 'public');
        $post->save();

        return redirect()->route('post.index')->with('message', 'Post has been created Successfully!');
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
    public function update(PostRequest $postRequest, Post $post)
    {
        $post->user_id = Auth::id();
        $post->title_uz = $postRequest->title_uz; 
        $post->title_cyrl = $postRequest->title_cyrl; 
        $post->title_ru = $postRequest->title_ru; 
        $post->title_en = $postRequest->title_en; 
        $post->description_uz = $postRequest->description_uz; 
        $post->description_cyrl = $postRequest->description_cyrl; 
        $post->description_ru = $postRequest->description_ru; 
        $post->description_en = $postRequest->description_en; 
        $post->body_uz = $postRequest->body_uz;
        $post->body_cyrl = $postRequest->body_cyrl;
        $post->body_ru = $postRequest->body_ru;
        $post->body_en = $postRequest->body_en;
        $post->status = $postRequest->get('status');
        if($postRequest->file('image')){
            $post->image = $postRequest->file('image')->store('imageFolder', 'public');
        } 
         $post->save();
        return redirect()->route('post.index')->with('message','Post has been updated Successfully!');
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
    public function postStatus(Post $post, Request $request)
    {
        $post->status = 1 * $request->status;
        $post->save();
        return redirect()->route('post.index')->with('success', 'Страница была успешно обновлена');
    }
}
