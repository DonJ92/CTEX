<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'CTEX') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Datatables plugin files-->
    <link href="{{ asset('plugins/datatables/datatables.min.css') }}" rel="stylesheet">
    <!--Bootstrap switch files-->
    <link href="{{ asset('plugins/bootstrap-switch/bootstrap-switch.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<!-- Body Inner -->
<div class="body-inner background-dark min-vh-100">
    <!-- Header -->
    <header id="header" class="dark" data-fullwidth="true">
        <div class="header-inner">
            <div class="container">
                <!--Logo-->
                <div id="logo">
                    <a href="{{ route('/') }}">
                        <span class="logo-default"><img src="{{ asset('/images/logo_main.png') }}"></span>
                        <span class="logo-dark text-primary"><img src="{{ asset('/images/logo_main.png') }}" style="max-height: 50px"></span>
                    </a>
                </div>
                <!--End: Logo-->
                <!--Header Extras-->
                <div class="header-extras">
                    <ul>
                        <li>
                            <div class="p-dropdown">
                                <a href="#"><i class="icon-bell"></i></a>
                                <div class="p-dropdown-content background-black-dark border-panel">
                                    <div class="widget-notification">
                                        <h4 class="mb-0">Notifications</h4>
                                        <p class="text-muted">You have 2 new notifications</p>
                                        <div class="notification-item notification-new">
                                            <div class="notification-meta">
                                                <a href="#">New order just placed</a>
                                                <span>18:20</span>
                                            </div>
                                        </div>
                                        <div class="notification-item notification-new">
                                            <div class="notification-meta">
                                                <a href="#">New account is created</a>
                                                <span>22:03</span>
                                            </div>
                                        </div>
                                        <div class="notification-item">
                                            <div class="notification-meta">
                                                <a href="#">Server Backup is finished successfully</a>
                                                <span>14:12</span>
                                            </div>
                                        </div>
                                        <div class="notification-item">
                                            <div class="notification-meta">
                                                <a href="#">Failed to import document file</a>
                                                <span>11:03</span>
                                            </div>
                                        </div>
                                        <hr class="space">
                                        <a href="{{ route('notifications') }}" class="text-theme">See all notifications</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="p-dropdown">
                                <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                                <div class="p-dropdown-content background-black-dark border-panel">
                                    <ul>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">日本語</a></li>
                                        <li><a href="#">中文</a></li>
                                        <li><a href="#">Русский</a></li>
                                        <li><a href="#">Français</a></li>
                                        <li><a href="#">한국어</a></li>
                                    </ul>
                                </div>
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
                                <li><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                                <li><a href="{{ route('news') }}"><i class="fas fa-newspaper"></i>News</a></li>
                                <li><a href="{{ route('exchange') }}"><i class="fa fa-chart-bar"></i>Trade</a></li>
                                <li><a href="{{ route('dealer') }}"><i class="fa fa-money-bill-wave"></i>Buy / Sell Crypto</a></li>
                                <li><a href="{{ route('payment') }}"><i class="fa fa-wallet"></i>Deposit / Withdraw</a></li>
                                <li><a href="{{ route('report') }}"><i class="fa fa-file-alt"></i>Report</a></li>
                                <li><a href="{{ route('setting') }}"><i class="fa fa-cog"></i>Setting</a></li>
                                <li><a href="{{ route('faq') }}"><i class="fa fa-question-circle"></i>FAQ</a></li>
                                <li><a href="{{ route('contactus') }}"><i class="fas fa-envelope"></i>Contact Us</a></li>
                                <li class="dropdown"><a href="#"><img src="{{ asset('images/user-avatar.png') }}" class="avatar avatar-lg m-r-5"><span>{{ Auth::user()->name }}</span></a>
                                    <ul class="dropdown-menu background-black-dark border-panel">
                                        <li><a href="{{ route('setting') }}">Setting</a></li>
                                        <li><a href="{{ route('notifications') }}">Notifications</a></li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
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
                <div class="row mx-1">
                    <div class="col-lg-5">
                        <div class="widget">
                            <div class="widget-title">CTEX Exchange</div>
                            <p>All rights reserved. Copyright © 2021.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="widget">
                                    <ul class="list">
                                        <li><a href="{{ route('exchange') }}">Trade</a></li>
                                        <li><a href="{{ route('dealer') }}">Buy/Sell Crypto</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="widget">
                                    <ul class="list">
                                        <li><a href="{{ route('payment') }}">Deposit/Withdraw</a></li>
                                        <li><a href="{{ route('report') }}">Trading Report</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="widget">
                                    <ul class="list">
                                        <li><a href="{{ route('news') }}">News</a></li>
                                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                                        <li><a href="{{ route('contactus') }}">Contact Us</a></li>
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
<!--Clipboard plugin files-->
<script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>
<!--Template functions-->
<script src="{{ asset('js/functions.js') }}"></script>
<!--Datatables plugin files-->
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<!--Bootstrap switch files-->
<script src="{{ asset('plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>

@yield('script')
</body>
</html>