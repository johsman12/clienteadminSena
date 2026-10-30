<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index()   
    {
        $apprentices = $this->apiGet('/apprentices');
        
        return view('apprentices.index', compact('apprentices'));
    }

    public function show($id)
    {
        // Cambiamos a singular para que coincida con la vista show
        $apprentice = $this->apiGet('/apprentices/' . $id);

        return view('apprentices.show', compact('apprentice'));
    }

    public function create()
    {
        $courses = $this->apiGet('/courses');
        $computers = $this->apiGet('/computers');

        return view('apprentices.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $this->apiWrite('POST', '/apprentices', $request->all());

        return redirect()->route('apprentices.index');
    }

    public function edit($id)
    {
        $apprentice = $this->apiGet('/apprentices/' . $id);
        $courses = $this->apiGet('/courses');
        $computers = $this->apiGet('/computers');
        
        return view('apprentices.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $this->apiWrite('PUT', '/apprentices/' . $id, $request->all());

        return redirect()->route('apprentices.index');
    }

    public function destroy($id)
    {
        $this->apiWrite('DELETE', '/apprentices/' . $id);
        
        return redirect()->route('apprentices.index');
    }
}