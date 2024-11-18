@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('task.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="task_title">Task Title:</label>
            <input type="text" name="task_title" class="form-control" value="{{$item->title}}" required>
        </div>
        <div class="form-group">
            <label for="task_content">Content:</label>
            <input type="text" name="task_content" class="form-control" value="{{$item->content}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
@endsection
