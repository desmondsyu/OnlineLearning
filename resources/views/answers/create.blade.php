@extends('layouts.app')

@section('content')
    <h1>Add New Answer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('answer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="answer_content">Answer:</label>
            <textarea name="answer_content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="answer_grade">Grade:</label>
            <input type="number" name="answer_grade" class="form-control" step="0.01">
        </div>
        <button type="submit" class="btn btn-success">Submit Answer</button>
    </form>
@endsection
