<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnswerService;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    protected $service;
    protected $taskService;

    public function __construct(AnswerService $service, TaskService $taskService)
    {
        $this->service = $service;
        $this->taskService = $taskService;
    }

    public function index()
    {
        return response()->json($this->service->getAllAnswers());
    }

    public function getByTask($course_id, $module_id, $task_id)
    {
        $answers = $this->service->getAnswerByTask($task_id);
        $task = $this->taskService->getTaskById($task_id);
        return view('answers.index', compact('answers', 'task', 'module_id', 'course_id'));
    }

    public function create($course_id, $module_id, $task_id)
    {
        return view('answers.create', compact('task_id', 'module_id', 'course_id'));
    }

    public function store(Request $request, $course_id, $module_id, $task_id)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $data['mark'] = 0;
        $data['task_id'] = $task_id;
        $data['student_id'] = Auth::id();

        $this->service->createAnswer($data);

        return redirect()->route('answers.index',[$course_id, $module_id, $task_id])->with('success', 'Attempt submitted.');
    }

    public function edit($course_id, $module_id, $task_id, $id)
    {
        $answer = $this->service->getAnswerById($id);
        return view('answers.edit', compact('answer', 'task_id', 'module_id', 'course_id'));
    }

    public function update(Request $request, $course_id, $module_id, $task_id, $id)
    {
        $data = $request->validate([
            'mark' => 'required|numeric|min:0',
            'content' => 'required|string',
        ]);

        $this->service->updateAnswer($id, $data);

        return redirect()->route('answers.index', [$course_id, $module_id, $task_id, $id])->with('success', 'Marked');
    }

    public function destroy($course_id, $module_id, $task_id, $id)
    {
        $this->service->deleteAnswer($id);
        return redirect()->route('answers.index', [$course_id, $module_id, $task_id, $id])->with('success', 'Answer deleted');
    }
}
