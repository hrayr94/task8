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
                        @foreach($properties->take(3) as $property)
                            <div class="listing-item">

                                <a href="#" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span>{{ $property->status }}</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span
                                            class="listing-price">${{ $property->price }} <i>{{ $property->price_per_sq_ft ? '$'.$property->price_per_sq_ft.' / sq ft' : '' }}</i></span>
                                        <span class="like-icon"></span>
                                    </div>

                                    @foreach($property->images as $image)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"
                                             alt="{{ $property->title }}">
                                    @endforeach

                                </a>

                                <div class="listing-content">
                                    <div class="listing-title">
                                        <h4>
                                            <a href="{{route('properties.show', $property->id)}}">{{ $property->title }}</a>
                                        </h4>
                                        <a href="https://maps.google.com/maps?q={{ urlencode($property->address) }}&hl=en&t=v&hnear={{ urlencode($property->address) }}"
                                           class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $property->address }}
                                        </a>

                                        <a href="#" class="details button border">Details</a>
                                    </div>

                                    <ul class="listing-details">
                                        <li>{{ $property->area }} sq ft</li>
                                        <li>{{ $property->bedrooms }} Bedroom</li>
                                        <li>{{ $property->rooms }} Rooms</li>
                                        <li>{{ $property->bathrooms }} Bathroom</li>
                                    </ul>

                                    <div class="listing-footer">
                                        <a href="#"><i class="fa fa-user"></i> {{ $property->agent_name }}</a>
                                        <span><i class="fa fa-calendar-o"></i> {{ $property->created_at->diffForHumans() }}</span>
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
                        <div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
                            <h3><i class="fa fa-calendar-check-o"></i> Schedule a Tour</h3>
                            <div class="row with-forms  margin-top-0">

                                <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
                                <div class="col-lg-12">
                                    <input type="text" id="date-picker" placeholder="Date" readonly="readonly">
                                </div>

                                <!-- Panel Dropdown -->
                                <div class="col-lg-12">
                                    <div class="panel-dropdown time-slots-dropdown">
                                        <a href="#">Time</a>
                                        <div class="panel-dropdown-content padding-reset">
                                            <div class="panel-dropdown-scrollable">

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-1">
                                                    <label for="time-slot-1">
                                                        <strong>8:30 am - 9:00 am</strong>
                                                        <span>1 slot available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-2">
                                                    <label for="time-slot-2">
                                                        <strong>9:00 am - 9:30 am</strong>
                                                        <span>2 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-3">
                                                    <label for="time-slot-3">
                                                        <strong>9:30 am - 10:00 am</strong>
                                                        <span>1 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-4">
                                                    <label for="time-slot-4">
                                                        <strong>10:00 am - 10:30 am</strong>
                                                        <span>3 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-5">
                                                    <label for="time-slot-5">
                                                        <strong>13:00 pm - 13:30 pm</strong>
                                                        <span>2 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-6">
                                                    <label for="time-slot-6">
                                                        <strong>13:30 pm - 14:00 pm</strong>
                                                        <span>1 slots available</span>
                                                    </label>
                                                </div>

                                                <!-- Time Slot -->
                                                <div class="time-slot">
                                                    <input type="radio" name="time-slot" id="time-slot-7">
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
                            <a href="#" class="button book-now fullwidth margin-top-5">Send Request</a>
                        </div>

                    </div>
                    <!-- Booking Widget / End -->


                    <!-- Widget -->
                    <div class="widget">

                        <!-- Agent Widget -->
                        <div class="agent-widget">
                            <div class="agent-title">
                                <div class="agent-photo"><img src="/images/agent-avatar.jpg" alt=""/></div>
                                <div class="agent-details">
                                    <h4><a href="#">Jennie Wilson</a></h4>
                                    <span><i class="sl sl-icon-call-in"></i>(123) 123-456</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <input type="text" placeholder="Your Email"
                                   pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                            <input type="text" placeholder="Your Phone">
                            <textarea>I'm interested in this property [ID 123456] and I'd like to know more details.</textarea>
                            <button class="button fullwidth margin-top-5">Send Message</button>
                        </div>
                        <!-- Agent Widget / End -->

                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-bottom-30 margin-top-30">Mortgage Calculator</h3>

                        <!-- Mortgage Calculator -->
                        <form action="javascript:void(0);" autocomplete="off" class="mortgageCalc"
                              data-calc-currency="USD">
                            <div class="calc-input">
                                <div class="pick-price tip" data-tip-content="Set This Property Price"></div>
                                <input type="text" id="amount" name="amount" placeholder="Sale Price" required>
                                <label for="amount" class="fa fa-usd"></label>
                            </div>

                            <div class="calc-input">
                                <input type="text" id="downpayment" placeholder="Down Payment">
                                <label for="downpayment" class="fa fa-usd"></label>
                            </div>

                            <div class="calc-input">
                                <input type="text" id="years" placeholder="Loan Term (Years)" required>
                                <label for="years" class="fa fa-calendar-o"></label>
                            </div>

                            <div class="calc-input">
                                <input type="text" id="interest" placeholder="Interest Rate" required>
                                <label for="interest" class="fa fa-percent"></label>
                            </div>

                            <button class="button calc-button" formvalidate>Calculate</button>
                            <div class="calc-output-container">
                                <div class="notification success">Monthly Payment: <strong class="calc-output"></strong>
                                </div>
                            </div>
                        </form>
                        <!-- Mortgage Calculator / End -->

                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-bottom-35">Featured Properties</h3>

                        <div class="listing-carousel outer">
                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Eagle Apartments <i>$275,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="/images/listing-01.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->

                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Selway Apartments <i>$245,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="/images/listing-02.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->

                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Oak Tree Villas <i>$325,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="/images/listing-03.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->
                        </div>

                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>
    <!-- Replacing dropdown placeholder with selected time slot -->
    <script>
        $(".time-slot").each(function () {
            var timeSlot = $(this);
            $(this).find('input').on('change', function () {
                var timeSlotVal = timeSlot.find('strong').text();

                $('.panel-dropdown.time-slots-dropdown a').html(timeSlotVal);
                $('.panel-dropdown').removeClass('active');
            });
        });
    </script>
@endsection
