<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .form-container {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 2rem; /* p-8 */
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
        }
        .form-input {
            width: 95%; /* w-full */
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
            padding: 0.5rem 1rem; /* px-4 py-2 */
            background-color: #f56565; /* bg-red-500 */
            color: #fff; /* text-white */
            border-radius: 0.5rem; /* rounded-lg */
            transition: background-color 0.2s; /* hover:bg-red-600 */
        }
        .form-button:hover {
            background-color: #e53e3e; /* bg-red-600 */
        }
        .contact-details-box {
            background-color: #2d3748; /* bg-gray-800 */
            padding: 1.5rem; /* p-6 */
            border-radius: 0.5rem; /* rounded-lg */
            margin-top: 2rem; /* mt-8 */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
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

<section class="py-20">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center">Contact Us</h2>
        <div style="line-height: 2rem">
            <form action="/contact" method="POST" class="max-w-lg mx-auto form-container space-y-8">
                @csrf
                <div>
                    <label for="name" class="block text-lg mb-2">Name</label>
                    <input type="text" id="name" name="name" class="form-input">
                </div>
                <div>
                    <label for="email" class="block text-lg mb-2">Email</label>
                    <input type="email" id="email" name="email" class="form-input">
                </div>
                <div>
                    <label for="message" class="block text-lg mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="form-input"></textarea>
                </div>
                <button type="submit" class="form-button">Send Message</button>
            </form>
        </div>
        <div class="contact-details-box text-center">
            <h3 class="text-2xl font-bold">Our Contact Details</h3>
            <p class="mt-4">Email: support@gamezone.com</p>
            <p class="mt-2">Phone: +1 234 567 890</p>
            <p class="mt-2">Address: 123 GameZone St, Gametown, GT 12345</p>
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
