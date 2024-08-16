@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Blog Posts</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                                        Create New Blog Post
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->description }}</td>
                                            <td>
                                                @if($blog->image)
                                                    <img src="{{ Storage::url('public/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 150px; max-height: 100px;">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
