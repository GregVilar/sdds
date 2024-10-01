<!-- resources/views/library.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Game Library</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .library-header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .library-content {
            background-color: #4a5568; /* bg-gray-700 */
            padding: 2rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
        }
        .profile-section {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
        }
        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%; /* rounded-full */
            margin-right: 1rem;
        }
        .profile-section h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .profile-section p {
            margin-top: 0.5rem;
        }
        .about-me-section {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
        }
        .about-me-section .about-me {
            flex: 1;
        }
        .about-me-section .friends-list {
            flex: 1;
            background-color: #4a5568; /* bg-gray-700 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
        }
        .about-me-section .friends-list h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .about-me-section .friends-list ul {
            list-style: none;
            padding: 0;
        }
        .about-me-section .friends-list ul li {
            margin-bottom: 0.5rem;
        }
        .placeholder-section {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            margin-bottom: 2rem;
            text-align: center;
            color: #a0aec0; /* text-gray-400 */
        }
        .library-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .library-card {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
        }
        .library-card img {
            width: 100px;
            height: 100px;
            border-radius: 0.5rem; /* rounded-lg */
            margin-right: 1rem;
        }
        .library-card h2 {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .library-card p {
            margin-top: 0.5rem;
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

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="profile-section">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                <div>
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="about-me-section">
                <div class="about-me">
                    <h2>About Me</h2>
                    <p>{{ Auth::user()->about_me }}</p>
                    <p>CSGO Player Since 2011</p>
                    <p>Vega Hater</p>
                </div>
                <div class="friends-list">
                    <h2>Friends List</h2>
                    <ul>
                        <li>Friend 1</li>
                        <li>Friend 2</li>
                        <li>Friend 3</li>
                        <!-- Add more friends as needed -->
                    </ul>
                </div>
            </div>
            <div class="placeholder-section">
                <p>Placeholder for additional content</p>
            </div>
            <h1 class="library-header">User Game Library</h1>
            <div class="library-content">
                <div class="library-list">
                    <div class="library-card" style="background-image: url('{{ asset('https://i.ytimg.com/vi/DvEaa604nPA/maxresdefault.jpg') }}');">
                        <div>
                            <h2>Elden Ring</h2>
                            <p>Played: 20 hours</p>
                        </div>
                    </div>
                    <div class="library-card" style="background-image: url('{{ asset('https://i.redd.it/uql3e79n3wqb1.png') }}');">
                        <div>
                            <h2>Counter Strike: Global Offensive</h2>
                            <p>Played: 15 hours</p>
                        </div>
                    </div>
                    <div class="library-card" style="background-image: url('{{ asset('https://picfiles.alphacoders.com/230/230558.jpg') }}');">
                        <div>
                            <h2>Apex Legends</h2>
                            <p>Played: 30 hours</p>
                        </div>
                    </div>
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
