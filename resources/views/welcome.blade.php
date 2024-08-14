@extends('layouts.app')

@section('content')
    <!-- Banner -->
    <div class="parallax" data-background="images/home-parallax.jpg" data-color="#36383e" data-color-opacity="0.45"
         data-img-width="2500" data-img-height="1600">
        <div class="parallax-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Main Search Container -->
                        <div class="main-search-container">
                            <h2>Find Your Dream Home</h2>

                            <!-- Main Search Form -->
                            <form class="main-search-form" action="{{ route('search.properties') }}" method="get">
                                <!-- Type -->
                                <div class="search-type">
                                    @foreach(\App\Models\Property::getStatuses() as $key => $status)
                                        <label class="{{ $key === \App\Models\Property::STATUS_SALE ? 'active' : '' }}">
                                            <input
                                                class="{{ $key === \App\Models\Property::STATUS_SALE ? 'first-tab' : '' }}"
                                                name="tab" type="radio"
                                                value="{{ $key }}" {{ $key === \App\Models\Property::STATUS_SALE ? 'checked' : '' }}>
                                            {{ $status }}
                                        </label>
                                    @endforeach
                                    <div class="search-type-arrow"></div>
                                </div>

                                <!-- Box -->
                                <div class="main-search-box">
                                    <!-- Main Search Input -->
                                    <div class="main-search-input larger-input">
                                        <input type="text" class="ico-01" id="autocomplete-input"
                                               name="autocomplete-input"
                                               placeholder="Enter address e.g. street, city and state or zip" value=""/>
                                        <button class="button" type="submit">Search</button>
                                    </div>

                                    <!-- Row -->
                                    <div class="row with-forms">
                                        <!-- Property Type -->
                                        <div class="col-md-4">
                                            <select name="type" data-placeholder="Any Type"
                                                    class="chosen-select-no-single">
                                                <option value="">Any Type</option>
                                                @foreach(\App\Models\Property::getTypes() as $key => $type)
                                                    <option value="{{ $key }}">{{ $type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Min Price -->
                                        <div class="col-md-4">
                                            <div class="select-input">
                                                <input type="text" name="min_price" placeholder="Min Price"
                                                       data-unit="USD">
                                            </div>
                                        </div>
                                        <!-- Max Price -->
                                        <div class="col-md-4">
                                            <div class="select-input">
                                                <input type="text" name="max_price" placeholder="Max Price"
                                                       data-unit="USD">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- More Search Options -->
                                    <a href="#" class="more-search-options-trigger" data-open-title="More Options"
                                       data-close-title="Less Options"></a>
                                    <div class="more-search-options">
                                        <div class="more-search-options-container">
                                            <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Min Area -->
                                                <div class="col-md-6">
                                                    <div class="select-input">
                                                        <input type="text" name="min_area" placeholder="Min Area"
                                                               data-unit="Sq Ft">
                                                    </div>
                                                </div>
                                                <!-- Max Area -->
                                                <div class="col-md-6">
                                                    <div class="select-input">
                                                        <input type="text" name="max_area" placeholder="Max Area"
                                                               data-unit="Sq Ft">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Row -->
                                            <div class="row with-forms">
                                                <!-- Beds -->
                                                <div class="col-md-6">
                                                    <select name="beds" data-placeholder="Beds"
                                                            class="chosen-select-no-single">
                                                        <option value="">Beds (Any)</option>
                                                        @foreach(\App\Models\Property::getRooms() as $key => $room)
                                                            <option value="{{ $key }}">{{ $room }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Baths -->
                                                <div class="col-md-6">
                                                    <select name="baths" data-placeholder="Baths"
                                                            class="chosen-select-no-single">
                                                        <option value="">Baths (Any)</option>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Checkboxes -->
                                            <div class="checkboxes in-row">
                                                @foreach(\App\Models\Features::all() as $feature)
                                                    <input id="check-{{ $feature->id }}" type="checkbox"
                                                           name="amenities[]"
                                                           value="{{ $feature->name }}">
                                                    <label
                                                        for="check-{{ $feature->id }}">{{ ucfirst(str_replace('_', ' ', $feature->name)) }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
            </div>
            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">
                    @if($properties->isEmpty())
                        <p>No properties found.</p>
                    @else
                        @foreach($properties as $property)
                            <div class="carousel-item">
                                <div class="listing-item">
                                    <a href="{{ route('properties.show', $property->id) }}" class="listing-img-container">
                                        <div class="listing-badges">
                                            @if($property->is_featured)
                                                <span class="featured">Featured</span>
                                            @endif
                                            <span>{{ $property->getStatusLabel() }}</span>
                                        </div>
                                        <div class="listing-img-content">
                                            <span class="listing-price">${{ number_format($property->price) }} <i>${{ number_format($property->price / $property->area, 2) }} / sq ft</i></span>
                                            <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                            <span class="compare-button with-tip"
                                                  data-tip-content="Add to Compare"></span>
                                        </div>
                                        @if($property->images->isNotEmpty())
                                            <div class="listing-carousel">
                                                @foreach($property->images as $image)
                                                    <div><img
                                                            src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                                            alt=""></div>
                                                @endforeach
                                            </div>
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" alt="">
                                        @endif
                                    </a>
                                    <div class="listing-content">
                                        <div class="listing-title">
                                            <h4>
                                                <a href="{{ route('properties.show', $property->id) }}">{{ $property->title }}</a>
                                            </h4>
                                            <a href="https://maps.google.com/maps?q={{ urlencode($property->address) }}"
                                               class="listing-address popup-gmaps">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
