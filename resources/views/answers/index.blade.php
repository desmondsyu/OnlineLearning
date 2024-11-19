@extends('layouts.app')

@section('content')
    <h1>Answer List</h1>
    <a href="{{ route('answer.create') }}" class="btn btn-primary">Add New Answer</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Content</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
                <tr>
                    <td>{{ Str::limit($answer->content, 50) }}</td>
                    <td>{{ $answer->grade ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('answer.show', $answer->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('answer.edit', $answer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('answer.destroy', $answer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
