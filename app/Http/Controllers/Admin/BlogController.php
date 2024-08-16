<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function store(Request $request)
    {

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $request->file('image')->store('images', 'public');
        $blog->save();


        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully!');
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete('public/blog_images/' . $blog->image);
            }

            $blog->image = $request->file('image')->store('public/blog_images');
        }

        $blog->title = $request->input('title', $blog->title);
        $blog->description = $request->input('description', $blog->description);

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
