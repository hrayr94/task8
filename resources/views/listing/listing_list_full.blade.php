@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="headline margin-bottom-25">Search Results</h3>

        <!-- Search Form -->
        <section class="search margin-bottom-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Title -->
                        <h3 class="search-title">Search</h3>

                        <!-- Form -->
                        <div class="main-search-box no-shadow">
                            <!-- Row With Forms -->
                            <form action="{{ route('search.properties') }}" method="GET">
                                <div class="row with-forms">
                                    <!-- Status -->
                                    <div class="col-md-3">
                                        <select name="status" data-placeholder="Any Status" class="chosen-select-no-single">
                                            <option value="">Any Status</option>
                                            <option value="For Sale">For Sale</option>
                                            <option value="For Rent">For Rent</option>
                                        </select>
                                    </div>

                                    <!-- Property Type -->
                                    <div class="col-md-3">
                                        <select name="type" data-placeholder="Any Type" class="chosen-select-no-single">
                                            <option value="">Any Type</option>
                                            <option value="Apartments">Apartments</option>
                                            <option value="Houses">Houses</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Garages">Garages</option>
                                            <option value="Lots">Lots</option>
                                        </select>
                                    </div>

                                    <!-- Main Search Input -->
                                    <div class="col-md-6">
                                        <div class="main-search-input">
                                            <input type="hidden" name="view" value="full-width" />
                                            <input type="text" name="autocomplete-input" placeholder="Enter address e.g. street, city or state" value="{{ request('autocomplete-input') }}"/>
                                            <button type="submit" class="button">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row With Forms -->
                                <div class="row with-forms">
                                    <div class="col-md-3">
                                        <div class="select-input">
                                            <input type="text" name="min_area" placeholder="Min Area" data-unit="Sq Ft" value="{{ request('min_area') }}">
                                        </div>
                                    </div>

                                    <!-- Max Area -->
                                    <div class="col-md-3">
                                        <div class="select-input">
                                            <input type="text" name="max_area" placeholder="Max Area" data-unit="Sq Ft" value="{{ request('max_area') }}">
                                        </div>
                                    </div>

                                    <!-- Min Price -->
                                    <div class="col-md-3">
                                            <div class="select-input">
                                                <input type="text" name="min_price" placeholder="Min Price"
                                                       data-unit="USD">
                                            </div>

                                    </div>

                                    <!-- Max Price -->
                                    <div class="col-md-3">
                                            <div class="select-input">
                                                <input type="text" name="max_price" placeholder="Max Price"
                                                       data-unit="USD">
                                            </div>
                                    </div>
                                </div>

                                <!-- More Search Options -->
                                <a href="#" class="more-search-options-trigger margin-top-10" data-open-title="More Options" data-close-title="Less Options"></a>

                                <div class="more-search-options relative">
                                    <div class="more-search-options-container">
                                        <div class="row with-forms">
                                            <!-- Age of Home -->
                                            <div class="col-md-3">
                                                <select name="age_of_home" data-placeholder="Age of Home" class="chosen-select-no-single">
                                                    <option value="">Age of Home (Any)</option>
                                                    <option value="0 - 1 Years">0 - 1 Years</option>
                                                    <option value="0 - 5 Years">0 - 5 Years</option>
                                                    <option value="0 - 10 Years">0 - 10 Years</option>
                                                    <option value="0 - 20 Years">0 - 20 Years</option>
                                                    <option value="0 - 50 Years">0 - 50 Years</option>
                                                    <option value="50 + Years">50 + Years</option>
                                                </select>
                                            </div>

                                            <!-- Rooms Area -->
                                            <div class="col-md-3">
                                                <select name="rooms" data-placeholder="Rooms" class="chosen-select-no-single">
                                                    <option value="">Rooms (Any)</option>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <!-- Min Area -->
                                            <div class="col-md-3">
                                                <select name="beds" data-placeholder="Beds" class="chosen-select-no-single">
                                                    <option value="">Beds (Any)</option>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <!-- Max Area -->
                                            <div class="col-md-3">
                                                <select name="baths" data-placeholder="Baths" class="chosen-select-no-single">
                                                    <option value="">Baths (Any)</option>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Checkboxes -->
                                        <div class="checkboxes in-row">
                                            <input id="check-2" type="checkbox" name="air_conditioning">
                                            <label for="check-2">Air Conditioning</label>

                                            <input id="check-3" type="checkbox" name="swimming_pool">
                                            <label for="check-3">Swimming Pool</label>

                                            <input id="check-4" type="checkbox" name="central_heating">
                                            <label for="check-4">Central Heating</label>

                                            <input id="check-5" type="checkbox" name="laundry_room">
                                            <label for="check-5">Laundry Room</label>

                                            <input id="check-6" type="checkbox" name="gym">
                                            <label for="check-6">Gym</label>

                                            <input id="check-7" type="checkbox" name="alarm">
                                            <label for="check-7">Alarm</label>

                                            <input id="check-8" type="checkbox" name="window_covering">
                                            <label for="check-8">Window Covering</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- More Search Options / End -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($properties->isEmpty())
            <p>No properties found matching your criteria.</p>
        @else
            <div class="row">
                @foreach($properties as $property)
                    <div class="col-md-4">
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
                                    <h4><a href="{{ route('properties.show', $property->id) }}">{{ $property->title }}</a></h4>
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
