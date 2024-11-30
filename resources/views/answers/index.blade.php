@extends('layouts.app')

@section('content')
    <div class="mb-6 border-b-4 border-gray-500">
        <h1 class="text-3xl font-bold mb-4">{{ $task->title }}</h1>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-4 mx-28">
        @if (count($answers) > 0)
            @foreach ($answers as $answer)
                <li>
                    <div class="bg-white overflow-hidden border-2 border-gray-300">
                        <div class="px-6 py-2 justify-between">
                            <div class="font-bold text-xl">{{ $answer->student->name }}</div>
                            <div class="font-bold text-xl">{{ $answer->mark }} / {{ $task->total_grade }}</div>
                        </div>
                        <div class="px-6 py-1 bg-gray-100 flex justify-end items-center gap-x-3">
                            @if (auth()->user()->role === 'tutor')
                                <a href="{{ route('answers.edit', [$answer->id, $task->id]) }}"
                                    class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">Grade</a>
                            @endif
                            @if (auth()->user()->role === 'student')
                                <a href="{{ route('answers.edit', [$answer->id, $task->id]) }}"
                                    class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-700">View</a>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li class="text-gray-700">No answers available.</li>
        @endif
    </ul>
@endsection
