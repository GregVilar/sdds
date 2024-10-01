<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .details-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
<nav class="bg-gray-800 p-4">
</nav>

<div class="container mx-auto">
    <h2 class="text-3xl font-bold text-center">User Details</h2>
    <table class="mt-10 text-center w-full details-table">
        <tr>
            <th>Author</th>
            <td>{{$blog['author']}}</td>
        </tr>
        <tr>
            <th>Blog Title</th>
            <td>{{$blog['blog_title']}}</td>
        </tr>
        <tr>
            <th>Short Description</th>
            <td>{{$blog['blog_short_description']}}</td>
        </tr>
        <tr>
            <th>Date Created</th>
            <td>{{$blog['date_created']}}</td>
        </tr>
    </table>
    <br>
    <button><a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Back</a></button>
</div>


</body>
</html>
