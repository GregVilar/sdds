<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $blogs = $user->blogs;

        return view('student.user-myblog', compact('blogs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                 'author' => 'required|min:5|max:10',
                 'blog_title' => 'required|min:10',
                 'blog_short_description' => 'required|min:5|max:1000',
        ]);

        $validatedData['date_created'] = Carbon::now();
        $validatedData['userid'] = Auth::user()->email;

        /*return response()->json([
            'message' => 'Blog post created successfully',
            'blog' => $blog
        ], 201);*/

        $blog = Blog::create($validatedData);

        session()->flash('success', 'Blog post created successfully');

        return redirect('/users');
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
                 'author' => 'required|min:5',
                 'blog_title' => 'required|min:10',
                 'blog_short_description' => 'required|min:5',
        ]);

        $validatedData['date_created'] = Carbon::now();
        $validatedData['userid'] = Auth::user()->email;

        /*return response()->json([
            'message' => 'Blog post created successfully',
            'blog' => $blog
        ], 201);*/

        $blog = Blog::create($validatedData);

        session()->flash('success', 'Blog post created successfully');

        return redirect('/myblog');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        session()->flash('success', 'Blog post deleted successfully');

        return redirect('/users');
    }
}
