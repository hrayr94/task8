<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Findeo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


    <!-- Compare Properties Widget
    ================================================== -->
    <div class="compare-slide-menu">

        <div class="csm-trigger"></div>

        <div class="csm-content">
            <h4>Compare Properties
                <div class="csm-mobile-trigger"></div>
            </h4>

            <div class="csm-properties">

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>For Sale</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">Eagle Apartments <i>$420,000</i></span>
                        </div>
                        <img src="images/listing-01.jpg" alt="">
                    </a>
                </div>

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>For Sale</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">Selway Apartments <i>$420,000</i></span>
                        </div>
                        <img src="images/listing-03.jpg" alt="">
                    </a>
                </div>

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>For Sale</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">Oak Tree Villas <i>$535,000</i></span>
                        </div>
                        <img src="images/listing-05.jpg" alt="">
                    </a>
                </div>

            </div>

            <div class="csm-buttons">
                <a href="compare-properties.html" class="button">Compare</a>
                <a href="#" class="button reset">Reset</a>
            </div>
        </div>

    </div>
    <!-- Compare Properties Widget / End -->


    <!-- Header Container
    ================================================== -->
    <header id="header-container">

        <!-- Topbar -->
        <div id="top-bar">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Top bar -->
                    <ul class="top-bar-menu">
                        <li><i class="fa fa-phone"></i> (123) 123-456</li>
                        <li><i class="fa fa-envelope"></i> <a href="#">office@example.com</a></li>
                        <li>
                            <div class="top-bar-dropdown">
                                <span>Dropdown Menu</span>
                                <ul class="options">
                                    <li>
                                        <div class="arrow"></div>
                                    </li>
                                    <li><a href="#">Nice First Link</a></li>
                                    <li><a href="#">Second Link With Long Title</a></li>
                                    <li><a href="#">Third Link</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- Left Side Content / End -->


                <!-- Left Side Content -->
                <div class="right-side">

                    <!-- Social Icons -->
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                    </ul>

                </div>
                <!-- Left Side Content / End -->

            </div>
        </div>
        <div class="clearfix"></div>
        <!-- Topbar / End -->


        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="/"><img src="images/logo.png" alt=""></a>
                    </div>


                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                            <li><a class="current" href="/">Home</a>
                                <ul>
                                    <li><a href="/">Home 1</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Listings</a>
                                <ul>
                                    <li><a href="#">List Layout</a>
                                        <ul>
                                            <li><a href="{{ route('search.properties') }}?view=sidebar">With Sidebar</a></li>
                                            <li><a href="{{ route('search.properties') }}?view=full-width">Full Width</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="{{ route('comparing_properties.index') }}">Compare Properties</a></li>

                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-post.html">Blog Post</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="header-widget">
                            <div class="user-menu">
                                <div class="user-name">
                                    <span><img src="{{ asset('images/agent-04.jpg') }}" alt="User"></span>
                                    Hi, {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                </div>

                                <ul>
                                    <li><a href="{{ route('my_profile.index') }}"><i class="sl sl-icon-user"></i> My
                                            Profile</a></li>
                                    <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarks</a></li>
                                    <li><a href="{{ route('properties.index') }}"><i class="sl sl-icon-docs"></i> My
                                            Properties</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit"
                                                    style="background: none; border: none; cursor: pointer; color: inherit;">
                                                <i class="sl sl-icon-power"></i> Log Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('properties.create') }}" class="button border">Submit Property</a>
                        </div>
                    @else
                        <div class="header-widget">
                            <a href="{{route('login')}}" class="sign-in"><i class="fa fa-user"></i> Log In /
                                Register</a>
                        </div>
                    @endif

                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->
