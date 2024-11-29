<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\ModuleService;

class TaskController extends Controller
{
    protected $service;
    protected $moduleService;

    public function __construct(TaskService $service, ModuleService $moduleService)
    {
        $this->service = $service;
        $this->moduleService = $moduleService;
    }

    public function index()
    {
        $tasks = $this->service->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function getByModule($module_id)
    {
        $tasks = $this->service->getTaskByModule($module_id);
        $module = $this->moduleService->getModuleById($module_id);
        return view('tasks.index', compact('tasks', 'module'));
    }

    public function create($module_id)
    {
        return view('tasks.create', compact('module_id'));
    }

    public function store(Request $request, $module_id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_grade' => 'required|numeric|min:0',
        ]);

        $data['module_id'] = $module_id;

        $this->service->createTask($data);

        return redirect()->route('tasks.index', $module_id)->with('success', 'New task created.');
    }

    public function edit($id, $module_id)
    {
        $task = $this->service->getTaskById($id);
        return view('tasks.edit', compact('task', 'module_id'));
    }

    public function update(Request $request, $id, $module_id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_grade' => 'required|numeric|min:0',
        ]);
        $this->service->updateTask($id, $data);
        return redirect()->route('tasks.index', $module_id)->with('success', 'Task information updated.');
    }

    public function destroy($id, $module_id)
    {
        $this->service->deleteTask($id);
        return redirect()->route('tasks.index', $module_id)->with('success', 'Task deleted!');
    }
}
