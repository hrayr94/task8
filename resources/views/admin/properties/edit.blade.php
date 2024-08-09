@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Property</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $property->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control">
                                            @foreach(App\Models\Property::getStatuses() as $key => $status)
                                                <option value="{{ $key }}" {{ $property->status == $key ? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select id="type" name="type" class="form-control">
                                            @foreach(App\Models\Property::getTypes() as $key => $type)
                                                <option value="{{ $key }}" {{ $property->type == $key ? 'selected' : '' }}>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" name="price" class="form-control" value="{{ $property->price }}" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="area">Area</label>
                                        <input type="number" id="area" name="area" class="form-control" value="{{ $property->area }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rooms">Rooms</label>
                                        <select id="rooms" name="rooms" class="form-control">
                                            @foreach(App\Models\Property::ROOMS as $key => $room)
                                                <option value="{{ $key }}" {{ $property->rooms == $key ? 'selected' : '' }}>{{ $room }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" value="{{ $property->address }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{ $property->city }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" class="form-control" value="{{ $property->state }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip_code">ZIP Code</label>
                                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ $property->zip_code }}" required>
                                    </div>
                                    <!-- Add fields for PropertyDetails as needed -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control">{{ $property->details->description ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="building_age">Building Age</label>
                                        <select id="building_age" name="building_age" class="form-control">
                                            @foreach(App\Models\Property::BUILDING_AGES as $age)
                                                <option value="{{ $age }}" {{ isset($property->details->building_age) && $property->details->building_age == $age ? 'selected' : '' }}>{{ $age }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bedrooms">Bedrooms</label>
                                        <input type="number" id="bedrooms" name="bedrooms" class="form-control" value="{{ $property->details->bedrooms ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bathrooms">Bathrooms</label>
                                        <input type="number" id="bathrooms" name="bathrooms" class="form-control" value="{{ $property->details->bathrooms ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="air_conditioning">Air Conditioning</label>
                                        <input type="checkbox" id="air_conditioning" name="air_conditioning" value="1" {{ isset($property->details->air_conditioning) && $property->details->air_conditioning ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="swimming_pool">Swimming Pool</label>
                                        <input type="checkbox" id="swimming_pool" name="swimming_pool" value="1" {{ isset($property->details->swimming_pool) && $property->details->swimming_pool ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="central_heating">Central Heating</label>
                                        <input type="checkbox" id="central_heating" name="central_heating" value="1" {{ isset($property->details->central_heating) && $property->details->central_heating ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="laundry_room">Laundry Room</label>
                                        <input type="checkbox" id="laundry_room" name="laundry_room" value="1" {{ isset($property->details->laundry_room) && $property->details->laundry_room ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="gym">Gym</label>
                                        <input type="checkbox" id="gym" name="gym" value="1" {{ isset($property->details->gym) && $property->details->gym ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="alarm">Alarm</label>
                                        <input type="checkbox" id="alarm" name="alarm" value="1" {{ isset($property->details->alarm) && $property->details->alarm ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="window_covering">Window Covering</label>
                                        <input type="checkbox" id="window_covering" name="window_covering" value="1" {{ isset($property->details->window_covering) && $property->details->window_covering ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_name">Contact Name</label>
                                        <input type="text" id="contact_name" name="contact_name" class="form-control" value="{{ $property->details->contact_name ?? '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_email">Contact Email</label>
                                        <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ $property->details->contact_email ?? '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_phone">Contact Phone</label>
                                        <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ $property->details->contact_phone ?? '' }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Property</button>
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
