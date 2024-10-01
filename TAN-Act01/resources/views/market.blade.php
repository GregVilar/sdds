<!-- resources/views/profile/market.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
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
            width: 50%; /* w-1/2 */
            padding: 0.5rem 1rem; /* px-4 py-2 */
            background-color: #f56565; /* bg-red-500 */
            color: #fff; /* text-white */
            border-radius: 0.5rem; /* rounded-lg */
            transition: background-color 0.2s; /* hover:bg-red-600 */
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
        .market-header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .market-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }
        .market-card {
            background-color: #4a5568; /* bg-gray-700 */
            padding: 1rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow */
            background-size: cover;
            background-position: center;
        }
        .market-card img {
            width: 100%;
            border-radius: 0.5rem; /* rounded-lg */
        }
        .market-card h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }
        .market-card p {
            margin-top: 0.5rem;
        }
        .add-to-cart-button {
            background-color: #f56565; /* bg-red-500 */
            color: #fff; /* text-white */
            padding: 0.5rem 1rem; /* px-4 py-2 */
            border-radius: 0.5rem; /* rounded-lg */
            text-align: center;
            display: block;
            margin-top: 0.5rem;
            width: 30%;
            transition: background-color 0.2s; /* hover:bg-red-600 */
        }
        .add-to-cart-button:hover {
            background-color: #e53e3e; /* bg-red-600 */
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
            <h1 class="market-header">Game Market</h1>
            <div class="market-grid">
                <div class="market-card" style="background-image: url('{{ asset('https://sm.ign.com/ign_nordic/review/b/black-myth/black-myth-wukong-review_xcgh.jpg') }}');">
                    <h2>Black Myth Wukong</h2>
                    <p>Price: $59.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://cdn.mos.cms.futurecdn.net/AS7VDarC5fSAGGum5qBNSU.jpg') }}');">
                    <h2>Warhammer 40,000: Space Marine 2</h2>
                    <p>Price: $59.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://blz-contentstack-images.akamaized.net/v3/assets/blt77f4425de611b362/blt6d7b0fd8453e72b9/646e720a71d9db111a265e8c/d4-open-graph_001.jpg') }}');">
                    <h2>Diablo 4</h2>
                    <p>Price: $59.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://pcoptimizedsettings.com/wp-content/uploads/2024/04/compress_GTA-V-1024x576-1.jpg') }}');">
                    <h2>GTA: 5</h2>
                    <p>Price: $59.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://m.media-amazon.com/images/M/MV5BMjQ0M2JlMjQtMTYxYS00NWRjLTk2MGEtN2I5YTQ2ZjU4MmIxXkEyXkFqcGdeQXVyMTk2OTAzNTI@._V1_FMjpg_UX1000_.jpg') }}');">
                    <h2>Detroit</h2>
                    <p>Price: $59.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIETKuDQ-D7Jkwyzf5Sib53Op0S_OzUqG-QQ&s') }}');">
                    <h2>Phasmophobia</h2>
                    <p>Price: $9.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1966720/capsule_616x353.jpg?t=1723894859') }}');">
                    <h2>Lethal Company</h2>
                    <p>Price: $9.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://image.api.playstation.com/vulcan/ap/rnd/202010/1407/2JSde8PFCF6B4nO2EECrcR1m.png') }}');">
                    <h2>Deep Rock Galactic</h2>
                    <p>Price: $15.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://image.api.playstation.com/vulcan/ap/rnd/202110/2000/phvVT0qZfcRms5qDAk0SI3CM.png') }}');">
                    <h2>Elden Ring</h2>
                    <p>Price: $59.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://static.bandainamcoent.eu/high/dark-souls/dark-souls-3/00-page-setup/ds3_game-thumbnail.jpg') }}');">
                    <h2>Dark Souls 3</h2>
                    <p>Price: $29.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://store-images.s-microsoft.com/image/apps.10088.14346211770606155.4d34dee5-ab84-4876-83bd-1e181ab60f68.f5521d64-a400-444d-8b04-bd9681be20db?q=90&w=480&h=270') }}');">
                    <h2>Jump King</h2>
                    <p>Price: $5.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
                </div>
                <div class="market-card" style="background-image: url('{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNiti2HteHq_mzLJb6W4OgQEtrPjTT2PDCpQ&s') }}');">
                    <h2>Detroit</h2>
                    <p>Price: $19.99</p>
                    <br>
                    <a href="#" class="add-to-cart-button">Add to Cart</a>
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
