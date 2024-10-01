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

<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-center">Upload Blog</h2>
    <form class="upload-form" action="/blogs" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="author" placeholder="Author">
        <input type="text" name="blog_title" placeholder="Blog Title">
        <textarea name="blog_short_description" placeholder="Short Description"></textarea>
        <input type="file" name="blog_image">
        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>
