@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row fullwidth-layout">

            <!-- Listings Container -->
            <div class="col-md-8">

                <!-- Check if there are properties to display -->
                @if($properties->isEmpty())
                    <p>No properties found matching your criteria.</p>
                @else
                    <!-- Loop through each property -->
                    @foreach($properties as $property)
                        <div class="listing-item">
                            <a href="{{ url('property', $property->id) }}" class="listing-img-container">
                                <div class="listing-badges">
                                    <span>{{ $property->getStatusLabel() }}</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">${{ number_format($property->price) }} <i>${{ number_format($property->price / $property->area, 2) }} / sq ft</i></span>
                                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>

                                @if($property->images->isNotEmpty())
                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($property->images->first()->image) }}"
                                        alt="">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="">
                                @endif
                            </a>

                            <div class="listing-content">
                                <div class="listing-title">
                                    <h4><a href="{{ url('property', $property->id) }}">{{ $property->title }}</a></h4>
                                    <a href="https://maps.google.com/maps?q={{ urlencode($property->address) }}"
                                       class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i> {{ $property->address }}
                                    </a>

                                    <a href="{{ url('property', $property->id) }}"
                                       class="details button border">Details</a>
                                </div>

                                <ul class="listing-details">
                                    <li>{{ $property->area }} sq ft</li>
                                    <li>{{ $property->bedrooms }} Bedroom{{ $property->bedrooms > 1 ? 's' : '' }}</li>
                                    <li>{{ $property->bathrooms }}
                                        Bathroom{{ $property->bathrooms > 1 ? 's' : '' }}</li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> {{ $property->user->name }}</a>
                                    <span><i class="fa fa-calendar-o"></i> {{ $property->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- Pagination Links -->
                <div class="pagination">
                    {{ $properties->links() }}
                </div>
            </div>
            <!-- Listings Container / End -->

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-40">
                        <h3 class="margin-top-0 margin-bottom-35">Find New Home</h3>

                        <div class="row with-forms">
                            <!-- Status -->
                            <div class="col-md-12">
                                <select data-placeholder="Any Status" class="chosen-select-no-single">
                                    <option>Any Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                        </div>
                        <!-- Add more filters here... -->

                        <button class="button fullwidth margin-top-30">Search</button>
                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>

    <!-- Footer -->
    <div class="margin-top-55"></div>

    <div id="footer" class="sticky-footer">
        <div class="container">
            <!-- Footer content here -->
        </div>
    </div>
    <!-- Footer / End -->

@endsection
