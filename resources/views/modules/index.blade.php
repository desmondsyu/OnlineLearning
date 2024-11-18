@extends('layouts.app')

@section('content')
    <h1>Module List</h1>
    <a href="{{ route('module.create') }}" class="btn btn-primary">Add New Item</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ route('module.show', $item->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('module.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('module.destroy', $item->id) }}" method="POST" style="display:inline;">
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