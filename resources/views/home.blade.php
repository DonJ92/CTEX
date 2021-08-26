@extends('layouts.dashboard')

@section('title', trans('dashboard.title'))

@section('content')
    <section id="page-content" class="sidebar-both background-dark">
    <div class="mx-3 body-min-height">
        <div class="row">
            <div class="col-lg-2 mb-5">
                <div class="widget p-cb background-black-dark border-panel" style="height: 100%;">
                    <div class="text-center m-t-20">
                        <div class="d-block form-group">
                            <img class="avatar avatar-lg" src="images/user-avatar.png">
                        </div>
                        <span>{{ auth()->user()->name }}</span>
                        <p class="text-muted">ID Verification: <i class="icon-check-circle text-success"></i> Not Verified</p>
                    </div>
                    <hr>
                    <div class="m-t-30">
                        <div class="form-group row">
                            <div class="col-6"><h5 class="text-light">Symbol</h5></div>
                            <div class="col-6"><h5 class="text-light text-right">Balance</h5></div>
                        </div>
                        @foreach($balance_list as $balance_info)
                        <div class="form-group row">
                            <div class="col-6"><img src="{{ $balance_info['ico'] }}" width="32px" class="p-r-10"><b>{{ $balance_info['currency'] }}</b></div>
                            <div class="col-6"><h5 class="text-light text-right">{{ $balance_info['balance'] }}</h5></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-7 content">
                <div class="widget p-cb background-dark no-border no-box-shadow p-0">
                    <section class="no-padding equalize" data-equalize-item=".text-box">
                        <div class="row col-no-margin">
                            <!--Box 1-->
                            <div class="col-lg-4 background-black-dark border-panel">
                                <a href="{{ route('exchange') }}">
                                    <div class="text-box">
                                        <i class="fa fa-chart-bar"></i>
                                        <h3>Trade </h3>
                                        <p>Exchange the Cryptocurrency</p>
                                    </div>
                                </a>
                            </div>
                            <!--End: Box 1-->
                            <!--Box 2-->
                            <div class="col-lg-4 background-black-dark border-panel">
                                <a href="{{ route('dealer') }}">
                                    <div class="text-box">
                                        <i class="fa fa-money-bill-wave"></i>
                                        <h3>Buy / Sell Crypto</h3>
                                        <p>Buy and Sell Cryptocurrency</p>
                                    </div>
                                </a>
                            </div>
                            <!--End: Box 2-->
                            <!--Box 3-->
                            <div class="col-lg-4 background-black-dark border-panel">
                                <a href="{{ route('payment') }}">
                                    <div class="text-box">
                                        <i class="fa fa-wallet"></i>
                                        <h3>Deposit / Withdraw</h3>
                                        <p>Deposit and Withdraw the Funds</p>
                                    </div>
                                </a>
                            </div>
                            <!--End: Box 3-->
                        </div>
                    </section>
                    <section class="no-padding equalize" data-equalize-item=".text-box">
                        <div class="row col-no-margin">
                            <!--Box 1-->
                            <div class="col-lg-4 background-black-dark border-panel">
                                <a href="{{ route('report') }}">
                                    <div class="text-box">
                                        <i class="fa fa-file-alt"></i>
                                        <h3>Report </h3>
                                        <p>Trading, Deposit, Withdraw History Report</p>
                                    </div>
                                </a>
                            </div>
                            <!--End: Box 1-->
                            <!--Box 2-->
                            <div class="col-lg-4 background-black-dark border-panel">
                                <a href="{{ route('setting') }}">
                                    <div class="text-box">
                                        <i class="fa fa-cog"></i>
                                        <h3>Setting</h3>
                                        <p>Platform Settings</p>
                                    </div>
                                </a>
                            </div>
                            <!--End: Box 2-->
                            <!--Box 3-->
                            <div class="col-lg-4 background-black-dark border-panel">
                                <a href="{{ route('faq') }}">
                                    <div class="text-box">
                                        <i class="fa fa-question-circle"></i></i>
                                        <h3>FAQ</h3>
                                        <p>Frequently Asked Questions</p>
                                    </div>
                                </a>
                            </div>
                            <!--End: Box 3-->
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget widget-notification p-cb background-black-dark border-panel">
                    <h4 class="widget-title text-primary">News</h4>
                    <hr>
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
                    <div class="text-center">
                        <a href="#" class="text-theme font-size-sm mx-auto">See all news</a>
                    </div>
                </div>
                <div class="widget widget-notification p-cb background-black-dark border-panel">
                    <h4 class="widget-title text-primary">Notifications</h4>
                    <hr>
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
                    <div class="text-center">
                        <a href="#" class="text-theme font-size-sm mx-auto">See all notifications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
