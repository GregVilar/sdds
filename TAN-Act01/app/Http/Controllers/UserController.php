<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class UserController extends Controller
{

    protected $users = [
                [
                    "id" => 1,
                    "author" => "Alice Johnson",
                    "blog_title" => "The Future of AI in Software Development",
                    "blog_short_description" => "Exploring the impact of AI on the software industry and its potential to revolutionize the way we code.",
                    "date_created" => "2024-09-01"
                ],
                [
                    "id" => 2,
                    "author" => "Bob Smith",
                    "blog_title" => "Designing for the Modern Web",
                    "blog_short_description" => "A deep dive into modern web design principles and best practices for creating engaging user experiences.",
                    "date_created" => "2024-09-03"
                ],
                [
                    "id" => 3,
                    "author" => "Carol Williams",
                    "blog_title" => "Data-Driven Decisions",
                    "blog_short_description" => "An analysis of how data analytics is transforming decision-making across industries.",
                    "date_created" => "2024-09-05"
                ],
                [
                    "id" => 4,
                    "author" => "David Brown",
                    "blog_title" => "Mastering Project Management",
                    "blog_short_description" => "Tips and strategies for effectively managing complex projects and leading teams to success.",
                    "date_created" => "2024-09-07"
                ],
                [
                    "id" => 5,
                    "author" => "Eva Davis",
                    "blog_title" => "The Power of Social Media Marketing",
                    "blog_short_description" => "How social media platforms can be leveraged to build strong marketing campaigns and reach new audiences.",
                    "date_created" => "2024-09-10"
                ],
                [
                    "id" => 6,
                    "author" => "Frank Miller",
                    "blog_title" => "Financial Planning for Millennials",
                    "blog_short_description" => "A comprehensive guide to financial strategies and investments tailored for the millennial generation.",
                    "date_created" => "2024-09-12"
                ],
                [
                    "id" => 7,
                    "author" => "Grace Wilson",
                    "blog_title" => "Building Scalable Web Applications",
                    "blog_short_description" => "Best practices for developing web applications that can scale efficiently with growing user demand.",
                    "date_created" => "2024-09-14"
                ],
                [
                    "id" => 8,
                    "author" => "Hank Moore",
                    "blog_title" => "Effective Sales Strategies in a Competitive Market",
                    "blog_short_description" => "Insights into how sales teams can stay competitive and close more deals in today's fast-paced market.",
                    "date_created" => "2024-09-16"
                ],
                [
                    "id" => 9,
                    "author" => "Ivy Taylor",
                    "blog_title" => "Creating a Positive Workplace Culture",
                    "blog_short_description" => "Exploring the role of HR in fostering a positive and inclusive work environment.",
                    "date_created" => "2024-09-18"
                ],
                [
                    "id" => 10,
                    "author" => "Jack Anderson",
                    "blog_title" => "Optimizing Operations for Efficiency",
                    "blog_short_description" => "Key strategies for streamlining operations and improving organizational efficiency.",
                    "date_created" => "2024-09-20"
                ]

            ];

            public function index()
            {
                #labact 2 code
                # return view('student.user', ['users' => $this->users]);

                #labact 3 code
                #$blogs = Blog::all();


                $blogs = Blog::paginate(5);
                #$blogs = Blog::orderBy('created_at', 'asc')->paginate(10);

                return view('student.user', ['blogs' => $blogs]);
            }

            public function create()
            {
                return view('student.user-create');
            }

            #labact 2 code
            public function show($id)
            {
                $user = collect($this->users)->firstWhere('id', $id);

                if (!$user) {
                    abort(404, 'User not found');
                }

                return view('student.user-show', ['user' => $user]);
            }

            #labact 3 code
            public function showData($id)
            {

                $blog = Blog::find($id);
                if (!$blog) {
                    abort(404, 'Blog not found');
                }

                return view('student.user-show', ['blog' => $blog]);

            }

            public function add()
            {
                return view('student.user-add');
            }

            #labact 2 code
            public function edit($id)
            {
                $user = collect($this->users)->firstWhere('id', $id);

                if (!$user) {
                    abort(404, 'User not found');
                }

                return view('student.user-edit', ['user' => $user]);
            }

            #labact 3 code
            public function editBlog($id)
            {

                $blog = Blog::find($id);
                if (!$blog) {
                    abort(404, 'Blog not found');
                }

                return view('student.user-edit', ['blog' => $blog]);

            }

            #labact 2 code
            public function update(Request $request, $id)
            {
                $data = $request->validate([
                    'author' => 'required',
                    'blog_title' => 'required',
                    'blog_short_description' => 'required',
                ]);

                $user = collect($this->users)->firstWhere('id', $id);

                if (!$user) {
                    abort(404, 'User not found');
                }

                $user = array_merge($user, $data);

                $this->users = collect($this->users)
                    ->reject(function ($user) use ($id) {
                        return $user['id'] == $id;
                    })
                    ->values()
                    ->all();

                $this->users[] = $user;

                return view('student.user-show', ['user' => $user]);
            }

            #labact 3 code
            public function updateBlog(Request $request, $id)
            {

                $blog = Blog::find($id);
                if (!$blog) {
                    abort(404, 'Blog not found');
                }

                $data = $request->validate([
                    'author' => 'required',
                    'blog_title' => 'required',
                    'blog_short_description' => 'required',
                ]);

                $blog->update($data);

                session()->flash('success', 'Blog post edited successfully');


                return redirect('/users');

            }

            public function store(Request $request)
            {
                $data = $request->validate([
                    'author' => 'required',
                    'blog_title' => 'required',
                    'blog_short_description' => 'required',
                ]);

                $data['id'] = count($this->users) + 1;
                $data['date_created'] = now()->toDateString();

                $this->users[] = $data;

                return view('student.user', ['users' => $this->users]);
            }
}
