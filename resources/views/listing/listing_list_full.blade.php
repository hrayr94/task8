@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="headline margin-bottom-25">Search Results</h3>

        @if($properties->isEmpty())
            <p>No properties found matching your criteria.</p>
        @else
            <div class="row">
                @foreach($properties as $property)
                    <div class="col-md-4">
                        <div class="listing-item">
                            <a href="{{ url('property', $property->id) }}" class="listing-img-container">
                                <div class="listing-badges">
                                    @if($property->is_featured)
                                        <span class="featured">Featured</span>
                                    @endif
                                    <span>{{ $property->getStatusLabel() }}</span>
                                </div>
                                <div class="listing-img-content">
                                    <span class="listing-price">${{ number_format($property->price) }} <i>${{ number_format($property->price / $property->area, 2) }} / sq ft</i></span>
                                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>
                                @if($property->images->isNotEmpty())
                                    <div class="listing-carousel">
                                        @foreach($property->images as $image)
                                            <div><img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}" alt=""></div>
                                        @endforeach
                                    </div>
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="">
                                @endif
                            </a>
                            <div class="listing-content">
                                <div class="listing-title">
                                    <h4><a href="{{ url('property', $property->id) }}">{{ $property->title }}</a></h4>
                                    <a href="https://maps.google.com/maps?q={{ urlencode($property->address) }}" class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i> {{ $property->address }}
                                    </a>
                                </div>
                                <ul class="listing-features">
                                    <li>Area <span>{{ $property->area }} sq ft</span></li>
                                    <li>Bedrooms <span>{{ $property->bedrooms }}</span></li>
                                    <li>Bathrooms <span>{{ $property->bathrooms }}</span></li>
                                </ul>
                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> {{ $property->user->name }}</a>
                                    <span><i class="fa fa-calendar-o"></i> {{ $property->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="pagination">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
@endsection
