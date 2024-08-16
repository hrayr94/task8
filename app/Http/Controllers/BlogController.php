<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::with('comments')->where('slug', $slug)->firstOrFail();
        return view('blogs.show', compact('blog'));
    }
}

