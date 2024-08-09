@extends('layouts.app')
@section('content')

    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Add Property</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Submit Page -->

            <div class="col-md-12">
                <form class="submit-page" action="{{route('properties.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="notification notice large margin-bottom-55">
                        <h4>Don't Have an Account?</h4>
                        <p>If you don't have an account you can create one by entering your email address in contact
                            details section. A password will be automatically emailed to you.</p>
                    </div>

                    <!-- Section -->
                    <h3>Basic Information</h3>
                    <div class="submit-section">

                        <!-- Title -->
                        <div class="form">
                            <h5>Property Title <i class="tip"
                                                  data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i>
                            </h5>
                            <input class="search-field" type="text" name="title" value=""/>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-6">
                                <h5>Status</h5>
                                <select class="chosen-select-no-single" name="status">
                                    <option label="blank"></option>
                                    @foreach ($statuses as $key => $status)
                                        <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <h5>Type</h5>
                                <select class="chosen-select-no-single" name="type">
                                    <option label="blank"></option>
                                    @foreach ($types as $key => $type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- Row / End -->

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Price -->
                            <div class="col-md-4">
                                <h5>Price <i class="tip"
                                             data-tip-content="Type overall or monthly price if property is for rent"></i>
                                </h5>
                                <div class="select-input disabled-first-option">
                                    <input type="text" name="price" data-unit="USD">
                                </div>
                            </div>

                            <!-- Area -->
                            <div class="col-md-4">
                                <h5>Area</h5>
                                <div class="select-input disabled-first-option">
                                    <input type="text" name="area" data-unit="Sq Ft">
                                </div>
                            </div>

                            <!-- Rooms -->
                            <div class="col-md-4">
                                <h5>Rooms</h5>
                                <select class="chosen-select-no-single" name="rooms">
                                    <option label="blank"></option>
                                    @foreach($rooms as $value => $label)
                                        <option value="{{ $value }}" {{ old('rooms') == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <!-- Row / End -->

                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <h3>Gallery</h3>
                    <div class="submit-section">
                        <h5>Upload Images</h5>
                        <input type="file" name="images[]" multiple>
                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <h3>Location</h3>
                    <div class="submit-section">

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Address -->
                            <div class="col-md-6">
                                <h5>Address</h5>
                                <input type="text" name="address">
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <h5>City</h5>
                                <input type="text" name="city">
                            </div>

                            <!-- State -->
                            <div class="col-md-6">
                                <h5>State</h5>
                                <input type="text" name="state">
                            </div>

                            <!-- Zip-Code -->
                            <div class="col-md-6">
                                <h5>Zip-Code</h5>
                                <input type="text" name="zip_code">
                            </div>

                        </div>
                        <!-- Row / End -->

                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <h3>Detailed Information</h3>
                    <div class="submit-section">

                        <!-- Description -->
                        <div class="form">
                            <h5>Description</h5>
                            <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary"
                                      spellcheck="true"></textarea>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Age of Home -->
                            <div class="col-md-4">
                                <h5>Building Age <span>(optional)</span></h5>
                                <select class="chosen-select-no-single" name="building_age">
                                    <option label="blank"></option>
                                    @foreach($buildingAges as $value => $label)
                                        <option
                                            value="{{ $value }}" {{ old('building_age') == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Beds -->
                            <div class="col-md-4">
                                <h5>Bedrooms <span>(optional)</span></h5>
                                <select class="chosen-select-no-single" name="bedrooms">
                                    <option label="blank"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <!-- Baths -->
                            <div class="col-md-4">
                                <h5>Bathrooms <span>(optional)</span></h5>
                                <select class="chosen-select-no-single" name="bathrooms">
                                    <option label="blank"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                        </div>
                        <!-- Row / End -->

                        <!-- Checkboxes -->
                        <h5 class="margin-top-30">Other Features <span>(optional)</span></h5>
                        <div class="checkboxes in-row margin-bottom-20">
                            @foreach($features as $feature)
                                <input id="check-{{ $feature->name }}" type="checkbox" name="features[]"
                                       value="{{ $feature->id }}" {{ old('features') && in_array($feature->id, old('features')) ? 'checked' : '' }}>
                                <label
                                    for="check-{{ $feature->name }}">{{ ucfirst(str_replace('_', ' ', $feature->name)) }}</label>
                            @endforeach
                        </div>
                        <!-- Checkboxes / End -->

                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <h3>Contact Details</h3>
                    <div class="submit-section">

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Name -->
                            <div class="col-md-4">
                                <h5>Name</h5>
                                <input type="text" name="contact_name">
                            </div>

                            <!-- Email -->
                            <div class="col-md-4">
                                <h5>E-Mail</h5>
                                <input type="text" name="contact_email">
                            </div>

                            <!-- Phone -->
                            <div class="col-md-4">
                                <h5>Phone <span>(optional)</span></h5>
                                <input type="text" name="contact_phone">
                            </div>

                        </div>
                        <!-- Row / End -->

                    </div>
                    <!-- Section / End -->

                    <div class="divider"></div>
                    <button type="submit" class="button preview margin-top-5">Submit <i
                            class="fa fa-arrow-circle-right"></i></button>
                </form>
            </div>

            <!-- Submit Page / End -->

        </div>
    </div>
@endsection
