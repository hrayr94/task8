@extends('layouts.app')
@section('content')

    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Profile</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content -->
    <div class="container">
        <div class="row">


            <!-- Widget -->
            <div class="col-md-4">
                <div class="sidebar left">

                    <div class="my-account-nav-container">

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Account</li>
                            <li><a href="{{ route('my_profile.index') }}" class="current"><i class="sl sl-icon-user"></i> My Profile</a>
                            </li>
                            <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="{{ route('properties.index') }}"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                            <li><a href="{{ route('properties.create') }}"><i class="sl sl-icon-action-redo"></i> Submit New
                                    Property</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a href="change-password.html"><i class="sl sl-icon-lock"></i> Change Password</a></li>
                            <li><a href="#"><i class="sl sl-icon-power"></i> Log Out</a></li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <form method="post" action="{{route('my_profile.update')}}" enctype="multipart/form-data"
                          class="container">
                        <div class="col-md-8 my-profile">
                            @csrf
                            @method('PUT')
                            <h4 class="margin-top-0 margin-bottom-30">My Account</h4>
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>@foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif

                            <label>Your Name</label>
                            <input value="{{ $user->name }}" name="name" type="text">

                            @if ($user->userInfo)
                                <label>Your Title</label>
                                <input value="{{ $user->userInfo->title }}" name="title" type="text">

                                <label>Phone</label>
                                <input value="{{ $user->userInfo->phone }}" name="phone" type="text">

                                <h4 class="margin-top-50 margin-bottom-25">About Me</h4>
                                <textarea name="about" id="about" cols="30" rows="10">{{ $user->userInfo->about }}</textarea>
                            @else
                                <label>Your Title</label>
                                <input value="" name="title" type="text">

                                <label>Phone</label>
                                <input value="" name="phone" type="text">

                                <h4 class="margin-top-50 margin-bottom-25">About Me</h4>
                                <textarea name="about" id="about" cols="30" rows="10"></textarea>
                            @endif

                            <h4 class="margin-top-50 margin-bottom-0">Social</h4>

                            @if ($user->socialNetwork)
                                <label><i class="fa fa-twitter"></i> Twitter</label>
                                <input value="{{ $user->socialNetwork->twitter }}" type="url" name="twitter">

                                <label><i class="fa fa-facebook-square"></i> Facebook</label>
                                <input value="{{ $user->socialNetwork->facebook }}" type="url" name="facebook">

                                <label><i class="fa fa-google-plus"></i> Google+</label>
                                <input value="{{ $user->socialNetwork->google }}" type="url" name="google">

                                <label><i class="fa fa-linkedin"></i> Linkedin</label>
                                <input value="{{ $user->socialNetwork->linkedin }}" type="url" name="linkedin">
                            @else
                                <label><i class="fa fa-twitter"></i> Twitter</label>
                                <input value="" type="url" name="twitter">

                                <label><i class="fa fa-facebook-square"></i> Facebook</label>
                                <input value="" type="url" name="facebook">

                                <label><i class="fa fa-google-plus"></i> Google+</label>
                                <input value="" type="url" name="google">

                                <label><i class="fa fa-linkedin"></i> Linkedin</label>
                                <input value="" type="url" name="linkedin">
                            @endif

                            <button class="button margin-top-20 margin-bottom-20">Save Changes</button>

                        </div>

                        <div class="col-md-4">
                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <img
                                    src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'images/agent-02.jpg' }}"
                                    alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload" name="profile_photo"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
