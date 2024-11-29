@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Grade Answer</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('answers.update', [$answer->id, $task_id]) }}" method="POST" class="w-full max-w-lg">
        @csrf
        <div>
            <label for="mark" class="block text-gray-700 text-sm font-bold mb-2">Grade:</label>
            <input value="{{ $answer->mark }}" type="number" name="mark"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required />
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Answer:</label>
            <textarea name="content" type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required readonly>{{ $answer->content }}</textarea>
        </div>

        <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Grade
        </button>
    @endsection
