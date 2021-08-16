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

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
</head>
<body class="background-dark">
<!-- Body Inner -->
<div class="body-inner dark vh-100">
    <!-- Topbar -->
    <div id="topbar" class="dark topbar-fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="top-menu">
                        <li class="p-dropdown">
                            <a href=""><span class="border-panel p-5 b-r-10"><img src="{{ asset('/icons/btc.svg') }}" width="20px" class="p-r-5">BTC/USDT</span></a>
                            <ul class="p-dropdown-content background-dark text-light">
                                <li><a href="#"><img src="{{ asset('/icons/btc.svg') }}" width="24px" class="p-r-5">BTC/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/xrp.svg') }}" width="24px" class="p-r-5">XRP/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/eth.svg') }}" width="24px" class="p-r-5">ETH/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/xtz.svg') }}" width="24px" class="p-r-5">XTZ/USDT</a></li>
                                <li><a href="#">XML/USDT</a></li>
                                <li><a href="#">XEM/USDT</a></li>
                                <li><a href="#">ETC/USDT</a></li>
                                <li><a href="#">FIL/USDT</a></li>
                            </ul>
                        </li>
                        <li><a><span class="text-info">$46035</span></a></li>
                        <li><a><span class="text-info">+0.4%</span></a></li>
                        <li><a><i class="fab fa-btc"></i>1326.76</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="top-menu float-right">
                        <li><a href="{{ route('/') }}"><b>CTEX</b></a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                        @else
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end: Topbar -->

    @yield('content')
</div>
<!--Template functions-->
<script src="{{ asset('js/functions.js') }}"></script>
<link href="{{ asset('plugins/range-slider/rangeslider.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/range-slider/rangeslider.js') }}"></script>
<script src="https://s3.tradingview.com/tv.js"></script>
<script type="text/javascript">
    new TradingView.widget(
        {
            "autosize": true,
            "symbol": "BITSTAMP:BTCUSD",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "dark",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "container_id": "crypto_chart"
        }
    );

    $('#range_slider_limit').ionRangeSlider({
        type: "single",
        grid: true,
        min: 0,
        max: 100,
        from: 1,
        postfix: "%"
    });

    $('#range_slider_market').ionRangeSlider({
        type: "single",
        grid: true,
        min: 0,
        max: 100,
        from: 1,
        postfix: "%"
    });
</script>
</body>
</html>
