<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\Reader\Word2007\Settings;
use App\Setting;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('web_backend.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web_backend.settings.create');
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
            'key'     => 'required',
            'title_uz' => 'required|string',
            'title_ўз' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'required|string',
            'value_uz' => 'required|string',
            'value_ўз' => 'required|string',
            'value_ru' => 'required|string',
            'value_en' => 'required|string',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
        ]);
        $settings = new Setting();
        $settings->key = $request->key;
        $settings->title_uz = $request->title_uz;
        $settings->title_ўз = $request->title_ўз;
        $settings->title_ru = $request->title_ru;
        $settings->title_en = $request->title_en;
        $settings->value_uz = $request->value_uz;
        $settings->value_ўз = $request->value_ўз;
        $settings->value_ru = $request->value_ru;
        $settings->value_en = $request->value_en;
        $settings->status = $request->get('status');
        $settings->image = $request->file('image')->store('imageFolder', 'public');
        $settings->save();
        return redirect()->route('settings.index')->with('message', 'Post has been created Successfully!:)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
