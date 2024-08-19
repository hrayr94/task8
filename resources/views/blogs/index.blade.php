@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog</h2>
                    <span>Keep up to date with the latest news</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">

        <!-- Blog Posts -->
        <div class="blog-page">
            <div class="row">
                <div class="col-md-8">

                    <!-- Loop through blog posts -->
                    @foreach ($blogs as $blog)
                        <div class="blog-post">
                            <a href="{{ route('blogs.show', $blog->id) }}" class="post-img">
                                <img src="{{ Storage::url($blog->image) }}" alt="">
                            </a>
                            <div class="post-content">
                                <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                                <ul class="post-meta">
                                    <li>{{ $blog->created_at->format('F d, Y') }}</li>
                                    <li><a href="#">{{ $blog->comments_count }} Comments</a></li>
                                </ul>
                                <p>{{ Str::limit($blog->content, 150) }}</p>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="pagination-container">
                        {{ $blogs->links() }} <!-- Add pagination links -->
                    </div>
                    <div class="clearfix"></div>

                </div>

                <!-- Sidebar with Widgets -->
                <div class="col-md-4">
                    <div class="sidebar right">
                        <!-- Search Widget -->
                        <div class="widget">
                            <h3 class="margin-top-0 margin-bottom-25">Search Blog</h3>
                            <div class="search-blog-input">
                                <form action="{{ route('blogs.search') }}" method="GET">
                                    <input class="search-field" type="text" name="query" placeholder="Type and hit enter" value="{{ request()->query('query') }}">
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- Other Widgets -->
                        <!-- Include any other widgets you have here -->

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
