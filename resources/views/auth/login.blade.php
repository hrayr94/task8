@extends('layouts.app')

@section('content')

    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Log In & Register</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Log In & Register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <button class="button social-login via-twitter"><i class="fa fa-twitter"></i> Log In With Twitter</button>
                <button class="button social-login via-gplus"><i class="fa fa-google-plus"></i> Log In With Google Plus</button>
                <button class="button social-login via-facebook"><i class="fa fa-facebook"></i> Log In With Facebook</button>

                <div class="my-account style-1 margin-top-5 margin-bottom-40">
                    <ul class="tabs-nav">
                        <li class="active"><a href="#tab1">Log In</a></li>
                        <li><a href="#tab2">Register</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1">
                            <form method="POST" class="login" action="{{ route('login') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="email">Email Address:
                                        <i class="im im-icon-Mail"></i>
                                        <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" required />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password" required />
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit" class="button border margin-top-10" name="login" value="Login" />

                                    <label for="rememberme" class="rememberme">
                                        <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me
                                    </label>
                                </p>

                                <p class="lost_password">
                                    <a href="{{ route('password.request') }}">Lost Your Password?</a>
                                </p>
                            </form>
                        </div>

                        <!-- Register -->
                        <div class="tab-content" id="tab2">
                            <form method="POST" class="register" action="{{ route('register') }}">
                                @csrf

                                <p class="form-row form-row-wide">
                                    <label for="username2">Name:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="name" id="username2" value="{{ old('username') }}" required />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="email2">Email Address:
                                        <i class="im im-icon-Mail"></i>
                                        <input type="email" class="input-text" name="email" id="email2" value="{{ old('email') }}" required />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password1">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password1" required />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password2">Repeat Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password_confirmation" id="password2" required />
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                                </p>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
