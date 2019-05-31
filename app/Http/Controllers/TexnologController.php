<?php

namespace App\Http\Controllers;

use App\Texnolog;
use App\Region;
use Illuminate\Http\Request;

class TexnologController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:texnolog');
    }

    public function index()
    {
        $texnologs = Texnolog::latest()->paginate(15);
        return view('backend.Texnolog.index', [
            'is_active' => 'texnolog',
            'texnologs' => $texnologs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Region::all();
        return view('backend.Texnolog.create', [
            'is_active' => 'texnolog',
            'cities' => $cities
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
        Texnolog::create([
            'from_city_id' => $request->get('from_city_id'),
            'to_city_id' => $request->get('to_city_id'),
            'from_district_id' => $request->get('from_district_id'),
            'to_district_id' => $request->get('to_district_id'),
            'weight' => $request->weight,
            'delivery_time' => $request->delivery_time,
            'weight' => 1,
            'with_courier_from_home_price' => $request->with_courier_from_home_price,
            'with_courier_to_home_price' => $request->with_courier_to_home_price,
            'service_price' => $request->service_price,
        ]);

        return redirect()->route('texnologs.index')->with('success', 'Тариф успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Texnolog  $texnolog
     * @return \Illuminate\Http\Response
     */
    public function show(Texnolog $texnolog)
    {
        return view('backend.Texnolog.show', [
            'is_active' => 'texnolog',
            'texnolog' => $texnolog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Texnolog  $texnolog
     * @return \Illuminate\Http\Response
     */
    public function edit(Texnolog $texnolog)
    {
        $cities = Region::all();

        return view('backend.Texnolog.edit', [
            'is_active' => 'texnolog',
            'texnolog' => $texnolog,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Texnolog  $texnolog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Texnolog $texnolog)
    {
        $texnolog->update([
            'from_city_id' => $request->get('from_city_id'),
            'to_city_id' => $request->get('to_city_id'),
            'from_district_id' => $request->get('from_district_id'),
            'to_district_id' => $request->get('to_district_id'),
            'weight' => $request->weight,
            'delivery_time' => $request->delivery_time,
            'weight' => 1,
            'with_courier_from_home_price' => $request->with_courier_from_home_price,
            'with_courier_to_home_price' => $request->with_courier_to_home_price,
            'service_price' => $request->service_price,
        ]);
        
        return redirect()->route('texnologs.index')->with('success', 'Тариф успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Texnolog  $texnolog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Texnolog $texnolog)
    {
        //
    }
}
