<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    public function getDashboard()
    {
        $authors=Main::all();
        return view('admin.dashboard',['authors'=>$authors]);
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);
        if(!Auth::attempt(['name'=>$request['name'],'password'=>$request['password']])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.dashboard');
        
    }
}
