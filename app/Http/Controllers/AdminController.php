<?php

namespace App\Http\Controllers;

use App\Application;
use App\Contract;
use App\Tariff;
use App\Texnolog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class AdminController extends Controller
{
    public function index()
    {
        $applications_count = Application::count();
        $contract_count = Contract::count();
        return view('backend.index', [
            'is_active' => 'index',
            'applications_count' => $applications_count,
            'contract_count' => $contract_count
        ]);
    }
    public function addUser()
    {
        return view('backend.Users.register');
    }

    public function changeCourier(Request $request)
    {
        $result = view('backend.Applications.courier-form', [
            'dataName' => $request->dataName
        ])->render();
        $data = $request->result;

        $res = [
                'result' => $result,
                'data' => $data
            ];
        return json_encode($res);
    }

    public function lineChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April'],
            'datasets' => array([
                'label' => 'Posts',
                'borderColor' => '#ff5e00',
                'backgroundColor' => 'rgba(255, 94, 0, .3)',
                'data' => [rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
            ])
        ];
    }
    public function pieChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'datasets' => array([
                'label' => 'Posts',
//                'borderColor' => '#44b6ae',
                'backgroundColor' => ['#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b'],
                'data' => [rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,500)]
            ])
        ];
    }
    public function barChartjs()
    {
        return [
            'labels' => ['Tashkent', 'Andijan', 'Bukhara', 'Ferghana', 'Jizzakh', 'Karakalpakistan', 'Kashkadarya', 'Khoresm', 'Namangan', 'Navoiy', 'Samarkand', 'Surkhandarya', 'Syrdarya'],
            'datasets' => array([
                'label' => 'Filial',
//                'borderColor' => ['#002e5b', '#F26202'],
                'backgroundColor' => ['#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202'],
                'data' => [rand(0,5000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
            ])
        ];
    }
    public function radarChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April'],
            'datasets' => array(
                [
                    'label' => 'Posts',
                    'backgroundColor' => 'rgba(255, 94, 0, 0.5)',
                    'data' => [rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
                ],
                [
                    'label' => 'Posts',
                    'backgroundColor' => '#002e5b',
                    'data' => [rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
                ]
            )
        ];
    }
}
