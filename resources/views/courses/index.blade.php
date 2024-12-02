@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-4">
        @if (auth()->user()->role === 'tutor')
            <li>
                <div class="bg-white rounded-lg overflow-hidden border-dashed border-green-500 border-2 flex justify-center">
                    <a href="{{ route('courses.create') }}" class="font-bold text-xl mx-auto my-4">Create Course</a>
                </div>
            </li>
        @endif
        @if (($type ?? '') === 'explore')
            <form method="GET" action="{{ route('courses.filter') }}" class="mb-6">
                <input type="text" name="query" placeholder="Search courses..."
                    class="border rounded px-4 py-2 w-full sm:w-1/2" value="{{ request('query') }}" />
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
            </form>
        @endif

        @if (count($courses) > 0)
            @foreach ($courses as $course)
                <li>
                    <div class="bg-white rounded-lg overflow-hidden border-2 border-l-8 border-gray-300">
                        <div class="px-6 py-4 flex-row flex justify-between">
                            <div>
                                <div class="font-bold text-xl mb-2">{{ $course->title }}</div>
                                <p class="text-gray-700 text-base">{{ $course->description }}</p>
                                <p class="text-gray-700 text-base"><strong>Tutor:</strong> {{ $course->tutor->name }}</p>
                            </div>

                            <div class="content-center">
                                @if (auth()->user()->role === 'student' && Auth::user()->courses->contains($course->id))
                                    <p class="text-gray-700 text-base content-center font-bold">
                                        <span class="capitalize">
                                            {{ Auth::user()->courses->find($course->id)->pivot->status }}
                                        </span>
                                    </p>
                                    @if (Auth::user()->courses->find($course->id)->pivot->status === 'Completed')
                                        <p class=" text-base content-center font-bold underline text-green-500">
                                            <span class="capitalize">
                                                <a href="{{route('courses.certification', $course->id)}}">
                                                    Certification
                                                </a>
                                            </span>
                                        </p>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="px-6 py-2 bg-gray-100 flex justify-end items-center gap-x-3">
                            @if (auth()->user()->role === 'student')
                                @if (Auth::user()->courses->contains($course->id))
                                    <span class="text-blue-500 font-bold">Enrolled</span>
                                    <a href="{{ route('modules.index', $course->id) }}"
                                        class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-700">View</a>
                                @else
                                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">Enroll</button>
                                    </form>
                                @endif
                            @endif

                            @if (auth()->user()->role === 'tutor')
                                <a href="{{ route('modules.index', $course->id) }}"
                                    class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-700">View</a>
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-700">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
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
            <li class="text-gray-700">No courses found.</li>
        @endif
    </ul>
@endsection
