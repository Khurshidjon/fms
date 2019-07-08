<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::latest()->paginate(15);
        return view('backend.Countries.index', [
            'countries' => $countries,
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
        return view('backend.Countries.create', [
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

            Country::create($request->all());

            return redirect()->route('countries.index')->with('success', 'Название страны успешно создано');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('backend.Countries.edit', [
            'is_active' => 'International',
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
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

           $country->update($request->all());

            return redirect()->route('countries.index')->with('success', 'Страна успешно переименована');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
