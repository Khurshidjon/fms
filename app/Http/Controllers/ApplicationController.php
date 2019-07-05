<?php

namespace App\Http\Controllers;

use App\Application;
use App\Courier;
use App\District;
use App\Sale;
use App\Texnolog;
use App\Region;
use App\ContractPrice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:application create')->except(['index']);
    }


    public function index(Request $request)
    {
        $request->session()->remove('application');
        $request->session()->remove('second_step');
        $cities = Application::where('status', '!=', 0)->get();
        $applications = Application::where('status', '!=', 0)->latest()->paginate(10);
        
        return view('backend.Applications.index', [
            'applications' => $applications,
            'is_active' => 'steps',
            'cities' => $cities
        ]);
    }

    public function indexFromCity(Request $request)
    {
        $cities = Application::where('status', '!=', 0)->get();
        if($request->city_id == null){
            $applications = Application::where('status', '!=', 0)->latest()->paginate(10);
        }else{
            $applications = Application::where('status', '!=', 0)->where('from_city_id', $request->city_id)->get();
        }
        
        $result = view('backend.Applications.app-render', 
            [
                'applications' => $applications,
                'is_active' => 'steps',
                'cities' => $cities
            ]
        )->render();

        return $result;
    }

    public function indexToCity(Request $request)
    {
        $cities = Application::where('status', '!=', 0)->get();
        if($request->city_id == null){
            $applications = Application::where('status', '!=', 0)->latest()->paginate(10);
        }else{
            $applications = Application::where('status', '!=', 0)->where('to_city_id', $request->city_id)->get();
        }
        
        $result = view('backend.Applications.app-render', 
            [
                'applications' => $applications,
                'is_active' => 'steps',
                'cities' => $cities
            ]
        )->render();
        
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $courier = Courier::where('application_id', $application->id)->first();
        return view('backend.Applications.edit-steps.third-step', [
            'application' => $application,
            'is_active' => 'steps',
            'courier' => $courier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $application->status = $request->status;
        $application->performed_date = now();
        $application->who_performed = Auth::id();
        $application->save();
        return redirect()->back()->with('success', 'Заявка было успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->status = 0;
        $application->save();
        return redirect()->back()->with('success', 'Заявка было успешно удалено');
    }


    /**--------------------------------------------------------------------- Zayvkani qadamma qadam to'ldirish forlmasi */

    public function firstStep(Request $request)
    {
       $request->session()->remove('application');
       $request->session()->remove('second_step');
        if (Auth::user()->hasRole('Admin')){
            $regions = Region::all();
        }else{
            $regions = Region::where('id', Auth::user()->organ_id)->get();
        }
        $cities = Texnolog::all();
        $application = $request->session()->get('application');

        return view('backend.Applications.steps.first-step', [
            'is_active' => 'steps',
            'application' => $application,
            'cities' => $cities,
            'regions' => $regions
        ]);
    }

    public function cityChange(Request $request)
    {
        $city_id = $request->city_id;
        $districts = DB::table('districts')->where('region_id', $city_id)->get();
        return response()->json($districts);
    }

    public function cityChangeAction(Request $request)
    {
//        $result = '';
        $city_id = $request->city_id;
        if ($city_id != 10){
            $city_id = $request->city_id;
            $districts = Texnolog::where('to_city_id', $city_id)->get();
            if (!isset($districts) || !isset($city_id)){
                return response()->json('error', 500);
            }
            foreach($districts->unique('to_district_id') as $district){
                $result[] = "<option value='" . $district->to_district->id . "'>".  $district->to_district->name_ru  . "</option";
            }
        }else{
            $districts = Texnolog::where('from_city_id', $city_id)->get();

            if (!isset($districts) || !isset($city_id)){
                return response()->json('error', 500);
            }
            foreach($districts->unique('from_district_id') as $district){
                $result[] = "<option value='" . $district->from_district->id . "'>".  $district->from_district->name_ru  . "</option";
            }
        }
        return response()->json($result);
    }
    public function toCityChangeAction(Request $request)
    {
        $city_id = $request->city_id;
        $districts = Texnolog::where('to_city_id', $city_id)->get();

        foreach($districts->unique('to_district_id') as $district){
            $result[] = "<option value='" . $district->to_district->id . "'>".  $district->to_district->name_ru  . "</option";
        }
        return response()->json($result);
    }

    public function firstStepResult(Request $request)
    {
        $date = date('y');
        $increment =  str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
        $increment = $increment.$date;

        \DNS1D::getBarcodeSVG($increment, "C128",2,33,"black", true);
        \DNS1D::getBarcodePNG($increment, "C128",2,33,array(1,1,1), true);
        \DNS1D::getBarcodeHTML($increment, "C128");
        \DNS1D::getBarcodePNGPath($increment, "C128",3,33);
        $request->validate([
            'from_city' => 'required|numeric',
            'to_city' => 'required|numeric',
            'weight' => 'required|regex:/^[0-9]+((\\.)*(\\,)*[0-9]+)?$/',
            'from_district' => 'required|numeric',
            'to_district' => 'required|numeric',
            'from_phone' => 'required',
            'to_phone' => 'required',
            'from_fio' => 'required',
            'to_fio' => 'required',
            'transfers' => 'required',
            'from_date' => 'required',
            'pieces' => 'required',
            'category_product' => 'required',
        ]);

        $step = DB::table('steps')->select('steps')->first()->steps;
        
        $step = 1*$step;

        $from_city = $request->from_city;
        $to_city = $request->to_city;
        $from_district = $request->from_district;
        $to_district = $request->to_district;

        if($request->number_contract != null)
        {
            if ($from_city != 10){
                $tariff_one = ContractPrice::where('from_city_id', 10)
                    ->where('to_city_id', $from_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $from_district)
                    ->where('contract_id', $request->number_contract)
                    ->first();
                $tariff_two = ContractPrice::where('from_city_id', 10)
                    ->where('to_city_id', $to_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $to_district)
                    ->where('contract_id', $request->number_contract)
                    ->first();
                $period_date = $tariff_one->delivery_time + $tariff_two->delivery_time;

                $tariff_no_tashkent = $tariff_one->service_price + $tariff_two->service_price;
            }else{
                $tariff = ContractPrice::where('from_city_id', $from_city)
                    ->where('to_city_id', $to_city)
                    ->where('from_district_id', $from_district)
                    ->where('to_district_id', $to_district)
                    ->where('contract_id', $request->number_contract)
                    ->first();
            }

        }else{
            if ($from_city != 10){
                $tariff_one = Texnolog::where('from_city_id', 10)
                    ->where('to_city_id', $from_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $from_district)
                    ->first();
                $tariff_two = Texnolog::where('from_city_id', 10)
                    ->where('to_city_id', $to_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $to_district)
                    ->first();
                $period_date = $tariff_one->delivery_time + $tariff_two->delivery_time;

                $tariff_no_tashkent = $tariff_one->service_price + $tariff_two->service_price;
            }else{
                $tariff = Texnolog::where('from_city_id', $request->from_city)
                    ->where('to_city_id', $request->to_city)
                    ->where('from_district_id', $request->from_district)
                    ->where('to_district_id', $request->to_district)
                    ->first();
            }

        }
        $volume_x = 1*$request->volume_x;
        $volume_y = 1*$request->volume_y;
        $volume_z = 1*$request->volume_z;
        $incorrect_weight = str_replace(',', '.', $request->weight);
        $weight = 1*$incorrect_weight;

        if ($from_city != 10){
            $is_price = $tariff_no_tashkent*$step;
        }else{
            $is_price = $tariff->service_price*$step;
        }
        $volume = (($volume_x*$volume_y*$volume_z)/6000);

        $w = ($weight)/($step);
        $v = ($volume)/($step);

        /*------------------------------------------------------------------------------------------------------*/
        if ($from_city != 10){
            $first_step = $tariff_one->weight + $step;
        }else{
            $first_step = $tariff->weight + $step;
        }

        if ($weight > 0 && $weight < $first_step){
            if ($from_city != 10) {
                $price_weight = $tariff_no_tashkent;
            }else{
                $price_weight = $tariff->service_price;
            }
        }else{
            $price_weight = explode('.', round($w, 2))[0]*$is_price;
        }

        if ($volume > 0 && $volume < $first_step){
            if ($from_city != 10) {
                $price_volume = $tariff_one->service_price;
            }else{
                $price_volume = $tariff->service_price;
            }
        }else{
            $price_volume = explode('.', round($v, 2))[0]*$is_price;
        }

        /*------------------------------------------------------------------------------------------------------*/
        if ($from_city != 10){
            $tariff_from_courier_price = $tariff_one->with_courier_from_home_price;
            $tariff_to_courier_price = $tariff_two->with_courier_to_home_price;
        }else{
            $tariff_from_courier_price = $tariff->with_courier_from_home_price;
            $tariff_to_courier_price = $tariff->with_courier_to_home_price;
        }



        $with_weight_price_service = $price_weight;

        $with_volume_price_service = $price_volume;

        $applicationSession = $request->session()->get('application');

        if($applicationSession == null){
            $application = new Application();
            $application->user_id = \Auth::id();
            $application->guid =  $increment;
            $application->from_city_id = $request->get('from_city');
            $application->from_district_id = $request->get('from_district');
            $application->to_city_id = $request->get('to_city');
            $application->to_district_id = $request->get('to_district');
            $application->from_address = $request->from_address;
            $application->to_address = $request->to_address;
            $application->from_phone = $request->from_phone;
            $application->to_phone = $request->to_phone;
            $application->from_fio = $request->from_fio;
            $application->to_fio = $request->to_fio;
            $application->weight = $weight;
            $application->volume = $volume;
            $application->category_pay_service = $request->transfers;
            $application->number_contract = $request->number_contract;
            $application->from_date = Carbon::parse($request->from_date);
            if ($from_city != 10){
                $d = strtotime(date_create($request->from_date)->format("Y-m-d") . "+ ". $period_date ." days");
                $application->to_date = date("Y-m-d", $d);
            }else{
                $d = strtotime(date_create($request->from_date)->format("Y-m-d") . "+ ". $tariff->delivery_time ." days");
                $application->to_date = date("Y-m-d", $d);
            }

            // $application->to_date = $request->to_date;
            // $application->delivered_date = $request->delivered_date;

            $application->category_product = $request->category_product;
            $application->pieces = $request->pieces;

            if($with_volume_price_service >= $with_weight_price_service){
                $application->cost_service = $with_volume_price_service;
            }else{
                $application->cost_service = $with_weight_price_service;
            }
            if($request->get('from_courier') == 'on'){
                $application->cost_from_courier = $tariff_from_courier_price;
            }
            if($request->get('to_courier') == 'on'){
                $application->cost_to_courier = $tariff_to_courier_price;
            }
            $application->from_organ_name = $request->from_organ_name;
            $application->to_organ_name = $request->to_organ_name;
            $application->status = 1;
            $application->save();
            $request->session()->put(['application' => $application]);
        }else{

            // code ...

        }
        return redirect()->route('admin.second-step');
    }
    public function secondStep(Request $request)
    {
        $application = $request->session()->get('application');
        $sales = Sale::all();
        $int = PHP_INT_MAX;
        $x = 0;
    
        foreach($sales as $sale){
            if($sale->weight >= $application->weight){
                if($int > ($sale->weight - $application->weight)){
                    $int = $sale->weight - $application->weight;
                    $x = $sale->weight;
                }
            }    
        }
        
        $sale = Sale::where('weight', $x)->first();
        $couriers = User::all();
        return view('backend.Applications.steps.second-step', [
            'is_active' => 'steps',
            'sale' => $sale,
            'application' => $application,
            'couriers' => $couriers
        ]);
    }
    public function secondStepResult(Request $request)
    {
        $request->validate([
            'sale_for_from_courier' => '|min:0|max:100',
            'sale_for_service' => 'min:0|max:100',
            'sale_for_to_courier' => 'min:0|max:100',
        ]);

        $sale_for_from_courier = 1*$request->sale_for_from_courier;
        $sale_for_service = 1*$request->sale_for_service;
        $sale_for_to_courier = 1*$request->sale_for_to_courier;

        $cost_from_courier = 1*$request->cost_from_courier;
        $cost_service = 1*$request->cost_service;
        $cost_to_courier = 1*$request->cost_to_courier;

        if ($sale_for_from_courier){
            $cost_from_courier = ($cost_from_courier - (($cost_from_courier)*($sale_for_from_courier))/100);
        }
        if ($sale_for_service){
            $cost_service = ($cost_service - (($cost_service)*($sale_for_service))/100);
        }
        if ($sale_for_to_courier){
            $cost_to_courier = ($cost_to_courier - (($cost_to_courier)*($sale_for_to_courier))/100);
        }

        $appSession = $request->session()->get('application');
        $second_step = $request->session()->get('second_step');

        if($second_step != null){
            return redirect()->back()->with('error', 'Извините, это заявка была получено');
        }
            $application = Application::find($appSession->id);

            $application->cost_from_courier = $cost_from_courier;
            $application->cost_service = $cost_service;
            $application->cost_to_courier = $cost_to_courier;

            if($request->from_pay_courier == 'on'){
                $application->from_pay_courier = 'sender';
            }else{
                $application->from_pay_courier = 'receiver';
            }

            if($request->pay_service == 'on'){
                $application->pay_service = 'sender';
            }else{
                $application->pay_service = 'receiver';
            }

            if($request->to_pay_courier == 'on'){
                $application->to_pay_courier = 'sender';
            }else{
                $application->to_pay_courier = 'receiver';
            }

            $application->category_pay_from_courier = $request->category_pay_from_courier;
            $application->category_pay_to_courier = $request->category_pay_to_courier;

            $application->sale_for_from_courier = $sale_for_from_courier;
            $application->sale_for_service = $sale_for_service;
            $application->sale_for_to_courier = $sale_for_to_courier;

            $application->save();

            $courier = new Courier();
            $courier->application_id = $application->id;

            if($request->from_courier_type == 'on'){
                $courier->from_courier_name = $request->from;
                $courier->from_courier_phone = $request->from_phone;
            }else{
                if ($request->get('from_courier_name')){
                    $from_courier = User::find(1*$request->get('from_courier_name'));
                    $courier->from_courier_name = $from_courier->username;
                    $courier->from_courier_phone = $from_courier->phone;
                }
            }
            if($request->courier_type == 'on'){
                $courier->courier_name = $request->post;
                $courier->courier_phone = $request->post_phone;
            }elseif ($request->get('courier_name')){
                $post_courier = User::find(1*$request->get('courier_name'));
                $courier->courier_name  = $post_courier->username;
                $courier->courier_phone = $post_courier->phone;
            }
            if($request->to_courier_type == 'on'){
                $courier->to_courier_name = $request->to;
                $courier->to_courier_phone = $request->to_phone;
            }else{
                if ($request->get('to_courier_name')){
                    $to_courier = User::find(1*$request->get('to_courier_name'));
                    $courier->to_courier_name = $to_courier->username;
                    $courier->to_courier_phone = $to_courier->phone;
                }
            }

            $courier->save();

            $request->session()->put('application', $application);
            $request->session()->put('second_step', 'second_step');
            return redirect()->route('admin.third-step');
    }
    public function thirdStep(Request $request)
    {           
        $application = $request->session()->get('application');
        $courier = Courier::where('application_id', $application->id)->first();

        return view('backend.Applications.steps.third-step', [
            'is_active' => 'steps',
            'application' => $application,
            'courier' => $courier
        ]);
    }

    /*Nakladnoyni yangilash agar shunga ehtiyoj bo'lsa*/

    public function firstStepEdit(Request $request, Application $application)
    {
//        if (Auth::id() == $application->user_id || Auth::user()->hasRole('Admin')){
//            return redirect()->back()->with('error', 'У вас нет прав доступа для обновления приложения');
//        }

        $this->authorize('edit', $application);
        if (Auth::user()->hasRole('Admin')){
            $regions = Region::all();
        }else{
            $regions = Region::where('id', Auth::user()->organ_id)->get();
        }
        $cities = Texnolog::all();
        return view('backend.Applications.edit-steps.first-step', [
            'is_active' => 'steps',
            'application' => $application,
            'cities' => $cities,
            'regions' => $regions,
        ]);
    }

    public function firstStepResultEdit(Request $request, Application $application)
    {
        $date = date('y');
        $increment =  str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
        $increment = $increment.$date;

        \DNS1D::getBarcodeSVG($increment, "C128",2,33,"black", true);
        \DNS1D::getBarcodePNG($increment, "C128",2,33,array(1,1,1), true);
        \DNS1D::getBarcodeHTML($increment, "C128");
        \DNS1D::getBarcodePNGPath($increment, "C128",3,33);

        $request->validate([
            'from_city' => 'required|numeric',
            'to_city' => 'required|numeric',
            'weight' => 'required|regex:/^[0-9]+((\\.)*(\\,)*[0-9]+)?$/',
            'from_district' => 'required|numeric',
            'to_district' => 'required|numeric',
            'from_phone' => 'required',
            'to_phone' => 'required',
            'from_fio' => 'required',
            'to_fio' => 'required',
            'transfers' => 'required',
            'from_date' => 'required',
            'pieces' => 'required',
            'category_product' => 'required',
        ]);

        $step = DB::table('steps')->select('steps')->first()->steps;

        $step = 1*$step;

        $from_city = $request->from_city;
        $to_city = $request->to_city;
        $from_district = $request->from_district;
        $to_district = $request->to_district;

        if($request->number_contract != null)
        {
            if ($from_city != 10){
                $tariff_one = ContractPrice::where('from_city_id', 10)
                    ->where('to_city_id', $from_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $from_district)
                    ->where('contract_id', $request->number_contract)
                    ->first();
                $tariff_two = ContractPrice::where('from_city_id', 10)
                    ->where('to_city_id', $to_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $to_district)
                    ->where('contract_id', $request->number_contract)
                    ->first();
                $period_date = $tariff_one->delivery_time + $tariff_two->delivery_time;

                $tariff_no_tashkent = $tariff_one->service_price + $tariff_two->service_price;
            }else{
                $tariff = ContractPrice::where('from_city_id', $from_city)
                    ->where('to_city_id', $to_city)
                    ->where('from_district_id', $from_district)
                    ->where('to_district_id', $to_district)
                    ->where('contract_id', $request->number_contract)
                    ->first();
            }
        }else{
            if ($from_city != 10){
                $tariff_one = Texnolog::where('from_city_id', 10)
                    ->where('to_city_id', $from_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $from_district)
                    ->first();
                $tariff_two = Texnolog::where('from_city_id', 10)
                    ->where('to_city_id', $to_city)
                    ->where('from_district_id', 1005)
                    ->where('to_district_id', $to_district)
                    ->first();

                $period_date = $tariff_one->delivery_time + $tariff_two->delivery_time;

                $tariff_no_tashkent = $tariff_one->service_price + $tariff_two->service_price;
            }else{
                $tariff = Texnolog::where('from_city_id', $request->from_city)
                    ->where('to_city_id', $request->to_city)
                    ->where('from_district_id', $request->from_district)
                    ->where('to_district_id', $request->to_district)
                    ->first();
            }

        }
        $volume_x = 1*$request->volume_x;
        $volume_y = 1*$request->volume_y;
        $volume_z = 1*$request->volume_z;
        $incorrect_weight = str_replace(',', '.', $request->weight);
        $weight = 1*$incorrect_weight;

        if ($from_city != 10){
            $is_price = $tariff_no_tashkent*$step;
        }else{
            $is_price = $tariff->service_price*$step;
        }
        $volume = (($volume_x*$volume_y*$volume_z)/6000);

        $w = ($weight)/($step);
        $v = ($volume)/($step);

        /*------------------------------------------------------------------------------------------------------*/
        if ($from_city != 10){
            $first_step = $tariff_one->weight + $step;
        }else{
            $first_step = $tariff->weight + $step;
        }

        if ($weight > 0 && $weight < $first_step){
            if ($from_city != 10) {
                $price_weight = $tariff_no_tashkent;
            }else{
                $price_weight = $tariff->service_price;
            }
        }else{
            $price_weight = explode('.', round($w, 2))[0]*$is_price;
        }

        if ($volume > 0 && $volume < $first_step){
            if ($from_city != 10) {
                $price_volume = $tariff_one->service_price;
            }else{
                $price_volume = $tariff->service_price;
            }
        }else{
            $price_volume = explode('.', round($v, 2))[0]*$is_price;
        }

        /*------------------------------------------------------------------------------------------------------*/
        if ($from_city != 10){
            $tariff_from_courier_price = $tariff_one->with_courier_from_home_price;
            $tariff_to_courier_price = $tariff_two->with_courier_to_home_price;
        }else{
            $tariff_from_courier_price = $tariff->with_courier_from_home_price;
            $tariff_to_courier_price = $tariff->with_courier_to_home_price;
        }

        $with_weight_price_service = $price_weight;

        $with_volume_price_service = $price_volume;

            $application->user_id = \Auth::id();
            $application->guid =  $increment;
            $application->from_city_id = $request->get('from_city');
            $application->from_district_id = $request->get('from_district');
            $application->to_city_id = $request->get('to_city');
            $application->to_district_id = $request->get('to_district');
            $application->from_address = $request->from_address;
            $application->to_address = $request->to_address;
            $application->from_phone = $request->from_phone;
            $application->to_phone = $request->to_phone;
            $application->from_fio = $request->from_fio;
            $application->to_fio = $request->to_fio;
            $application->weight = $weight;
            $application->volume = $volume;
            $application->category_pay_service = $request->transfers;
            $application->number_contract = $request->number_contract;
            $application->from_date = $request->from_date;
        if ($from_city != 10){
            $d = strtotime(date_create($request->from_date)->format("Y-m-d") . "+ ". $period_date ." days");
            $application->to_date = date("Y-m-d", $d);
        }else{
            $d = strtotime(date_create($request->from_date)->format("Y-m-d") . "+ ". $tariff->delivery_time ." days");
            $application->to_date = date("Y-m-d", $d);
        }
            // $application->to_date = $request->to_date;
            // $application->delivered_date = $request->delivered_date;
            $application->category_product = $request->category_product;
            $application->pieces = $request->pieces;

            if($with_volume_price_service >= $with_weight_price_service){
                $application->cost_service = $with_volume_price_service;
            }else{
                $application->cost_service = $with_weight_price_service;
            }
            if($request->get('from_courier') == 'on'){
                $application->cost_from_courier = $tariff_from_courier_price;
            }else{
                $application->cost_from_courier = null;
            }
            if($request->get('to_courier') == 'on'){
                $application->cost_to_courier = $tariff_to_courier_price;
            }else{
                $application->cost_to_courier = null;
            }
            $application->from_organ_name = $request->from_organ_name;
            $application->to_organ_name = $request->to_organ_name;
            $application->status = 1;
            $application->save();

        return redirect()->route('admin.second-step-edit', ['application' => $application]);
    }
    public function secondStepEdit(Application $application)
    {
        $sales = Sale::all();
        $int = PHP_INT_MAX;
        $x = 0;
        foreach($sales as $sale){
            if($sale->weight >= $application->weight){
                if($int > ($sale->weight - $application->weight)){
                    $int = $sale->weight - $application->weight;
                    $x = $sale->weight;
                }
            }    
        }
        
        $sale = Sale::where('weight', $x)->first();
        $couriers = User::all();
        return view('backend.Applications.edit-steps.second-step', [
            'is_active' => 'steps',
            'sale' => $sale,
            'application' => $application,
            'couriers' => $couriers
        ]);
    }

    public function secondStepResultEdit(Request $request, Application $application)
    {
        $sale_for_from_courier = 1*$request->sale_for_from_courier;
        $sale_for_service = 1*$request->sale_for_service;
        $sale_for_to_courier = 1*$request->sale_for_to_courier;

        $cost_from_courier = 1*$request->cost_from_courier;
        $cost_service = 1*$request->cost_service;
        $cost_to_courier = 1*$request->cost_to_courier;

        if ($sale_for_from_courier){
            $cost_from_courier = ($cost_from_courier - (($cost_from_courier)*($sale_for_from_courier))/100);
        }
        if ($sale_for_service){
            $cost_service = ($cost_service - (($cost_service)*($sale_for_service))/100);
        }
        if ($sale_for_to_courier){
            $cost_to_courier = ($cost_to_courier - (($cost_to_courier)*($sale_for_to_courier))/100);
        }


        $application->cost_from_courier = $cost_from_courier;
        $application->cost_service = $cost_service;
        $application->cost_to_courier = $cost_to_courier;


        if($request->from_pay_courier == 'on'){
            $application->from_pay_courier = 'sender';
        }else{
            $application->from_pay_courier = 'receiver';
        }

        if($request->pay_service == 'on'){
            $application->pay_service = 'sender';
        }else{
            $application->pay_service = 'receiver';
        }

        if($request->to_pay_courier == 'on'){
            $application->to_pay_courier = 'sender';
        }else{
            $application->to_pay_courier = 'receiver';
        }
        if ($application->cost_from_courier){
            $application->category_pay_from_courier = $request->category_pay_from_courier;
        }else{
            $application->category_pay_from_courier = null;
        }
        if ($application->cost_to_courier){
            $application->category_pay_to_courier = $request->category_pay_to_courier;
        }else{
            $application->category_pay_to_courier = null;
        }

        $application->sale_for_from_courier = $sale_for_from_courier;
        $application->sale_for_service = $sale_for_service;
        $application->sale_for_to_courier = $sale_for_to_courier;

        $application->save();

        $courier = Courier::where('application_id', $application->id)->first();


//        dd(1*$request->from_courier_name);
//        if($request->from_courier_type == 'on'){
//            $courier->from_courier_name = $request->from;
//            $courier->from_courier_phone = $request->from_phone;
//        }elseif ($request->get('from_courier_name') != null){
//        dd($application);


        if ($request->get('from_courier_name')){
            $from_courier = User::find(1*$request->get('from_courier_name'));
            $courier->from_courier_name = $from_courier->username;
            $courier->from_courier_phone = $from_courier->phone;
        }


//        if($request->courier_type == 'on'){
//            $courier->courier_name = $request->post;
//            $courier->courier_phone = $request->post_phone;
//        }elseif ($request->get('courier_name')){


        if ($request->get('courier_name')){
            $post_courier = User::find(1*$request->get('courier_name'));
            $courier->courier_name  = $post_courier->username;
            $courier->courier_phone = $post_courier->phone;
        }

//        if($request->to_courier_type == 'on'){
//            $courier->to_courier_name = $request->to;
//            $courier->to_courier_phone = $request->to_phone;
//        }else{

        if ($request->get('to_courier_name')){
            $to_courier = User::find($request->get('to_courier_name'));
            $courier->to_courier_name = $to_courier->username;
            $courier->to_courier_phone = $to_courier->phone;
        }

//        }

        $courier->save();

        return redirect()->route('admin.third-step-edit', ['application' => $application]);
    }

    public function thirdStepEdit(Application $application)
    {
        $courier = Courier::where('application_id', $application->id)->first();

        return view('backend.Applications.edit-steps.third-step', [
            'is_active' => 'steps',
            'application' => $application,
            'courier' => $courier
        ]);
    }

}
