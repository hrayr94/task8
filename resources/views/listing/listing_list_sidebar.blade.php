@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div class="parallax titlebar"
         data-background="images/listings-parallax.jpg"
         data-color="#333333"
         data-color-opacity="0.7"
         data-img-width="800"
         data-img-height="505">

        <div id="titlebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Listings</h2>
                        <span>Grid Layout With Sidebar</span>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>Listings</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row sticky-wrapper">
            <!-- Main Content -->
            <div class="col-md-8">
                <!-- Main Search Input -->
                <form action="{{ route('search.properties') }}" method="GET" class="main-search-input margin-bottom-35">
                    <input type="text" name="autocomplete-input" class="ico-01"
                           placeholder="Enter address e.g. street, city and state or zip"
                           value="{{ request('autocomplete-input') }}"/>
                    <button class="button" type="submit">Search</button>
                </form>

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">
                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>
                            <div class="sort-by-select">
                                <select data-placeholder="Default order" class="chosen-select-no-single">
                                    <option>Default Order</option>
                                    <option>Price Low to High</option>
                                    <option>Price High to Low</option>
                                    <option>Newest Properties</option>
                                    <option>Oldest Properties</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
                            <a href="#" class="list"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="grid"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Listings -->
                <div class="listings-container list-layout">
                    @foreach($properties as $property)
                        <div class="listing-item">
                            <a href="{{ route('properties.show', $property->id) }}" class="listing-img-container">
                                <div class="listing-badges">
                                    @if($property->is_featured)
                                        <span class="featured">Featured</span>
                                    @endif
                                    <span>{{ $property->status }}</span>
                                </div>

                                <div class="listing-img-content">
                                    <span class="listing-price">${{ number_format($property->price) }} <i>${{ number_format($property->price / $property->area, 2) }} / sq ft</i></span>
                                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                                </div>

                                @if($property->images->isNotEmpty())
                                    <div class="listing-carousel">
                                        @foreach($property->images as $image)
                                            <div><img
                                                    src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                                    alt="{{ $property->title }}"></div>
                                        @endforeach
                                    </div>
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="{{ $property->title }}">
                                @endif
                            </a>

                            <div class="listing-content">
                                <div class="listing-title">
                                    <h4>
                                        <a href="{{ route('properties.show', $property->id) }}">{{ $property->title }}</a>
                                    </h4>
                                    <a href="https://maps.google.com/maps?q={{ urlencode($property->address) }}"
                                       class="listing-address popup-gmaps">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $property->city }}, {{ $property->state }}
                                    </a>
                                    <a href="{{ route('properties.show', $property->id) }}"
                                       class="details button border">Details</a>
                                </div>

                                <ul class="listing-details">
                                    <li><i class="fa fa-cube"></i> {{ $property->area }} sq ft</li>
                                    <li><i class="fa fa-bed"></i> {{ $property->details->bedrooms }}
                                        Bedroom{{ $property->details->bedrooms > 1 ? 's' : '' }}</li>
                                    <li><i class="fa fa-bath"></i> {{ $property->details->bathrooms }}
                                        Bathroom{{ $property->details->bathrooms > 1 ? 's' : '' }}</li>
                                </ul>

                                <div class="listing-footer">
                                    <a href="#"><i class="fa fa-user"></i> {{ $property->user->name }}</a>
                                    <span><i class="fa fa-calendar-o"></i> {{ $property->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Listings / End -->

                <!-- Pagination -->
                <div class="pagination-container margin-top-30">
                    {{ $properties->links() }}
                </div>
                <!-- Pagination / End -->
            </div>
            <!-- Main Content / End -->

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar sticky right">
                    <!-- Widget -->
                    <div class="widget margin-bottom-40">
                        <h3 class="margin-top-0 margin-bottom-35">Find New Home</h3>
                        <!-- Form -->
                        <form action="{{ route('search.properties') }}" method="GET">
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-12">
                                    <select name="status" data-placeholder="Any Status" class="chosen-select-no-single">
                                        <option value="" {{ request('status') === null ? 'selected' : '' }}>Any Status
                                        </option>
                                        @foreach(\App\Models\Property::getStatuses() as $statusValue => $statusLabel)
                                            <option value="{{ $statusValue }}">{{ $statusLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row with-forms">
                                <!-- Type -->
                                <div class="col-md-12">
                                    <select name="type" data-placeholder="Any Type" class="chosen-select-no-single">
                                        <option value="" {{ request('type') === null ? 'selected' : '' }}>Any Type
                                        </option>
                                        @foreach(\App\Models\Property::getTypes() as $typeValue => $typeLabel)
                                            <option value="{{ $statusValue }}">{{ $statusLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <!-- Row / End -->

                            <div class="row with-forms">
                                <!-- Beds -->
                                <div class="col-md-6">
                                    <select name="beds" data-placeholder="Beds" class="chosen-select-no-single">
                                        <option value="">Beds (Any)</option>
                                        @foreach(\App\Models\Property::getRooms() as $roomValue => $roomLabel)
                                            <option
                                                value="{{ $roomValue }}" {{ request('beds') == $roomValue ? 'selected' : '' }}>{{ $roomLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Baths -->
                                <div class="col-md-6">
                                    <select name="baths" data-placeholder="Baths" class="chosen-select-no-single">
                                        <option value="">Baths (Any)</option>
                                        @foreach(\App\Models\Property::getRooms() as $bathValue => $bathLabel)
                                            <option
                                                value="{{ $bathValue }}" {{ request('baths') == $bathValue ? 'selected' : '' }}>{{ $bathLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->

                            <!-- More Search Options -->
                            <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30"
                               data-open-title="Additional Features" data-close-title="Additional Features"></a>

                            <div class="more-search-options relative">
                                <!-- Checkboxes -->
                                <div class="checkboxes one-in-row margin-bottom-10">
                                    @foreach(\App\Models\Features::all() as $feature)
                                        <input id="check-{{ $feature->id }}" type="checkbox"
                                               name="amenities[]"
                                               value="{{ $feature->name }}">
                                        <label
                                            for="check-{{ $feature->id }}">{{ ucfirst(str_replace('_', ' ', $feature->name)) }}</label>
                                    @endforeach
                                </div>
                                <!-- Checkboxes / End -->
                            </div>

                            <!-- Area Range -->
                            <div class="range-slider">
                                <label>Area Range</label>
                                <div id="area-range" data-min="0" data-max="1500" data-unit="sq ft"></div>
                                <div class="clearfix"></div>
                            </div>

                            <br>

                            <!-- Price Range -->
                            <div class="range-slider">
                                <label>Price Range</label>
                                <div id="price-range" data-min="0" data-max="400000" data-unit="$"></div>
                                <div class="clearfix"></div>
                            </div>
                            <input type="hidden" name="min_area" id="min_area" value="{{ request('min_area') }}">
                            <input type="hidden" name="max_area" id="max_area" value="{{ request('max_area') }}">
                            <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price') }}">
                            <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price') }}">

                            <!-- More Search Options / End -->

                            <button class="button fullwidth margin-top-30" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- Widget / End -->
                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>

@endsection
