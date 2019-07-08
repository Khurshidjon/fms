<?php

namespace App\Http\Controllers;

use App\Country;
use App\InternationalTech;
use Illuminate\Http\Request;

class InternationalTechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interTech = InternationalTech::latest()->paginate(15);
        return view('backend.InternationalTechno.index', [
            'interTech' => $interTech,
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
        $countries = Country::all();
        return view('backend.InternationalTechno.create', [
            'is_active' => 'International',
            'countries' => $countries
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternationalTech  $internationalTech
     * @return \Illuminate\Http\Response
     */
    public function show(InternationalTech $internationalTech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternationalTech  $internationalTech
     * @return \Illuminate\Http\Response
     */
    public function edit(InternationalTech $internationalTech)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InternationalTech  $internationalTech
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternationalTech $internationalTech)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternationalTech  $internationalTech
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternationalTech $internationalTech)
    {
        //
    }
}
