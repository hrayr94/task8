<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(2);
        return view('blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::with('comments')->where('id', $id)->firstOrFail();

        // Получить предыдущий пост
        $previous = Blog::where('id', '<', $id)->latest()->first();

        // Получить следующий пост
        $next = Blog::where('id', '>', $id)->oldest()->first();

        // Получить связанные посты (если у вас нет категории, можно удалить это условие)
        $relatedPosts = Blog::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Получить популярные посты (предполагается, что у вас есть поле views)
//        $popularPosts = Blog::orderBy('views', 'desc')->take(5)->get();

        return view('blogs.show', compact('blog', 'previous', 'next', 'relatedPosts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $blogs = Blog::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->paginate(10); // Adjust pagination as needed

        return view('blogs.index', compact('blogs'));
    }

}

