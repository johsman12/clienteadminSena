<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    public function index()   
    {

        $trainingcenters = $this->apiGet('/trainingcenters');
        
        return view('trainingcenters.index', compact('trainingcenters'));
    }

    public function show($id)
    {

        $center = $this->apiGet('/trainingcenters/' . $id);

        return view('trainingcenters.show', compact('center'));
    }

    public function create()
    {
        return view('trainingcenters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:5120'],
        ]);

        $this->apiWriteMultipart('POST', '/trainingcenters', $request);

        return redirect()->route('trainingcenters.index');
    }

    public function edit($id)
    {
        $trainingcenter = $this->apiGet('/trainingcenters/' . $id);
        return view('trainingcenters.edit', compact('trainingcenter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:5120'],
        ]);

        $request->merge(['_method' => 'PUT']);
        $this->apiWriteMultipart('POST', '/trainingcenters/' . $id, $request);

        return redirect()->route('trainingcenters.index');
    }

      public function destroy($id)
    {
        $this->apiWrite('DELETE', '/trainingcenters/' . $id);
        return redirect()->route('trainingcenters.index');
    }
}