@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-4">Activity for "{{ $course->title }}"</h1>
        <h2 class="text-xl">Student: {{ $student->name }} ({{ $student->email }})</h2>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($course->modules->count() > 0)
        <table class="min-w-full bg-white border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Module</th>
                    <th class="border border-gray-300 px-4 py-2">Task</th>
                    <th class="border border-gray-300 px-4 py-2">Student Answer</th>
                    <th class="border border-gray-300 px-4 py-2">Grade</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->modules as $module)
                    @foreach ($module->tasks as $task)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $module->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $task->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @php
                                    $answer = $task->answers->last();
                                @endphp
                                @if ($answer)
                                    <a href="{{ route('answers.edit', [$task->id, $answer->id]) }}"
                                        class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">
                                        View Submission
                                    </a>
                                @else
                                    <span class="text-red-500 font-bold">Not Submitted</span>
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($answer)
                                    <span class="font-bold">{{ $answer->mark }}</span>
                                @else
                                    <span class="font-bold">-</span>
                                @endif
                                / {{ $task->total_grade }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($answer)
                                    <span class="text-green-500 font-bold">Submitted</span>
                                @else
                                    <span class="text-red-500 font-bold">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-700">No modules or tasks found for this course.</p>
    @endif
@endsection
