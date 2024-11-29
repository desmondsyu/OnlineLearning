<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $courses = $this->service->getAllCourses();
        return view('courses.index', compact('courses'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query', '');
        $courses = $this->service->searchCoursesByName($query);
        return view('courses.index', compact('courses'));
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['tutor_id'] = Auth::id();

        $this->service->createCourse($data);
        return redirect()->route('courses.index')->with('success', 'New course created.');
    }

    public function edit($id){
        $course = $this->service->getCourseById($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->service->updateCourse($id, $data);

        return redirect()->route('courses.index')->with('success', 'Course information updated.');
    }

    public function destroy($id)
    {
        $this->service->deleteCourse($id);
        return redirect()->route('courses.index')->with('success', 'Course deleted!');
    }
}
