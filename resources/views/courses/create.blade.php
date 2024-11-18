@extends('layouts.app')

@section('content')
    <h1>Add New Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Item</button>
    </form>
@endsection
