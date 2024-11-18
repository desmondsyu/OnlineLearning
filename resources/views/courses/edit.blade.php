@extends('layouts.app')

@section('content')
    <h1>Edit Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('course.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
@endsection
