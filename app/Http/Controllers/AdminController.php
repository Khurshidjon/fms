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
        $applications_count = Application::where('status', '!=', 0)->count();
        $contract_count = Contract::where('status', '!=', 0)->count();
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
    public function pieChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'datasets' => array([
                'label' => 'Posts',
                'backgroundColor' => ['#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b'],
                'data' => [rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,100), rand(0,500)]
            ])
        ];
    }
}
