@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('tasks.edit', $module_id, $task->id, $course_id) }}
    <h1 class="text-3xl font-bold mb-4">Edit Task Information</h1>

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

    <form action="{{ route('tasks.update', ['course_id' => $course_id, 'module_id' => $module_id, 'id' => $task->id]) }}"
        method="POST" class="w-full max-w-lg">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Task Name:</label>
            <input value="{{ $task->title }}" type="text" name="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required />
        </div>

        <div class="mb-4">
            <label for="total_grade" class="block text-gray-700 text-sm font-bold mb-2">Total Grade:</label>
            <input name="total_grade" type="number" value="{{ $task->total_grade }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Task Description:</label>
            <textarea type="text" name="description"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>{{ $task->description }}</textarea>
        </div>

        <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save
        </button>
    </form>
@endsection
