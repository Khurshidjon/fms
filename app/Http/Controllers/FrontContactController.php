<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\FrontContact;

class FrontContactController extends Controller
{
    public function create()
    {
        return view('frontend.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email' => 'required|string',
            'subject'=>'required',
            'message' => 'required',
        ]);
        $content = new FrontContact();
        $content->name = $request->name;
        $content->email = $request->email;
        $content->message= $request->message;
        $content->save();
        return redirect()->back()->with('message', 'Contact has been created Successfully!:)');

    }
}
