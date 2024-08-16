@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Blog Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="5" required>{{ $blog->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control-file">
                                        @if($blog->image)
                                            <div class="mt-2">
                                                <img src="{{ Storage::url('public/' . $blog->image) }}" alt="Blog Image" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
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
