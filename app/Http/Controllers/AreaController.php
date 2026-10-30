<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    public function index()   
    {

        $areas = $this->apiGet('/areas');
        
        return view('areas.index', compact('areas'));
    }

    public function show($id)
    {

        $area = $this->apiGet('/areas/' . $id);

        return view('areas.show', compact('area'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $this->apiWrite('POST', '/areas', $request->all());

        return redirect()->route('areas.index');
    }

    public function edit($id)
    {
        $area = $this->apiGet('/areas/' . $id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $this->apiWrite('PUT', '/areas/' . $id, $request->all());

        return redirect()->route('areas.index');
    }

      public function destroy($id)
    {
        $this->apiWrite('DELETE', '/areas/' . $id);
        return redirect()->route('areas.index');
    }
}