<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .edit-form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .edit-form input,
        .edit-form textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
        }

        .edit-form button {
            padding: 10px 20px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
</nav>

<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-center">Edit Blog</h2>
    <form class="edit-form" action="{{route('updatedata', ['id'=> $blog['id']])}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="author" value="{{$blog['author']}}" placeholder="Author">
        <input type="text" name="blog_title" value="{{$blog['blog_title']}}" placeholder="Blog Title">
        <textarea name="blog_short_description" placeholder="Short Description">{{$blog['blog_short_description']}}</textarea>
        <button type="submit">Update User</button>
        <button><a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded">Back</a></button>
    </form>
</div>

</body>
</html>
