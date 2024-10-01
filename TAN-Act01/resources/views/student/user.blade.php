<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Section</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif

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

    <h2 class="text-3xl font-bold text-center">Blogs</h2>

<div class="container mx-auto">
    <table class="mt-10 text-center w-full">
    @if ($blogs->count() && count($blogs) == 0)
                    <tr>
                        <td colspan="6" class="text-center">No blogs found</td>
                    </tr>
        @else
        <thead class="bg-gray-800">
            <tr>
                <th class="px-4 py-2">Author</th>
                <th class="px-4 py-2">Blog Title</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Short Description</th>
                <th class="px-4 py-2">Date Created</th>
                <th class="px-4 py-2">View Details</th>
                @if (Auth::user() && Auth::user()->role == 'admin')
                <th class="px-4 py-2">
                    <a class="text-white">Edit Blog</a></th>
                @endif
                @if (Auth::user() && Auth::user()->role == 'admin')
                <th class="px-4 py-2"><a class="text-white">Delete Blog</a></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr class="bg-gray-700">
                <td class="border px-4 py-2">{{$blog['author']}}</td>
                <td class="border px-4 py-2">{{$blog['blog_title']}}</td>
                <td class="border px-4 py-2">{{$blog['userid']}}</td>
                <td class="border px-4 py-2">{{$blog['blog_short_description']}}</td>
                <td class="border px-4 py-2">{{$blog['date_created']}}</td>
                <td> <button class="btn btn-primary"> <a href="{{ route('showdata', ['id' => $blog['id']]) }}">Show</a> </button> </td>
                @if (Auth::user() && Auth::user()->role == 'admin')
                <th><button class="btn btn-primary" style="background: #4CAF50"> <a href="{{ route('editdata', ['id' => $blog['id']]) }}">Edit</a> </button>
                    @endif
                </th>
                @if (Auth::user() && Auth::user()->role == 'admin')
                <th>
                   <form method="POST" action="{{ route('deletedata', ['id' => $blog['id']]) }}">
                   @csrf
                   @method('DELETE')
                   <button class="btn btn-danger" style="background: #dc3939" type="submit">Delete</button>
                   </form>
                </th>
                @endif
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    <div>
        {{ $blogs->links('vendor.pagination.default') }}
    </div>

<div class="container mt-5">
    <div class="forms">
    @if ($errors->any())
        <div class="red-div">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (isset($alert))
            <script>
                alert('{{ $alert }}');
            </script>
    @endif
        <div class="card-body">
            <h1 class="text-3xl font-bold text-center">Add Blog</h1>
            <form method="POST" action="{{ route('post.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label font-weight-bold">Author:</label>
                    <div class="col-sm-10">
                        <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}"></input>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="blog_title" class="col-sm-2 col-form-label font-weight-bold">Blog Title:</label>
                    <div class="col-sm-10">
                        <input type="text" id="blog_title" name="blog_title" class="form-control" value="{{old('blog_title')}}"></input>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="blog_short_description" class="col-sm-2 col-form-label font-weight-bold">Short Description:</label>
                    <div class="col-sm-10">
                        <textarea id="blog_short_description" name="blog_short_description" class="form-control">{{ old('blog_short_description') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</body>
</html>
