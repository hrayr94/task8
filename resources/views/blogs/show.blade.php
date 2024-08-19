@extends('layouts.app')

@section('content')

    <!-- Titlebar ================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $blog->title }}</h2>
                    <span>{{ $blog->subtitle }}</span>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('blogs.index') }}">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Content ================================================== -->
    <div class="container">
        <!-- Blog Posts -->
        <div class="blog-page">
            <div class="row">
                <!-- Post Content -->
                <div class="col-md-8">
                    <!-- Blog Post -->
                    <div class="blog-post single-post">
                        <!-- Img -->
                        <img class="post-img" src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}">

                        {{--                        <!-- Content -->--}}
                        <div class="post-content">
                            <h3>{{ $blog->title }}</h3>
                            {!! $blog->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar / End -->
        </div>
    </div>
    </div>

@endsection
