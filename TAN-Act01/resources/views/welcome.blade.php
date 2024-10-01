<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Welcome Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">GameZone</a>
        <div class="flex space-x-4">
            <a href="/" class="hover:text-gray-400">Home</a>
            <div class="dropdown">
                <a class="hover:text-gray-400">Explore</a>
                <div class="dropdown-content">
                    <a href="/games" class="hover:text-gray-400">Games</a>
                    <a href="/tutorial" class="hover:text-gray-400">Gameplay</a>
                    <a href="/about" class="hover:text-gray-400">About</a>
                    <a href="/contact" class="hover:text-gray-400">Contact</a>
                </div>
            </div>

            <div class="dropdown">
                <a class="hover:text-gray-400">Blogs</a>
                <div class="dropdown-content">
                @if (Auth::user() && Auth::user()->role == 'admin')
                <a href="/users" class="hover:text-gray-400">Blogs</a>
                @endif
                <a href="/myblog" class="hover:text-gray-400">My Blogs</a>
                <a href="/users-add" class="hover:text-gray-400">Create Blog</a>
                </div>
            </div>

            @if (Route::has('login'))
                @auth
                    <a href="/market" class="hover:text-gray-400">Market</a>
                    <a href="{{ url('/dashboard') }}" class="hover:text-gray-400">Overview</a>
                    <div class="dropdown">
                        <a class="hover:text-gray-400">{{ Auth::user()->name }}</a>
                        <div class="dropdown-content">
                            <a href="{{ url('/user/profile') }}">Profile</a>
                            <a href="/library">Library</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gray-400">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-gray-400">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>

<header class="bg-gray-700 py-20">
    <div class="bg-gray-800 p-6 rounded-lg bg-cover bg-center hover:bg-gray-700" style="background-image: url('{{ asset('bg.jpg') }}');">
        <h1 class="text-5xl font-bold">Welcome to GameZone</h1>
        <p class="mt-4 text-xl">Your ultimate destination for the best games</p>
        <a href="/games">Explore Games</a>
    </div>
</header>

<section class="py-20">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center">Popular Games</h2>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Example game cards -->
            <div class="card bg-gray-800 p-6 rounded-lg bg-cover bg-center" style="background-image: url('{{ asset('bmw.jpg') }}');">
                {{-- <h3 class="text-xl font-bold">.</h3> --}}
                {{-- <p class="mt-2">Brief description of the game.</p> --}}
            </div>
            <div class="card bg-gray-800 p-6 rounded-lg bg-cover bg-center" style="background-image: url('{{ asset('er.jpg') }}');">
                {{-- <h3 class="text-xl font-bold">Elden Ring</h3> --}}
                {{-- <p class="mt-2">Brief description of the game.</p> --}}
            </div>
            <div class="card bg-gray-800 p-6 rounded-lg bg-cover bg-center" style="background-image: url('{{ asset('ffr.jpg') }}');">
                <h3 class="text-xl font-bold">.</h3>
                <p class="mt-2">.</p>
            </div>
        </div>
    </div>
</section>

<footer class="bg-gray-800 py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2023 GameZone. All rights reserved.</p>
        <div class="mt-4 flex justify-center space-x-4">
            <a href="#" class="hover:text-gray-400">Facebook</a>
            <a href="#" class="hover:text-gray-400">Twitter</a>
            <a href="#" class="hover:text-gray-400">Instagram</a>
        </div>
    </div>
</footer>
</body>
</html>
