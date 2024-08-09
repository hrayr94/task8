@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Feature</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.features.update', $feature->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Feature Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $feature->name }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update Feature</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
