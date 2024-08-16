@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Compare List -->
                <div class="compare-list-container">
                    <ul id="compare-list">
                        <li class="compare-list-properties">
                            <div class="blank-div"></div>

                            <!-- Iterate through properties -->
                            @foreach($properties as $property)
                                <div>
                                    <a href="{{ route('properties.show', $property->id) }}">
                                        <div class="clp-img">
                                            @if($property->images->isNotEmpty())
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($property->images->first()->image) }}" alt="{{ $property->title }}">
                                            @else
                                                <img src="{{ asset('images/default.jpg') }}" alt="{{ $property->title }}">
                                            @endif
                                            <span class="remove-from-compare"><i class="fa fa-close"></i></span>
                                        </div>

                                        <div class="clp-title">
                                            <h4>{{ $property->title }}</h4>
                                            <span>${{ number_format($property->price) }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </li>

                        <!-- Iterate through attributes for comparison -->
                        <li>
                            <div>Area</div>
                            @foreach($properties as $property)
                                <div>{{ $property->area }} sq ft</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Rooms</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->rooms }}</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Bedrooms</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->bedrooms }}</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Bathrooms</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->bathrooms }}</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Air Conditioning</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->air_conditioning ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Swimming Pool</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->swimming_pool ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Laundry Room</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->laundry_room ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Window Covering</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->window_covering ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Gym</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->gym ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Internet</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->internet ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Alarm</div>
                            @foreach($properties as $property)
                                <div><span class="{{ $property->details->alarm ? 'available' : 'not-available' }}"></span></div>
                            @endforeach
                        </li>

                        <li>
                            <div>Building Age</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->building_age }}</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Heating</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->heating }}</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Parking</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->parking }}</div>
                            @endforeach
                        </li>

                        <li>
                            <div>Sewer</div>
                            @foreach($properties as $property)
                                <div>{{ $property->details->sewer }}</div>
                            @endforeach
                        </li>

                    </ul>
                </div>
                <!-- Compare List / End -->

            </div>
        </div>
    </div>
@endsection
