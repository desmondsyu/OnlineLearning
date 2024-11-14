
@extends('layouts.app') <!-- Use the layout with the navigation bar -->

@section('content')
<div class="container mx-auto text-center mt-10">
    <h1 class="text-4xl font-bold mb-6">Welcome to the Updated Inventory Management System</h1>
    <p class="text-lg mb-6">Please log in or register to access the full features of the system.</p>
    <div class="flex justify-center space-x-4">
        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a>
        <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Register</a>
    </div>
</div>
@endsection
