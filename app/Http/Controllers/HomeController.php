<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $url = rtrim((string) env('URL_SERVER_API'), '/');
        $counts = [
            'totalAprendices' => $this->countResource($url . '/apprentices'),
            'totalInstructores' => $this->countResource($url . '/teachers'),
            'totalCursos' => $this->countResource($url . '/courses'),
            'totalEquipos' => $this->countResource($url . '/computers'),
            'totalAreas' => $this->countResource($url . '/areas'),
            'totalCentros' => $this->countResource($url . '/trainingcenters'),
        ];

        return view('welcome', $counts);
    }

    private function countResource(string $url): int
    {
        $response = Http::acceptJson()->timeout(10)->get($url);

        if ($response->failed()) {
            return 0;
        }

        $payload = $response->json();
        $items = is_array($payload) && isset($payload['data']) && is_array($payload['data'])
            ? $payload['data']
            : $payload;

        return is_array($items) ? count($items) : 0;
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