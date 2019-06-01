<?php

namespace App\Http\Controllers;

use App\Tariff;
use App\Texnolog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index', [
            'is_active' => 'index'
        ]);
    }
    public function addUser()
    {
        return view('backend.Users.register');
    }
    public function lineChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April'],
            'datasets' => array([
                'label' => 'Posts',
//                'borderColor' => '#002e5b',
                'backgroundColor' => '#F26202',
                'data' => [rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
            ])
        ];
    }
    public function pieChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April'],
            'datasets' => array([
                'label' => 'Posts',
//                'borderColor' => ['#002e5b', '#F26202'],
                'backgroundColor' => ['#F26202', '#002e5b', '#F26202', '#002e5b'],
                'data' => [rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
            ])
        ];
    }
    public function barChartjs()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'datasets' => array([
                'label' => 'Posts',
                'borderColor' => '#44b6ae',
                'backgroundColor' => ['#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b', '#F26202', '#002e5b',],
                'data' => [rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000), rand(0,1000)]
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
