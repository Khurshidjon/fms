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
}
