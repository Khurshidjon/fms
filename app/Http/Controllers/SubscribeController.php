<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscribe;

class SubscribeController extends Controller
{
    public function create()
    {
        return view('frontend.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $sub = new Subscribe();
        $sub->email = $request->email;
        $sub->save();
        return redirect()->back()->with('message', 'email successfull message!)');
    }
}
