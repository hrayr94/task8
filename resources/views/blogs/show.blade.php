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

    <!-- Content -->
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
                            {!! $blog->description !!}
                        </div>

                    </div>

                    <section class="comments">
                        <h4 class="headline margin-bottom-35">Comments <span class="comments-amount">({{ $blog->comments->count() }})</span></h4>

                        <ul>
                            @foreach($blog->comments as $comment)
                                <li>
                                    <div class="avatar">
                                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($comment->email))) }}?d=mm&s=70" alt="{{ $comment->name }}" />
                                    </div>
                                    <div class="comment-content">
                                        <div class="arrow-comment"></div>
                                        <div class="comment-by">{{ $comment->name }}<span class="date">{{ $comment->created_at->format('jS, F Y') }}</span></div>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>

                    <div class="clearfix"></div>
                    <div class="margin-top-55"></div>



                    <!-- Add Comment -->
                    <h4 class="headline">Add Comment</h4>
                    <div class="margin-top-15"></div>

                    <!-- Add Comment Form -->
                    <form id="add-comment" class="add-comment" action="{{ route('comments.store', $blog->id) }}" method="POST">
                        @csrf
                        <fieldset>

                            <div>
                                <label>Name:</label>
                                <input type="text" name="name" value="{{ old('name') }}"/>
                            </div>

                            <div>
                                <label>Email: <span>*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}" required/>
                            </div>

                            <div>
                                <label>Comment: <span>*</span></label>
                                <textarea name="comment" cols="40" rows="3" required>{{ old('comment') }}</textarea>
                            </div>

                        </fieldset>

                        <button type="submit" class="button">Add Comment</button>
                        <div class="clearfix"></div>
                        <div class="margin-bottom-20"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
