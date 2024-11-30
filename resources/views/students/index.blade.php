@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-4">Manage Students for "{{ $course->title }}"</h1>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($students->count() > 0)
        <table class="min-w-full bg-white border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Student Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 capitalize">{{ $student->pivot->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('courses.activity', [$course->id, $student->id]) }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-3 rounded focus:outline-none focus:shadow-outline">
                                Activity
                            </a>
                            @if ($student->pivot->status !== 'Completed')
                                <a href="{{ route('courses.complete', [$course->id, $student->id]) }}"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Mark as Completed
                                </a>
                            @else
                                <span class="text-green-500 font-bold">Completed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-700">No students enrolled in this course.</p>
    @endif
@endsection
