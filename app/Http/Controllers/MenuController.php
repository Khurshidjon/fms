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
        $menus = Menu::all();
        $order = Menu::latest()->first();
        return view('web_backend.menu.create', [
            'menus' => $menus,
            'order' => $order
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
            'name_uz' => 'required|string',
            'name_cyrl' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'position'=>'required'
        ]);
        $menu = new Menu();
        $menu->name_uz = $request->name_uz;
        $menu->name_cyrl = $request->name_cyrl;
        $menu->name_ru = $request->name_ru;
        $menu->name_en = $request->name_en;
        $menu->url = $request->url;
        $menu->parent = $request->get('parent');
        $menu->position = $request->get('position');
        $menu->order_by = $request->order_by;       
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
        $menus=Menu::all();
        return view('web_backend.menu.edit',['menu'=>$menu,'menus'=>$menus]);
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
            'name_cyrl' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'parent' => 'required',
            // 'order_by' => 'required',
            'position'=>'required',
            // 'status' => 'required',

        ]);
        $menu->name_uz = $request->name_uz;
        $menu->name_cyrl = $request->name_cyrl;
        $menu->name_ru = $request->name_ru;
        $menu->name_en = $request->name_en;
        $menu->url = $request->url;
        $menu->parent = $request->parent;
        $menu->order_by = $request->order_by;
        $menu->status = $request->get('status');
        $menu->position = $request->get('position');

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
    public function menuStatus(Menu $menu, Request $request)
    {
        $menu->status = $request->status;
        $menu->save();
        return redirect()->back()->with('success', 'Меню было успешно обновлен');
    }
}
