<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::latest()->paginate(3);
        return view('web_backend.partners.index',[
            'partners'=>$partners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner =Partner::all();
        return view('web_backend.partners.create',['partner'=>$partner]);
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
            'name' => 'required|string',
            'url' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
        ]);
        $partner = new Partner();
        $partner->name = $request->name;
        $partner->url = $request->url;
        $partner->image = $request->file('image')->store('imageFolder', 'public');
        $partner->save();
        return redirect()->route('partners.index')->with('message', 'Post has been created Successfully!:)');
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
    public function edit(Partner $partner)
    {   
        return view('web_backend.partners.edit',['partner'=>$partner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Partner $partner)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240'
        ]);
        $partner->name = $request->name;
        $partner->url = $request->url;
        if ($request->file('image')) {
            $partner->image = $request->file('image')->store('imageFolder', 'public');
        } 
        $partner->save();
        return redirect()->route('partners.index')->with('message', 'Post has been Update Successfully!:)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->back();
    }
}
