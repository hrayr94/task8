@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Property Details</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $property->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ App\Models\Property::getStatuses()[$property->status] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ App\Models\Property::getTypes()[$property->type] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>${{ number_format($property->price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Area</th>
                                        <td>{{ $property->area }} sq ft</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $property->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $property->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>{{ $property->state }}</td>
                                    </tr>
                                    <tr>
                                        <th>ZIP Code</th>
                                        <td>{{ $property->zip_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $property->details->description ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Building Age</th>
                                        <td>{{ $property->details->building_age ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bedrooms</th>
                                        <td>{{ $property->details->bedrooms ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bathrooms</th>
                                        <td>{{ $property->details->bathrooms ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Air Conditioning</th>
                                        <td>{{ $property->details->air_conditioning ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Swimming Pool</th>
                                        <td>{{ $property->details->swimming_pool ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Central Heating</th>
                                        <td>{{ $property->details->central_heating ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Laundry Room</th>
                                        <td>{{ $property->details->laundry_room ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gym</th>
                                        <td>{{ $property->details->gym ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alarm</th>
                                        <td>{{ $property->details->alarm ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Window Covering</th>
                                        <td>{{ $property->details->window_covering ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Name</th>
                                        <td>{{ $property->details->contact_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Email</th>
                                        <td>{{ $property->details->contact_email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Phone</th>
                                        <td>{{ $property->details->contact_phone ?? 'N/A' }}</td>
                                    </tr>
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
