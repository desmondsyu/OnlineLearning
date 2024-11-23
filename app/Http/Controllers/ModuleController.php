<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModuleService;

class AnswerController extends Controller
{
    protected $service;

    public function __construct(ModuleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllModules());
    }

    public function show($id)
    {
        return response()->json($this->service->getModuleById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->createModule($data), 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->updateModule($id, $data));
    }

    public function destroy($id)
    {
        $this->service->deleteModule($id);
        return response()->json(['message' => 'Module deleted successfully.'], 200);
    }
}

