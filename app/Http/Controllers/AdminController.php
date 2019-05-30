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
}
