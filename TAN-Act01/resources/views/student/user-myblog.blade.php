<!-- resources/views/student/user-myblog.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Blogs</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .blog-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            padding: 2rem;
        }
        .blog-card {
            background-color: #4a5568; /* bg-gray-700 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            color: #fff; /* text-white */
        }
        .blog-card h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .blog-card p {
            margin-bottom: 0.5rem;
        }
        .blog-card .author, .blog-card .date {
            font-size: 0.875rem;
            color: #a0aec0; /* text-gray-400 */
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
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
@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif
<div class="container mx-auto">
    <h1 class="text-3xl font-bold text-center my-8">User Blogs</h1>
    <div class="blog-container">
        @foreach ($blogs as $blog)
            <div class="blog-card">
                <h2>{{ $blog->blog_title }}</h2>
                <p>{{ $blog->blog_short_description }}</p>
                <p class="author">By: {{ $blog->author }}</p>
                <p class="date">Created on: {{ $blog->date_created }}</p>
                <button class="btn btn-primary"> <a href="{{ route('showdata', ['id' => $blog['id']]) }}">Show</a> </button>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
