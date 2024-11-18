@extends('layouts.app')

@section('content')
    <h1>Add New Task</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="task_title">Task Title:</label>
            <input type="text" name="task_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="task_content">Content:</label>
            <input type="text" name="task_content" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Item</button>
    </form>
@endsection