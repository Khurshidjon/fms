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
            'settings'=>$settings,
            'is_active' => 'settings',
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting =Setting::all();
        return view('web_backend.settings.create',[
            'setting'=>$setting,
            'is_active' => 'settings',
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
        $request->validate([
            'key'     => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:10240'
        ]);
        $setting = new Setting();
        $setting->key = $request->key;
        $setting->title_uz = $request->title_uz;
        $setting->title_cyrl = $request->title_cyrl;
        $setting->title_ru = $request->title_ru;
        $setting->title_en = $request->title_en;
        $setting->value_uz = $request->value_uz;
        $setting->value_cyrl = $request->value_cyrl;
        $setting->value_ru = $request->value_ru;
        $setting->value_en = $request->value_en;
        $setting->status = $request->get('status');
        if($request->file('image')){
            $setting->image = $request->file('image')->store('imageFolder', 'public');
        }
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
        $settings = Setting::all();
        return view('web_backend.settings.edit',[
                'setting'=>$setting,
                'settings'=>$settings,
                'is_active' => 'settings',
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
            'image' => 'image|mimes:jpg,jpeg,png|max:10240'
        ]);
       
        $setting->key = $request->key;
        $setting->title_uz = $request->title_uz;
        $setting->title_cyrl = $request->title_cyrl;
        $setting->title_ru = $request->title_ru;
        $setting->title_en = $request->title_en;
        $setting->value_uz = $request->value_uz;
        $setting->value_cyrl = $request->value_cyrl;
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
