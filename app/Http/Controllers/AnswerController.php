<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnswerService;

class AnswerController extends Controller
{
    protected $service;

    public function __construct(AnswerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllAnswers());
    }

    public function show($id)
    {
        return response()->json($this->service->getAnswerById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->createAnswer($data), 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json($this->service->updateAnswer($id, $data));
    }

    public function destroy($id)
    {
        $this->service->deleteAnswer($id);
        return response()->json(['message' => 'Answer deleted successfully.'], 200);
    }
}
