<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleService;
use App\Services\CourseService;

class ModuleController extends Controller
{
    protected $service;
    protected $courseService;

    public function __construct(ModuleService $service, CourseService $courseService)
    {
        $this->service = $service;
        $this->courseService = $courseService;
    }

    public function index()
    {
        $modules = $this->service->getAllModules();
        return view('modules.index', compact('modules'));
    }

    public function getByCourse($course_id)
    {
        $modules = $this->service->getModuleByCourse($course_id);
        $course = $this->courseService->getCourseById($course_id);
        return view('modules.index', compact('modules', 'course'));
    }

    public function create($course_id)
    {
        return view('modules.create', compact('course_id'));
    }

    public function store(Request $request, $course_id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string'
        ]);

        $data['course_id'] = $course_id;;

        $this->service->createModule($data);

        return redirect()->route('modules.index', $course_id)->with('success', 'New module created.');
    }

    public function edit($id, $course_id)
    {
        $module = $this->service->getModuleById($id);
        return view('modules.edit', compact('module', 'course_id'));
    }

    public function update(Request $request, $id, $course_id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string'
        ]);

        $this->service->updateModule($id, $data);

        return redirect()->route('modules.index', $course_id)->with('success', 'Module information updated.');
    }

    public function destroy($id, $course_id)
    {
        $this->service->deletemodule($id);
        return redirect()->route('modules.index', $course_id)->with('success', 'Module deleted!');
    }
}
