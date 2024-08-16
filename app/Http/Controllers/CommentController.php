<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, $blog_id)
    {
        Comment::create([
            'blog_id' => $blog_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }
}

