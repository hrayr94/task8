@extends('layouts.app')
@section('content')
    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Manage Properties</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar left">
                    <div class="my-account-nav-container">
                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Account</li>
                            <li><a href="#"><i class="sl sl-icon-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="{{ route('properties.index') }}" class="current"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                            <li><a href="{{ route('properties.create') }}"><i class="sl sl-icon-action-redo"></i> Submit New Property</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a href="#"><i class="sl sl-icon-lock"></i> Change Password</a></li>
                            <li><a href="#"><i class="sl sl-icon-power"></i> Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <table class="manage-table responsive-table">
                    <tr>
                        <th><i class="fa fa-file-text"></i> Property</th>
                        <th class="expire-date"><i class="fa fa-calendar"></i> Expiration Date</th>
                        <th></th>
                    </tr>

                    <!-- Loop through properties and display them -->
                    @foreach($properties as $property)
                        <tr>
                            <td class="title-container">
                                @if($property->images->isNotEmpty())
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($property->images->first()->image) }}" alt="{{ $property->title }}" style="width: 150px; height: auto;">
                                @else
                                    <img src="{{ asset('path/to/default/image.jpg') }}" alt="No Image Available" style="width: 150px; height: auto;">
                                @endif
                                <div class="title">
                                    <h4>
                                        <a href="{{ route('properties.show', $property->id) }}">{{ $property->title }}</a>
                                    </h4>
                                    <span>{{ $property->address }}</span>
                                    <span class="table-property-price">{{ $property->price }}</span>
                                </div>
                            </td>
                            <td class="expire-date">
                                @if($property->expiration_date)
                                    {{ $property->expiration_date->format('F d, Y') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="action">
                                <a href="{{ route('properties.edit', $property->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="#"><i class="fa fa-eye-slash"></i> Hide</a>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this property?')"><i class="fa fa-remove"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('properties.create') }}" class="margin-top-40 button">Submit New Property</a>
            </div>
        </div>
    </div>
@endsection
