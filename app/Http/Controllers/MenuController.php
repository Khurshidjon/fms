<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu= Menu::latest()->paginate(3);
        return view('web_backend.menu.index',['menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web_backend.menu.create');
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

            'name_uz' => 'required|string',
            'name_ўз' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'parent' => 'required',
            'order_by'=>'required',
            'status' => 'required',
            
        ]);
        $menu = New Menu();
        $menu->name_uz = $request->name_uz;
        $menu->name_ўз = $request->name_ўз;
        $menu->name_ru = $request->name_ru;
        $menu->name_en = $request->name_en;
        $menu->parent = $request->parent;
        $menu->order_by = $request->order_by;
        $menu->status = $request->get('status');
       
        $menu->save();
        return redirect()->route('menu.index')->with('message', 'Post has been created Successfully!:)');
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
    public function edit( Menu $menu)
    {
        return view('web_backend.menu.edit',['menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu  $menu)
    {
        $request->validate([

            'name_uz' => 'required|string',
            'name_ўз' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'parent' => 'required',
            'order_by' => 'required',
            'status' => 'required',

        ]);
        $menu->name_uz = $request->name_uz;
        $menu->name_ўз = $request->name_ўз;
        $menu->name_ru = $request->name_ru;
        $menu->name_en = $request->name_en;
        $menu->parent = $request->parent;
        $menu->order_by = $request->order_by;
        $menu->status = $request->get('status');

        $menu->save();
        return redirect()->route('menu.index')->with('message', 'Post has been created Successfully!:)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
