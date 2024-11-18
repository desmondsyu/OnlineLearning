@extends('layouts.app')

@section('content')
    <h1>Edit Answer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('answer.update', $answer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="answer_content">Content:</label>
            <textarea name="answer_content" class="form-control" rows="5" required>{{ $answer->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="answer_grade">Grade :</label>
            <input type="number" name="answer_grade" class="form-control" step="0.01" value="{{ $answer->grade }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Answer</button>
    </form>
@endsection
