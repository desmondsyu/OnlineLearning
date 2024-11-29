<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Online Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-xl">Online Learning</div>
            <ul class="flex space-x-4">
                @auth
                    <li><a href="{{ route('courses.index') }}" class="hover:text-gray-400 text-white">My Courses</a></li>
                    <li><a href="{{ route('courses.index') }}" class="hover:text-gray-400 text-white">Explore</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="hover:underline text-white">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:text-gray-400 text-white">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-gray-400 text-white">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="container mx-auto mt-4">
        @yield('content')
    </main>
</body>

</html>
