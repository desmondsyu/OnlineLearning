<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">Online Learning</div>
        <ul class="flex space-x-4 text-white">
            @auth
                <li><a href="" class="hover:text-gray-400">My Courses</a></li>
                <li><a href="" class="hover:text-gray-400">Explore</a></li>
                <li><a href="{{ route('logout') }}" class="hover:text-gray-400">Logout</a></li>
            @else
                <li><a href="{{ route('login') }}" class="hover:text-gray-400">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-gray-400">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>
