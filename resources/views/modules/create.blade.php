@extends('layouts.app')

@section('content')
    <h1>Add New Module</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('module.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="module_title">Module Title:</label>
            <input type="text" name="module_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="module_content">Content:</label>
            <input type="text" name="module_content" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Item</button>
    </form>
@endsection