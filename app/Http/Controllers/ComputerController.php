<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputerController extends Controller
{
    public function fetchData(string $url){
        $response = Http::get($url);
        return $response->json();
    }
    public function index()
    {
        $url = env('API_URL') . '/';
        $computers = $this->fetchData($url.'computers');
        return view('computers.index', compact('computers'));
    }
    public function show(int $id)
    {
        $url = env('API_URL') . '/';
        $computer = $this->fetchData($url.'computers/' . $id);
        return view('computers.show', compact('computer'));
    }
}