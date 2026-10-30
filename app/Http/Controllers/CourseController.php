<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    public function index()   
    {
        $courses = $this->apiGet('/courses');

        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $courses = $this->apiGet('/courses/' . $id);

        return view('courses.show', compact('courses'));
    }

    public function create()
    {
        $areas = $this->apiGet('/areas');
        $training_centers = $this->apiGet('/trainingcenters');

        return view('courses.create', compact('training_centers', 'areas'));
    }

    public function store(Request $request)
    {
        $this->apiWrite('POST', '/courses', $request->all());

        return redirect()->route('courses.index');
    }

    public function edit($id)
    {
        $course = $this->apiGet('/courses/' . $id);
        $training_centers = $this->apiGet('/trainingcenters');
        $areas = $this->apiGet('/areas');

        return view('courses.edit', compact('course', 'training_centers', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $this->apiWrite('PUT', '/courses/' . $id, $request->all());

        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $this->apiWrite('DELETE', '/courses/' . $id);

        return redirect()->route('courses.index');
    }
}