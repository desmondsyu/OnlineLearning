@extends('layouts.app')

@section('content')
    <h1>Course List</h1>
    <a href="{{ route('course.create') }}" class="btn btn-primary">Add New Item</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if()
        <div>
            <a href="">Create Course</a>
        <div>
    @endif

    <ul class="space-y-4">
        @foreach ($items as $item)
            <li>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $item->name }}</div>
                        <p class="text-gray-700 text-base">{{ $item->description }}</p>
                        <p class="text-gray-700 text-base"><strong>Tutor:</strong> {{ $item->tutor }}</p>
                    </div>
                    <div class="px-6 py-4 bg-gray-100 flex justify-between items-center">
                        <a href="{{ route('course.show', $item->id) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Join</a>
                            <a href="{{ route('course.show', $item->id) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
                        <a href="{{ route('course.edit', $item->id) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit</a>
                        <form action="{{ route('course.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
