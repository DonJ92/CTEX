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
                                    <ul class="p-dropdown-content">
                                        <li><a href="#">日本語</a></li>
                                        <li><a href="#">English</a></li>
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
                                    <li><a href="{{ route('/') }}">ホーム</a></li>
                                    <li><a href="{{ route('exchange') }}">販売所</a></li>
                                    <li><a href="{{ route('exchange') }}">取引所</a></li>
                                    <li><a href="index.html">取引概要</a></li>
                                    <li><a href="index.html">サービス案内</a></li>
                                    <li><a href="index.html">初めての方</a></li>
                                    <li><a href="index.html">よくある質問</a></li>
                                    @guest
                                    <li><a href="{{ route('login') }}">ログイン</a></li>
                                    <li><a href="{{ route('register') }}">無料会員登録</a></li>
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
                                <div class="widget-title">CTEX取引所</div>
                                <p>All rights reserved. Copyright © 2021.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">取引概要</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">サービス案内</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">初めての方</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <ul class="list">
                                            <li><a href="#">よくある質問</a></li>
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
