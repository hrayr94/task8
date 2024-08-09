@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Property</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            @foreach(App\Models\Property::getStatuses() as $key => $status)
                                                <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select id="type" name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            @foreach(App\Models\Property::getTypes() as $key => $type)
                                                <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <input type="number" id="area" name="area" class="form-control" value="{{ old('area') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="rooms">Rooms</label>
                                        <select id="rooms" name="rooms" class="form-control">
                                            <option value="">Select Rooms</option>
                                            @foreach(App\Models\Property::ROOMS as $key => $room)
                                                <option value="{{ $key }}" {{ old('rooms') == $key ? 'selected' : '' }}>{{ $room }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" class="form-control" value="{{ old('state') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="zip_code">ZIP Code</label>
                                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ old('zip_code') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="building_age">Building Age</label>
                                        <select id="building_age" name="building_age" class="form-control">
                                            <option value="">Select Building Age</option>
                                            @foreach(App\Models\Property::BUILDING_AGES as $age)
                                                <option value="{{ $age }}" {{ old('building_age') == $age ? 'selected' : '' }}>{{ $age }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="bedrooms">Bedrooms</label>
                                        <input type="number" id="bedrooms" name="bedrooms" class="form-control" value="{{ old('bedrooms') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="bathrooms">Bathrooms</label>
                                        <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="{{ old('bathrooms') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="features">Features</label>
                                        <div class="checkbox-group">
                                            @foreach($features as $feature)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="feature-{{ $feature->id }}" name="features[]" value="{{ $feature->id }}" {{ old('features') && in_array($feature->id, old('features')) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="feature-{{ $feature->id }}">{{ ucfirst(str_replace('_', ' ', $feature->name)) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="images">Property Images</label>
                                        <input type="file" id="images" name="images[]" class="form-control" multiple>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_name">Contact Name</label>
                                        <input type="text" id="contact_name" name="contact_name" class="form-control" value="{{ old('contact_name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_email">Contact Email</label>
                                        <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_phone">Contact Phone</label>
                                        <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ old('contact_phone') }}">
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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
