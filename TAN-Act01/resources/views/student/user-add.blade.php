<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Blog</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .upload-form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .upload-form input,
        .upload-form textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
        }

        .upload-form button {
            padding: 10px 20px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
    <!-- Add your navigation bar here -->
</nav>

@if (session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif

<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-center">Upload Blog</h2>
    @if ($errors->any())
        <div class="red-div">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="upload-form" method="POST" action="{{ route('post.storeUser') }}">
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
                <button><a href="/users" class="bg-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded">Back</a></button>
            </div>
        </div>
        </form>
</div>

</body>
</html>
