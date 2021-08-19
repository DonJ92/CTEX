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

    <link href="{{ asset('plugins/bootstrap-switch/bootstrap-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/range-slider/rangeslider.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                            <a href=""><span class="border-panel p-5 b-r-10 border-light"><img src="{{ asset('/icons/btc.svg') }}" width="20px" class="p-r-5">BTC/USDT</span></a>
                            <ul class="p-dropdown-content background-dark text-light">
                                <li><a href="#"><img src="{{ asset('/icons/btc.svg') }}" width="24px" class="p-r-5">BTC/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/xrp.svg') }}" width="24px" class="p-r-5">XRP/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/eth.svg') }}" width="24px" class="p-r-5">ETH/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/xtz.svg') }}" width="24px" class="p-r-5">XTZ/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/xlm.svg') }}" width="24px" class="p-r-5">XLM/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/xem.svg') }}" width="24px" class="p-r-5">XEM/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/etc.svg') }}" width="24px" class="p-r-5">ETC/USDT</a></li>
                                <li><a href="#"><img src="{{ asset('/icons/fil.svg') }}" width="24px" class="p-r-5">FIL/USDT</a></li>
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
                        <li><a href="{{ route('exchange') }}">Trade</a></li>
                        <li><a href="{{ route('exchange') }}">Buy / Sell Crypto</a></li>
                        @guest
                            <li><a href="{{ route('login') }}"><i class="icon-log-in"></i>&nbsp;Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="icon-user-plus"></i>&nbsp;Register</a></li>
                        @else
                        @endguest
                        <li>
                            <div class="p-dropdown no-float">
                                <a href="#"><i class="icon-user"></i></a>
                                <div class="p-dropdown-content background-black-dark border-panel">
                                    <ul>
                                        <li><a href="{{ route('payment') }}">Deposit / Withdraw</a></li>
                                        <li><a href="{{ route('report') }}">Report</a></li>
                                        <li><a href="{{ route('setting') }}">Setting</a></li>
                                        <li><a href="#">Notification</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end: Topbar -->

    @yield('content')
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<!--Template functions-->
<script src="{{ asset('js/functions.js') }}"></script>

<!--Bootstrap switch files-->
<script src="{{ asset('plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/range-slider/rangeslider.js') }}"></script>
<!--Datatables plugin files-->
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
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
@yield('script')
</body>
</html>
