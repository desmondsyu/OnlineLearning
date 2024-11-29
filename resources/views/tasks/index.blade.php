@extends('layouts.app')

@section('content')
    <div class="mb-6 border-b-4 border-gray-500">
        <h1 class="text-3xl font-bold mb-4">{{ $module->title }}</h1>
        <h2 class="text-xl">{{ $module->description }}</h2>
    </div>
    <div class="mx-28 pb-10 mb-10 content-center border-b-2 border-gray-500">
        <p>{{ $module->content }}</p>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-4 mx-28">
        @if (auth()->user()->role === 'tutor')
            <li>
                <div class="bg-white overflow-hidden border-dashed border-gray-500 border-2 flex justify-center">
                    <a href="{{ route('tasks.create', $module->id) }}" class="font-bold text-xl mx-auto my-2">Create Task</a>
                </div>
            </li>
        @endif

        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <li>
                    <div class="bg-white overflow-hidden border-2 border-gray-300">
                        <div class="px-6 py-2">
                            <div class="font-bold text-xl">{{ $task->title }}</div>
                        </div>
                        <div class="px-6 py-1 bg-gray-100 flex justify-end items-center gap-x-3">
                            {{-- @if (auth()->user()->role === 'student') --}}
                            <a href="{{ route('answers.create', $task->id) }}"
                                class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-700">Attempt</a>
                            {{-- @endif --}}

                            @if (auth()->user()->role === 'tutor')
                                <a href="{{ route('answers.index', $task->id) }}"
                                    class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">Grading</a>
                                <a href="{{ route('tasks.edit', [$task->id, $module->id]) }}"
                                    class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-700">Edit</a>
                                <form action="{{ route('tasks.destroy', [$task->id, $module->id]) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-700">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li class="text-gray-700">No tasks available.</li>
        @endif
    </ul>
@endsection
