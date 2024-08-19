<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $blog->id,
            'user_id' => auth()->user()->id ?? null,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
