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

    <link href="{{ asset('plugins/bootstrap-switch/bootstrap-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/range-slider/rangeslider.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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

                        <li class="p-dropdown" id="symbol_dropdown">
                            <a href=""><span class="border-symbol px-3 py-2 b-r-10" id="symbol"></span></a>
                            <input type="hidden" id="symbol_id">
                            <ul class="p-dropdown-content background-dark text-light border-symbol">
                                @foreach(\App\Http\Controllers\Controller::getCurrencyList() as $currency_info)
                                    <li><a onclick="onSelectCurrency('{{ $currency_info['id'] }}', '{{ $currency_info['currency'] }}')" href="#">{{ $currency_info['currency'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a><span class="text-info" id="top_price">0</span></a></li>
                        <li><a><span class="text-info">0</span></a></li>
                        <li><a><i class="fab fa-btc"></i>0</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="top-menu float-right">
                        <li><a href="{{ route('/') }}"><b>{{ config('app.name') }}</b></a></li>
                        <li><a href="{{ route('exchange') }}"><i class="fa fa-chart-bar"></i>&nbsp;{{ trans('common.top_menu.exchange') }}</a></li>
                        <li><a href="{{ route('dealer') }}"><i class="fa fa-money-bill-wave"></i>&nbsp;{{ trans('common.top_menu.dealer') }}</a></li>
                        @guest
                            <li><a href="{{ route('login') }}"><i class="icon-log-in"></i>&nbsp;{{ trans('common.top_menu.login') }}</a></li>
                            <li><a href="{{ route('register') }}"><i class="icon-user-plus"></i>&nbsp;{{ trans('common.top_menu.register') }}</a></li>
                        @else
                            <li>
                                <div class="p-dropdown no-float">
                                    <a href="#"><i class="icon-user"></i></a>
                                    <div class="p-dropdown-content background-black-dark border-panel">
                                        <ul>
                                            <li><a href="{{ route('home') }}">{{ trans('common.top_menu.dashboard') }}</a></li>
                                            <li><a href="{{ route('payment') }}">{{ trans('common.top_menu.payment') }}</a></li>
                                            <li><a href="{{ route('report') }}">{{ trans('common.top_menu.report') }}</a></li>
                                            <li><a href="{{ route('setting') }}">{{ trans('common.top_menu.setting') }}</a></li>
                                            <li><a href="{{ route('notifications') }}">{{ trans('common.top_menu.notification') }}</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endguest
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('js/socket.io.js') }}"></script>

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
</script>
@yield('script')
</body>
</html>
