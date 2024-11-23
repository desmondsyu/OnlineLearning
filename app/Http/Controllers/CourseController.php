<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CourseService;

class AnswerController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllCourses());
    }

    public function show($id)
    {
        return response()->json($this->service->getCourseById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->createCourse($data), 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->updateCourse($id, $data));
    }

    public function destroy($id)
    {
        $this->service->deleteCourse($id);
        return response()->json(['message' => 'Course deleted successfully.'], 200);
    }
}
