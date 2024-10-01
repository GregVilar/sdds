<!-- resources/views/tutorial.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Tutorial</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .tutorial-header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .tutorial-content {
            background-color: #4a5568; /* bg-gray-700 */
            padding: 2rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
        }
        .video-section {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .video-container {
            border-radius: 0.5rem; /* rounded-lg */
            overflow: hidden;
        }
        .video-container iframe {
            width: 100%;
            height: 315px;
        }
    </style>
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
                </div>
            </div>
            <a href="/about" class="hover:text-gray-400">About</a>
            <a href="/contact" class="hover:text-gray-400">Contact</a>
            @if (Route::has('login'))
                @auth
                    <a href="/market" class="hover:text-gray-400">Market</a>
                    <a href="{{ url('/dashboard') }}" class="hover:text-gray-400">Dashboard</a>
                    <div class="dropdown">
                        <a class="hover:text-gray-400">{{ Auth::user()->name }}</a>
                        <div class="dropdown-content">
                            <a href="{{ route('profile.show') }}">Profile</a>
                            <a href="/library">Library</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
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

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="tutorial-header">Game Tutorial</h1>
            <div class="tutorial-content">
                <p>Welcome to the game tutorial. Here you will find all the information you need to get started with our games.</p>
                <!-- Add more tutorial content as needed -->
            </div>
            <h2 class="tutorial-header">Gameplay Videos</h2>
            <div class="video-section">
                <div class="video-container">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/K-T-kPvlZt0" title="Elden Ring PS5 Gameplay [4K 60FPS]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-container">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/bz4MuYw8FBA" title="Phasmophobia 👻 4K/60fps 👻  Gameplay No Commentary" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-container">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/QE9NhN3nnZ0" title="(PS5) Blair Witch - THIS GAME Is SCARY | ULTRA Realistic Gameplay [4K 60FPS HDR]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-container">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/sWGtYvO7iyw" title="World War Z (PS5) Zombies Invasion New York Gameplay [4K HDR] Play Station 5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-container">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/aApSteSbeGA" title="inZOI - Exclusive Gameplay Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-container">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/SzHfZYClTwo" title="BODYCAM: The Most Ultra-Realistic Game I&#39;ve Ever Played.." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

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
