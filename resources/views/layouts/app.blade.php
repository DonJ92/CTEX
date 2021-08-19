<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CTEX') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" class="dark" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{ route('/') }}">
                            <span class="logo-default">CTEX</span>
                            <span class="logo-dark text-primary">CTEX</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            <li>
                                <div class="p-dropdown">
                                    <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                                    <ul class="p-dropdown-content background-black-dark border-panel">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">日本語</a></li>
                                        <li><a href="#">中文</a></li>
                                        <li><a href="#">Русский</a></li>
                                        <li><a href="#">Français</a></li>
                                        <li><a href="#">한국어</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('/') }}">Home</a></li>
                                    <li><a href="{{ route('exchange') }}">Trade</a></li>
                                    <li><a href="{{ route('exchange') }}">Buy/Sell Crypto</a></li>
                                    <li><a href="">Overview</a></li>
                                    <li><a href="">Services</a></li>
                                    <li><a href="">How to Use</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    @guest
                                    <li><a href="{{ route('login') }}"><i class="icon-log-in"> </i>Login</a></li>
                                    <li><a href="{{ route('register') }}"><i class="icon-user-plus"> </i>Register</a></li>
                                    @else
                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>

        @yield('content')

        <footer id="footer" class="inverted">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="widget">
                                <div class="widget-title">CTEX Exchange</div>
                                <p>All rights reserved. Copyright © 2021.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">Overview</a></li>
                                            <li><a href="#">Services</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Term of Service</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">How to use</a></li>
                                            <li><a href="#">FAQ</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>
