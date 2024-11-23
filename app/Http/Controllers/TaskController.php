<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class AnswerController extends Controller
{
    protected $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllTasks());
    }

    public function show($id)
    {
        return response()->json($this->service->getTaskById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->createTask($data), 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->updateTask($id, $data));
    }

    public function destroy($id)
    {
        $this->service->deleteTask($id);
        return response()->json(['message' => 'Task deleted successfully.'], 200);
    }
}

