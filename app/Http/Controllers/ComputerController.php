<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputerController extends Controller
{
    // Método para listar los computadores
    public function index() 
    {
        $computers = $this->apiGet('/computers');
        
        return view('computers.index', compact('computers'));
    }

    public function show($id)
    {
        $computer = $this->apiGet('/computers/' . $id);

        return view('computers.show', compact('computer'));
    }

    public function create()
    {
        return view('computers.create');
    }

    // Registrar computador enviando la imagen a Cloudinary a través del backend
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/computers',['number' => $request->number, 'brand' => $request->brand]);

        return redirect()->route('computers.index');
    }

    public function edit($id)
    {
        $computer = $this->apiGet('/computers/' . $id);
        
        return view('computers.edit', compact('computer'));
    }

    // Actualizar computador e imagen opcional en Cloudinary
    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => ['required', 'string', 'max:100'],
            'brand' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:5120'],
        ]);

        $request->merge(['_method' => 'PUT']);
        
        // Realiza el envío multiparte de actualización hacia el backend
        $this->apiWriteMultipart('POST', '/computers/' . $id, $request);

        return redirect()->route('computers.index')->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy($id)
    {
        $this->apiWrite('DELETE', '/computers/' . $id);

        return redirect()->route('computers.index')->with('success', 'Computador eliminado correctamente.');
    }
}