@extends('layouts.app')
@section('content')
    <!-- Titlebar

================================================== -->
    <div id="titlebar" class="property-titlebar margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{ route('properties.index') }}" class="back-to-listings"></a>
                    <div class="property-title">
                        <h2>{{ $property->title }} <span
                                class="property-badge">{{ $property->status == 1 ? 'For Sale' : 'For Rent' }}</span>
                        </h2>
                        <span>
                        <a href="#location" class="listing-address">
                            <i class="fa fa-map-marker"></i>
                            {{ $property->address }}, {{ $property->city }}, {{ $property->state }}
                        </a>
                    </span>
                    </div>

                    <div class="property-pricing">
                        <div class="property-price">${{ number_format($property->price, 2) }}</div>
                        <div class="sub-price">${{ number_format($property->price / $property->area, 2) }} / sq ft</div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row margin-bottom-50">
            <div class="col-md-12">

                <!-- Slider -->
                <div class="property-slider default">
                    @foreach($property->images as $image)
                        <a href="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                           data-background-image="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                           class="item mfp-gallery"></a>
                    @endforeach
                </div>

                <!-- Slider Thumbs -->
                <div class="property-slider-nav">
                    @foreach($property->images as $image)
                        <div class="item"><img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                               alt=""></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">

            <!-- Property Description -->
            <div class="col-lg-8 col-md-7 sp-content">
                <div class="property-description">

                    <ul class="property-main-features">
                        <li>Area <span>{{ $property->area }} sq ft</span></li>
                        <li>Rooms <span>{{ $property->rooms }}</span></li>
                        <li>Bedrooms <span>{{ $property->details->bedrooms }}</span></li>
                        <li>Bathrooms <span>{{ $property->details->bathrooms }}</span></li>
                    </ul>

                    <h3 class="desc-headline">Description</h3>
                    <div>
                        <p>{{$property->details->description}}</p>
                    </div>

                    <h3 class="desc-headline">Details</h3>
                    <ul class="property-features margin-top-0">
                        <li>Building Age: <span>{{ $property->building_age }} Years</span></li>
                        <li>Parking: <span>{{ $property->parking }}</span></li>
                        <li>Cooling: <span>{{ $property->cooling }}</span></li>
                        <li>Heating: <span>{{ $property->heating }}</span></li>
                        <li>Sewer: <span>{{ $property->sewer }}</span></li>
                        <li>Water: <span>{{ $property->water }}</span></li>
                        <li>Exercise Room: <span>{{ $property->exercise_room ? 'Yes' : 'No' }}</span></li>
                        <li>Storage Room: <span>{{ $property->storage_room ? 'Yes' : 'No' }}</span></li>
                    </ul>

                    <h3 class="desc-headline no-border">Video</h3>
                    <div class="responsive-iframe">
                        <iframe width="560" height="315" src="{{ $property->video_url }}" frameborder="0"
                                allowfullscreen></iframe>
                    </div>


                    <!-- Location -->
                    <h3 class="desc-headline no-border" id="location">Location</h3>
                    <div id="propertyMap-container">
                        <div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                        <a href="#" id="streetView">Street View</a>
                    </div>


                    <!-- Similar Listings Container -->
                    <h3 class="desc-headline no-border margin-bottom-35 margin-top-60">Similar Properties</h3>

                    <!-- Layout Switcher -->

                    <div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
                    <div class="listings-container list-layout">

                        <!-- Listing Item -->
                        @foreach($properties->take(3) as $similiar_property)
                            <div class="listing-item">

                                <a href="#" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span>{{ $similiar_property->status }}</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span
                                            class="listing-price">${{ $similiar_property->price }} <i>{{ $similiar_property->price_per_sq_ft ? '$'.$property->price_per_sq_ft.' / sq ft' : '' }}</i></span>
                                        <span class="like-icon"></span>
                                    </div>

                                    @foreach($similiar_property->images as $image)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                             alt="{{ $similiar_property->title }}">
                                    @endforeach

                                </a>

                                <div class="listing-content">
                                    <div class="listing-title">
                                        <h4>
                                            <a href="{{route('properties.show', $similiar_property->id)}}">{{ $similiar_property->title }}</a>
                                        </h4>
                                        <a href="https://maps.google.com/maps?q={{ urlencode($similiar_property->address) }}&hl=en&t=v&hnear={{ urlencode($similiar_property->address) }}"
                                           class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $similiar_property->address }}
                                        </a>

                                        <a href="#" class="details button border">Details</a>
                                    </div>

                                    <ul class="listing-details">
                                        <li>{{ $similiar_property->area }} sq ft</li>
                                        <li>{{ $similiar_property->bedrooms }} Bedroom</li>
                                        <li>{{ $similiar_property->rooms }} Rooms</li>
                                        <li>{{ $similiar_property->bathrooms }} Bathroom</li>
                                    </ul>

                                    <div class="listing-footer">
                                        <a href="#"><i class="fa fa-user"></i> {{ $similiar_property->agent_name }}</a>
                                        <span><i class="fa fa-calendar-o"></i> {{ $similiar_property->created_at->diffForHumans() }}</span>
                                    </div>

                                </div>

                            </div>
                        @endforeach


                        <!-- Listing Item / End -->

                    </div>
                    <!-- Similar Listings Container / End -->

                </div>
            </div>
            <!-- Property Description / End -->


            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 sp-sidebar">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-30">
                        <button class="widget-button with-tip" data-tip-content="Print"><i
                                class="sl sl-icon-printer"></i></button>
                        <button class="widget-button with-tip" data-tip-content="Add to Bookmarks"><i
                                class="fa fa-star-o"></i></button>
                        <button class="widget-button with-tip compare-widget-button" data-tip-content="Add to Compare">
                            <i class="icon-compare"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Widget / End -->


                    <!-- Booking Widget -->
                    <div class="widget">
                        <form action="{{ route('bookings.store') }}" method="post">
                            @csrf
                            <div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
                                <h3><i class="fa fa-calendar-check-o"></i> Schedule a Tour</h3>
                                <div class="row with-forms  margin-top-0">

                                    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
                                    <div class="col-lg-12">
                                        <input type="date" name="date" id="date-picker" placeholder="Date">
                                    </div>


                                    <!-- Panel Dropdown -->
                                    <div class="col-lg-12">
                                        <div class="panel-dropdown time-slots-dropdown">
                                            <a href="#">Time</a>
                                            <div class="panel-dropdown-content padding-reset">
                                                <div class="panel-dropdown-scrollable">

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-1">
                                                        <label for="time-slot-1">
                                                            <strong>8:30 am - 9:00 am</strong>
                                                            <span>1 slot available</span>
                                                        </label>
                                                    </div>

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-2">
                                                        <label for="time-slot-2">
                                                            <strong>9:00 am - 9:30 am</strong>
                                                            <span>2 slots available</span>
                                                        </label>
                                                    </div>

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-3">
                                                        <label for="time-slot-3">
                                                            <strong>9:30 am - 10:00 am</strong>
                                                            <span>1 slots available</span>
                                                        </label>
                                                    </div>

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-4">
                                                        <label for="time-slot-4">
                                                            <strong>10:00 am - 10:30 am</strong>
                                                            <span>3 slots available</span>
                                                        </label>
                                                    </div>

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-5">
                                                        <label for="time-slot-5">
                                                            <strong>13:00 pm - 13:30 pm</strong>
                                                            <span>2 slots available</span>
                                                        </label>
                                                    </div>

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-6">
                                                        <label for="time-slot-6">
                                                            <strong>13:30 pm - 14:00 pm</strong>
                                                            <span>1 slots available</span>
                                                        </label>
                                                    </div>

                                                    <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <input type="radio" name="time_slot" id="time-slot-7">
                                                        <label for="time-slot-7">
                                                            <strong>14:00 pm - 14:30 pm</strong>
                                                            <span>1 slots available</span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Panel Dropdown / End -->

                                </div>

                                <!-- Book Now -->
                                <button type="submit" class="button book-now fullwidth margin-top-5">Send Request</button>
                            </div>
                        </form>
                    </div>
                    <!-- Booking Widget / End -->


                    <!-- Widget -->
                    <div class="widget">

                        <!-- Agent Widget -->
                        <div class="agent-widget">
                            <form action="{{ route('leads.create') }}" method="post">
                                @csrf
                                <div class="agent-title">
                                    <div class="agent-photo"><img src="/images/agent-avatar.jpg" alt=""/></div>

                                    <div class="agent-details">
                                        <h4><a href="#">{{ $property->user->name}}</a></h4>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <input type="text" name="email" placeholder="Your Email"
                                       pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                                <input type="text" name="phone" placeholder="Your Phone">
                                <textarea name="message">I'm interested in this property [ID 123456] and I'd like to know more details.</textarea>
                                <button class="button fullwidth margin-top-5">Send Message</button>
                            </form>
                        </div>
                        <!-- Agent Widget / End -->

                    </div>
                    <!-- Widget / End -->
                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>
@endsection
