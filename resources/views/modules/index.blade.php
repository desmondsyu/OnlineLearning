@extends('layouts.app')

@section('content')
    <div class="mb-6 border-b-4 border-gray-500">
        <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
        <h2 class="text-lg mb-2">{{ $course->description }}</h2>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-4">
        @if (auth()->user()->role === 'tutor')
            <li>
                <div class="bg-white overflow-hidden border-dashed border-gray-500 border-2 flex justify-center">
                    <a href="{{ route('modules.create', $course->id) }}" class="font-bold text-xl mx-auto my-2">Create
                        Module</a>
                </div>
            </li>
        @endif

        @if (count($modules) > 0)
            @foreach ($modules as $module)
                <li>
                    <div class="bg-white overflow-hidden border-2 border-gray-300">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $module->title }}</div>
                            <p class="text-gray-700 text-base">{{ $module->description }}</p>
                        </div>
                        <div class="px-6 py-2 bg-gray-100 flex justify-end items-center gap-x-3">
                            <a href="{{ route('tasks.index', $module->id) }}"
                                class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-700">View</a>

                            @if (auth()->user()->role === 'tutor')
                                <a href="{{ route('modules.edit', [$module->id, $course->id]) }}"
                                    class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-700">Edit</a>
                                <form action="{{ route('modules.destroy', [$module->id, $course->id]) }}" method="POST"
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
            <li class="text-gray-700">No modules available.</li>
        @endif
    </ul>
@endsection
