<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function mision()
    {
        return view('home.mision');
    }

    public function vision()
    {
        return view('home.vision');
    }

    public function contact()
    {
        return view('home.contact');
    }
}