<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriasController extends Controller
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
     * Muestra la lista de categorías.
     */
    public function index()
    {
        $categorias = $this->fetchData('/categorias');

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Muestra el detalle de una categoría específica.
     */
    public function show(int $id)
    {
        $categoria = $this->fetchData('/categorias/' . $id);

        return view('categorias.show', compact('categoria'));
    }
}