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
        $settings = Setting::latest()->paginate(3);
         return view('web_backend.settings.index',[
            'settings'=>$settings
         ]);
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
        $setting = new Setting();
        $setting->key = $request->key;
        $setting->title_uz = $request->title_uz;
        $setting->title_ўз = $request->title_ўз;
        $setting->title_ru = $request->title_ru;
        $setting->title_en = $request->title_en;
        $setting->value_uz = $request->value_uz;
        $setting->value_ўз = $request->value_ўз;
        $setting->value_ru = $request->value_ru;
        $setting->value_en = $request->value_en;
        $setting->status = $request->get('status');
        $setting->image = $request->file('image')->store('imageFolder', 'public');
        $setting->save();
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
    public function edit(Setting $setting)
    {
        return view('web_backend.settings.edit',[
        'setting'=>$setting
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
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
       
        $setting->key = $request->key;
        $setting->title_uz = $request->title_uz;
        $setting->title_ўз = $request->title_ўз;
        $setting->title_ru = $request->title_ru;
        $setting->title_en = $request->title_en;
        $setting->value_uz = $request->value_uz;
        $setting->value_ўз = $request->value_ўз;
        $setting->value_ru = $request->value_ru;
        $setting->value_en = $request->value_en;
        $setting->status = $request->get('status');
        if ($request->file('image')) {
            $setting->image = $request->file('image')->store('imageFolder', 'public');
        } 
        $setting->save();
        return redirect()->route('settings.index')->with('message', 'Post has been created Successfully!:)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->back();
    }
}
