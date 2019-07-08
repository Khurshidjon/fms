<?php

namespace App\Http\Controllers;

use App\CategoryInterTech;
use App\Country;
use App\TechnoCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryInterTechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryInterTech::latest()->paginate(15);
        return view('backend.CategoryTechno.index', [
            'categories' => $categories,
            'is_active' => 'International'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.CategoryTechno.create', [
            'is_active' => 'International'
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validate->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validate);
        }else{

            CategoryInterTech::create($request->all());

            return redirect()->route('categories-techno.index')->with('success', 'Название зоны успешно создано');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryInterTech  $categoryInterTech
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryInterTech $categories_techno)
    {
        $countries = Country::all();
        return view('backend.CategoryTechno.show', [
            'is_active' => 'International',
            'categories_techno' => $categories_techno,
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryInterTech  $categoryInterTech
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryInterTech $categories_techno)
    {
        return view('backend.CategoryTechno.edit', [
            'is_active' => 'International',
            'category' => $categories_techno
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryInterTech  $categoryInterTech
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryInterTech $categories_techno)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validate->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validate);
        }else{

            $categories_techno->update($request->all());

            return redirect()->route('categories-techno.index')->with('success', 'Зона успешно переименована');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryInterTech  $categoryInterTech
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryInterTech $categories_techno)
    {
        //
    }

    public function attach_country_to_zone(CategoryInterTech $categories_techno, Country $country)
    {
        $country->country_zone()->attach($categories_techno);
        return redirect()->back()->with('success', 'Зона успешно переименована');
    }
    public function detach_country_from_zone(CategoryInterTech $categories_techno, Country $country)
    {
        $country->country_zone()->detach($categories_techno);
        return redirect()->back()->with('success', 'Зона успешно переименована');
    }
}
