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

                        <!-- Content -->
                        <div class="post-content">
                            <h3>{{ $blog->title }}</h3>
                            <ul class="post-meta">
                                <li>{{ $blog->created_at->format('F j, Y') }}</li>
                                <li><a href="#comments">{{ $blog->comments->count() }} Comments</a></li>
                            </ul>

                            {!! $blog->content !!}

                            <!-- Share Buttons -->
                            <ul class="share-buttons margin-top-40 margin-bottom-0">
                                <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                                <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                                <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- Blog Post / End -->

                    <!-- Post Navigation -->
                    <ul id="posts-nav" class="margin-top-0 margin-bottom-40">
                        @if($previous)
                            <li class="prev-post">
                                <a href="{{ route('blogs.show', $previous->id) }}">
                                    <span>Previous Post</span>{{ $previous->title }}
                                </a>
                            </li>
                        @endif
                        @if($next)
                            <li class="next-post">
                                <a href="{{ route('blogs.show', $next->id) }}">
                                    <span>Next Post</span>{{ $next->title }}
                                </a>
                            </li>
                        @endif
                    </ul>

                    <!-- About Author -->
                    <div class="about-author">
                        <img src="{{ Storage::url($blog->author->avatar) }}" alt="{{ $blog->author->name }}">
                        <div class="about-description">
                            <h4>{{ $blog->author->name }}</h4>
                            <a href="mailto:{{ $blog->author->email }}">{{ $blog->author->email }}</a>
                            <p>{{ $blog->author->bio }}</p>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <h4 class="headline margin-top-25">Related Posts</h4>
                    <div class="row">
                        @foreach($relatedPosts as $related)
                            <div class="col-md-6">
                                <!-- Blog Post -->
                                <div class="blog-post">
                                    <!-- Img -->
                                    <a href="{{ route('blogs.show', $related->id) }}" class="post-img">
                                        <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}">
                                    </a>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <h3><a href="{{ route('blogs.show', $related->id) }}">{{ $related->title }}</a></h3>
                                        <p>{{ Str::limit($related->excerpt, 100) }}</p>
                                        <a href="{{ route('blogs.show', $related->id) }}" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <!-- Blog Post / End -->
                            </div>
                        @endforeach
                    </div>
                    <!-- Related Posts / End -->

                    <!-- Reviews -->
                    <section id="comments" class="comments">
                        <h4 class="headline margin-bottom-35">Comments <span class="comments-amount">({{ $blog->comments->count() }})</span></h4>
                        <ul>
                            @foreach($blog->comments as $comment)
                                <li>
                                    <div class="avatar"><img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}"></div>
                                    <div class="comment-content">
                                        <div class="arrow-comment"></div>
                                        <div class="comment-by">{{ $comment->user->name }}<span class="date">{{ $comment->created_at->format('F j, Y') }}</span>
                                            <a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>

                    <!-- Add Comment -->
                    <h4 class="headline">Add Comment</h4>
                    <div class="margin-top-15"></div>

                    <form id="add-comment" class="add-comment" method="POST" action="{{ route('blogs.comments.store', $blog->id) }}">
                        @csrf
                        <fieldset>
                            <div>
                                <label>Name:</label>
                                <input type="text" name="name" value="{{ old('name') }}">
                            </div>
                            <div>
                                <label>Email: <span>*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div>
                                <label>Comment: <span>*</span></label>
                                <textarea cols="40" rows="3" name="content">{{ old('content') }}</textarea>
                            </div>
                        </fieldset>
                        <button type="submit" class="button">Add Comment</button>
                        <div class="clearfix"></div>
                        <div class="margin-bottom-20"></div>
                    </form>
                </div>
                <!-- Content / End -->

                <!-- Sidebar ================================================== -->
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
                        <!-- Widget / End -->

                        <!-- Social Widget -->
                        <div class="widget">
                            <h3 class="margin-top-0 margin-bottom-25">Social</h3>
                            <ul class="social-icons rounded">
                                <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                                <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Widget / End -->
                    </div>
                </div>
                <!-- Sidebar / End -->
            </div>
        </div>
    </div>

@endsection
