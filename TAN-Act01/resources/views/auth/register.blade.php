<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    </style>
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">GameZone</a>
        <div class="flex space-x-4">
            <a href="/" class="hover:text-gray-400">Home</a>
            <a href="/games" class="hover:text-gray-400">Games</a>
            <a href="/about" class="hover:text-gray-400">About</a>
            <a href="/contact" class="hover:text-gray-400">Contact</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="hover:text-gray-400">Dashboard</a>
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
        <h2 class="text-3xl font-bold text-center">Register</h2>
        <div style="line-height: 2rem">
            <form method="POST" action="{{ route('register') }}" class="max-w-lg mx-auto form-container space-y-8">
                @csrf
                <div>
                    <label for="name" class="block text-lg mb-2 label-spacing">Name</label>
                    <input type="text" id="name" name="name" class="form-input" :value="old('name')" required autofocus autocomplete="name">
                </div>
                <div>
                    <label for="email" class="block text-lg mb-2 label-spacing">Email</label>
                    <input type="email" id="email" name="email" class="form-input" :value="old('email')" required autocomplete="username">
                </div>
                <div>
                    <label for="password" class="block text-lg mb-2 label-spacing">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required autocomplete="new-password">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-lg mb-2 label-spacing">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required autocomplete="new-password">
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <label for="terms" class="flex items-center">
                            <input type="checkbox" id="terms" name="terms" class="form-checkbox" required>
                            <span class="ml-2 text-sm text-gray-600">I agree to the <a target="_blank" href="{{ route('terms.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" href="{{ route('policy.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a></span>
                        </label>
                    </div>
                @endif
                <div class="button-container mt-4">
                    <button type="submit" class="form-button">Register</button>
                </div>
                <div class="button-container mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        Already registered?
                    </a>
                </div>
            </form>
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
