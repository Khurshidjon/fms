<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('status', '!=', 2)->paginate(10);
        return view('web_backend.albums.index', [
            'albums' => $albums,
            'is_active' => 'albums',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web_backend.albums.create', [
            'is_active' => 'albums',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator  = \Validator::make($request->all(), [
            'album_image' => 'required|image'
        ]);
        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        Album::create([
            'album_title_uz' => $request->album_title_uz,
            'album_title_cyrl' => $request->album_title_cyrl,
            'album_title_ru' => $request->album_title_ru,
            'album_title_en' => $request->album_title_en,
            'album_image' => $request->file('album_image')->store('Albums', 'public'),
        ]);
        return redirect()->route('albums.index')->with('message', 'Album has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('web_backend.albums.show', [
            'is_active' => 'albums',
            'album' => $album
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('web_backend.albums.edit', [
            'is_active' => 'albums',
            'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->album_title_uz = $request->album_title_uz;
        $album->album_title_cyrl = $request->album_title_cyrl;
        $album->album_title_ru = $request->album_title_ru;
        $album->album_title_en = $request->album_title_en;
        if($request->file('album_image')){
            $album->album_image = $request->file('album_image')->store('Albums', 'public');
        }
        $album->save();
        return redirect()->route('albums.index')->with('message', 'Album has been created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
    public function statusUpdate(Request $request, Album $album)
    {
        $album->status = $request->status;
        $album->save();
        return redirect()->back()->with('message', 'Album has been updated successfully');

    }
}
