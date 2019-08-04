<?php

namespace App\Http\Controllers;

use App\Page;
use App\Menu;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::where('status', '!=', 2)->paginate(10);
        return view('web_backend.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('web_backend.pages.create', [
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        Page::create($request->all());
        return redirect()->route('pages.index')->with('success', 'Страница была успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $menus = Menu::all();
        return view('web_backend.pages.edit', [
            'menus' => $menus,
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page )
    {
        $page->update($request->all());
        return redirect()->back()->with('success', 'Страница была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Страница была успешно удалена');

    }
    public function status(Page $page, Request $request)
    {
        $page->status = 1*$request->status;
        $page->save();
        return redirect()->route('pages.index')->with('success', 'Страница была успешно обновлена');
    }
}
