<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .form-container {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 2rem; /* p-8 */
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
        }
        .form-input {
            width: 100%; /* w-full */
            padding: 0.5rem 1rem; /* px-4 py-2 */
            border-radius: 0.5rem; /* rounded-lg */
            background-color: #4a5568; /* bg-gray-700 */
            color: #fff; /* text-white */
            outline: none; /* focus:outline-none */
            transition: box-shadow 0.2s; /* focus:ring-2 */
        }
        .form-input:focus {
            box-shadow: 0 0 0 2px #f56565; /* focus:ring-red-500 */
        }
        .form-button {
            width: 50%;
            padding: 0.5rem 1rem;
            background-color: #f56565;
            color: #fff;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }
        .form-button:hover {
            background-color: #e53e3e; /* bg-red-600 */
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        .label-spacing {
            margin-bottom: 0.5rem; /* mb-2 */
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2d3748; /* bg-gray-800 */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 0.5rem; /* rounded-lg */
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #4a5568; /* bg-gray-700 */
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dashboard-header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 1rem;
        }
        .dashboard-card {
            background-color: #4a5568; /* bg-gray-700 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
        }
        .reviews-section, .upcoming-section {
            margin-top: 2rem;
        }
        .reviews-header, .upcoming-header {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .review-card, .upcoming-card {
            background-color: #4a5568; /* bg-gray-700 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            margin-bottom: 1rem;
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
            <h1 class="dashboard-header">Gaming Dashboard</h1>
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h2 class="text-xl font-bold">Total Games Played</h2>
                    <p class="mt-2">150</p>
                </div>
                <div class="dashboard-card">
                    <h2 class="text-xl font-bold">Achievements</h2>
                    <p class="mt-2">75</p>
                </div>
                <div class="dashboard-card">
                    <h2 class="text-xl font-bold">Friends Online</h2>
                    <p class="mt-2">5</p>
                </div>
                <div class="dashboard-card">
                    <h2 class="text-xl font-bold">Recent Activity</h2>
                    <p class="mt-2">Played "Elden Ring"</p>
                </div>
                <div class="dashboard-card">
                    <h2 class="text-xl font-bold">Top Score</h2>
                    <p class="mt-2">2000</p>
                </div>
                <div class="dashboard-card">
                    <h2 class="text-xl font-bold">New Messages</h2>
                    <p class="mt-2">3</p>
                </div>
            </div>

            <div class="reviews-section">
                <h2 class="reviews-header">Recent Game Reviews</h2>
                <div class="review-card" style="background-image: url('{{ asset('https://cdn2.unrealengine.com/Diesel%2Fblog%2FBlog+Posts%2FSubnautica+Free%2FEGS_BANNER_Subnautica-1900x600-e1fb7bda98f517865a2a81e71112a0efaa4deeb4.jpg') }}');">
                    <h3 class="text-lg font-bold">Subnautica</h3>
                    <p class="mt-2">This game is amazing! The graphics are stunning and the gameplay is smooth.</p>
                </div>
                <div class="review-card" style="background-image: url('{{ asset('https://i.redd.it/9ra7xiz1le331.jpg') }}');">
                    <h3 class="text-lg font-bold">Halo: The Master Chief Collection</h3>
                    <p class="mt-2">A great game with an engaging storyline and challenging levels.</p>
                </div>
            </div>

            <div class="upcoming-section">
                <h2 class="upcoming-header">Upcoming Game Releases</h2>
                <div class="upcoming-card" style="background-image: url('{{ asset('https://imgs.callofduty.com/content/dam/atvi/callofduty/cod-touchui/blackops6/meta/BO6_LP-meta_image.jpg') }}');">
                    <h3 class="text-lg font-bold">Call of Duty: Black Ops 6</h3>
                    <p class="mt-2">Release Date: 2025-12-01</p>
                </div>
                <div class="upcoming-card" style="background-image: url('{{ asset('https://img.youtube.com/vi/5Jav89xPu8c/maxresdefault.jpg') }}');">
                    <h3 class="text-lg font-bold">Dragon's Dogma 2</h3>
                    <p class="mt-2">Release Date: 2025-04-15</p>
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
