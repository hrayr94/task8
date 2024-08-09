@include('layouts.header')


<!-- Banner
    ================================================== -->
<div class="parallax" data-background="images/home-parallax.jpg" data-color="#36383e" data-color-opacity="0.45"
     data-img-width="2500" data-img-height="1600">
    <div class="parallax-content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Main Search Container -->
                    <div class="main-search-container">
                        <h2>Find Your Dream Home</h2>

                        <!-- Main Search -->
                        <form class="main-search-form">

                            <!-- Type -->
                            <div class="search-type">
                                <label class="active"><input class="first-tab" name="tab" checked="checked"
                                                             type="radio">Any Status</label>
                                <label><input name="tab" type="radio">For Sale</label>
                                <label><input name="tab" type="radio">For Rent</label>
                                <div class="search-type-arrow"></div>
                            </div>


                            <!-- Box -->
                            <div class="main-search-box">

                                <!-- Main Search Input -->
                                <div class="main-search-input larger-input">
                                    <input type="text" class="ico-01" id="autocomplete-input"
                                           placeholder="Enter address e.g. street, city and state or zip" value=""/>
                                    <button class="button">Search</button>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Property Type -->
                                    <div class="col-md-4">
                                        <select data-placeholder="Any Type" class="chosen-select-no-single">
                                            <option>Any Type</option>
                                            <option>Apartments</option>
                                            <option>Houses</option>
                                            <option>Commercial</option>
                                            <option>Garages</option>
                                            <option>Lots</option>
                                        </select>
                                    </div>


                                    <!-- Min Price -->
                                    <div class="col-md-4">

                                        <!-- Select Input -->
                                        <div class="select-input">
                                            <input type="text" placeholder="Min Price" data-unit="USD">
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>


                                    <!-- Max Price -->
                                    <div class="col-md-4">

                                        <!-- Select Input -->
                                        <div class="select-input">
                                            <input type="text" placeholder="Max Price" data-unit="USD">
                                        </div>
                                        <!-- Select Input / End -->

                                    </div>

                                </div>
                                <!-- Row / End -->


                                <!-- More Search Options -->
                                <a href="#" class="more-search-options-trigger" data-open-title="More Options"
                                   data-close-title="Less Options"></a>

                                <div class="more-search-options">
                                    <div class="more-search-options-container">

                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Min Price -->
                                            <div class="col-md-6">

                                                <!-- Select Input -->
                                                <div class="select-input">
                                                    <input type="text" placeholder="Min Area" data-unit="Sq Ft">
                                                </div>
                                                <!-- Select Input / End -->

                                            </div>

                                            <!-- Max Price -->
                                            <div class="col-md-6">

                                                <!-- Select Input -->
                                                <div class="select-input">
                                                    <input type="text" placeholder="Max Area" data-unit="Sq Ft">
                                                </div>
                                                <!-- Select Input / End -->

                                            </div>

                                        </div>
                                        <!-- Row / End -->


                                        <!-- Row -->
                                        <div class="row with-forms">

                                            <!-- Min Area -->
                                            <div class="col-md-6">
                                                <select data-placeholder="Beds" class="chosen-select-no-single">
                                                    <option label="blank"></option>
                                                    <option>Beds (Any)</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>

                                            <!-- Max Area -->
                                            <div class="col-md-6">
                                                <select data-placeholder="Baths" class="chosen-select-no-single">
                                                    <option label="blank"></option>
                                                    <option>Baths (Any)</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- Row / End -->


                                        <!-- Checkboxes -->
                                        <div class="checkboxes in-row">

                                            <input id="check-2" type="checkbox" name="check">
                                            <label for="check-2">Air Conditioning</label>

                                            <input id="check-3" type="checkbox" name="check">
                                            <label for="check-3">Swimming Pool</label>

                                            <input id="check-4" type="checkbox" name="check">
                                            <label for="check-4">Central Heating</label>

                                            <input id="check-5" type="checkbox" name="check">
                                            <label for="check-5">Laundry Room</label>


                                            <input id="check-6" type="checkbox" name="check">
                                            <label for="check-6">Gym</label>

                                            <input id="check-7" type="checkbox" name="check">
                                            <label for="check-7">Alarm</label>

                                            <input id="check-8" type="checkbox" name="check">
                                            <label for="check-8">Window Covering</label>

                                        </div>
                                        <!-- Checkboxes / End -->

                                    </div>
                                </div>
                                <!-- More Search Options / End -->


                            </div>
                            <!-- Box / End -->

                        </form>
                        <!-- Main Search -->

                    </div>
                    <!-- Main Search Container / End -->

                </div>
            </div>
        </div>

    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
        </div>

        <!-- Carousel -->
        <div class="col-md-12">
            <div class="carousel">
                @if(!isset($properties))
                    <p>No properties found.</p>
                @else

                    @foreach($properties as $property)
                        <div class="carousel-item">
                            <div class="listing-item">
                                <a href="{{ url('property', $property->id) }}" class="listing-img-container">

                                    <div class="listing-badges">
                                        @if($property->is_featured)
                                            <span class="featured">Featured</span>
                                        @endif
                                        <span>{{ $property->status }}</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span class="listing-price">${{ number_format($property->price) }} <i>${{ number_format($property->price / $property->area, 2) }} / sq ft</i></span>
                                        <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                        <span class="compare-button with-tip"
                                              data-tip-content="Add to Compare"></span>
                                    </div>

                                    @if($property->images)
                                        <div class="listing-carousel">
                                            @foreach($property->images as $image)
                                                <div><img
                                                        src="{{  \Illuminate\Support\Facades\Storage::url($image->image)  }}"
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
                                            <a href="{{ url('property', $property->id) }}">{{ $property->title }}</a>
                                        </h4>
                                        <a href="https://maps.google.com/maps?q={{ urlencode($property->address) }}"
                                           class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $property->address }}
                                        </a>
                                    </div>

                                    <ul class="listing-features">
                                        <li>Area <span>{{ $property->area }} sq ft</span></li>
                                        <li>Bedrooms <span>{{ $property->bedrooms }}</span></li>
                                        <li>Bathrooms <span>{{ $property->bathrooms }}</span></li>
                                    </ul>

                                    <div class="listing-footer">
                                        <a href="#"><i class="fa fa-user"></i> {{ $property->agent_name }}</a>
                                        <span><i class="fa fa-calendar-o"></i> {{ $property->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
        <!-- Carousel / End -->

    </div>
</div>

<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
    <!-- Copyright -->
    <div class="row">
        <div class="col-md-12">
            <div class="copyrights">© 2016 Findeo. All Rights Reserved.</div>
        </div>
    </div>

</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-migrate-3.1.0.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

<!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
        var input = document.getElementById('autocomplete-input');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>


</div>
<!-- Wrapper / End -->


</body>
</html>
