<?php

namespace App\Http\Controllers;

use App\Models\Star;

class HomeController extends Controller
{
    public function index()
    {
        $stars =  Star::all();
        return view('welcome',compact('stars'));
    }
}
