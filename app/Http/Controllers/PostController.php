<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    // URL base de la API
    private $apiUrl = 'http://api.codefree.sena.edu.co/api';

    /**
     * Método privado para manejar las peticiones HTTP (Fetch).
     */
    private function fetchData($endpoint)
    {
        try {
            $response = Http::get($this->apiUrl . $endpoint);
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Muestra la lista de posts.
     */
    public function index()
    {
        $posts = $this->fetchData('/posts');

        return view('posts.index', compact('posts'));
    }

    /**
     * Muestra el detalle de un post específico.
     */
    public function show($id)
    {
        $post = $this->fetchData('/posts/' . $id);

        return view('posts.show', compact('post'));
    }
}