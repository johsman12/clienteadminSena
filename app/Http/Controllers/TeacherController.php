<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = $this->apiGet('/teachers');
        return view('teachers.index', compact('teachers'));
    }

    public function show($id)
    {
        $teachers = $this->apiGet('/teachers/' . $id);

        return view('teachers.show', compact('teachers'));
    }

    public function create()
    {
        $areas = $this->apiGet('/areas');
        $training_centers = $this->apiGet('/trainingcenters');
        // Si la API devuelve los registros dentro de "data"
        if (isset($areas['data'])) {
            $areas = $areas['data'];
        }
        if (isset($training_centers['data'])) {
            $training_centers = $training_centers['data'];
        }
        return view('teachers.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $this->apiWrite('POST', '/teachers', $request->all());
        return redirect()->route('teachers.index');
    }

    public function edit($id)
    {
        $teacher = $this->apiGet('/teachers/' . $id);
        $areas = $this->apiGet('/areas');
        $training_centers = $this->apiGet('/trainingcenters');

        if (isset($areas['data'])) {
            $areas = $areas['data'];
        }

        if (isset($training_centers['data'])) {
            $training_centers = $training_centers['data'];
        }

        return view('teachers.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $this->apiWrite('PUT', '/teachers/' . $id, $request->all());

        return redirect()->route('teachers.index');
    }

    public function destroy($id)
    {
        $this->apiWrite('DELETE', '/teachers/' . $id);
        return redirect()->route('teachers.index');
    }
}