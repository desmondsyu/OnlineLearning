@extends('layouts.app')

@section('content')
    <h1>Course List</h1>
    <a href="{{ route('course.create') }}" class="btn btn-primary">Add New Item</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Tutor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->tutor}}</td>
                    <td>
                        <a href="{{ route('course.show', $item->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('course.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('course.destroy', $item->id) }}" method="POST" style="display:inline;">
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