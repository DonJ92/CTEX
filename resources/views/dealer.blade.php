@extends('layouts.trading')

@section('content')
    <section class="p-0 h-100" style="min-height: 500px;">
        <div class="row col-12 h-100 p-0 m-0">
            <div class="col-lg-2 border-panel">
                <div class="tabs">
                    <div class="tab-pane fade active show" id="order" role="tabpanel" aria-labelledby="order-tab">
                        <h5 class="mt-2 text-primary text-center"><b>Buy / Sell Crypto</b></h5>
                        <hr class="my-2">
                        <div class="row">
                            <div class="mt-3 col-lg-12 col-md-6">
                                <div class="form-group">
                                    <div class="row m-0">
                                        <div class="col-6 p-r-0"><button type="button" class="btn btn-light btn-light-hover btn-block buy-b-r">Buy</button></div>
                                        <div class="col-6 p-l-0"><button type="button" class="btn btn-danger btn-block sell-b-r">Sell</button></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">Available:</div>
                                    <div class="col-8 text-right"><h5>0.03 BTC</h5></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">Price:</div>
                                    <div class="col-8 text-right"><h5>47239.85&nbsp;<span class="text-info font-size-sm">+5.71%</span></h5></div>
                                </div>
                                <div class="form-group text-light">
                                    <div class="input-group">
                                        <span class="input-group-text font-size-xs input-dark-bg">Amount</span>
                                        <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text font-size-xs input-dark-bg">BTC</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group text-light">
                                    <div class="input-group">
                                        <span class="input-group-text font-size-xs input-dark-bg">Total</span>
                                        <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                        <span class="input-group-text font-size-xs input-dark-bg">USDT</span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-block">Order</button>
                                <hr class="my-4">
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group row">
                                    <div class="col-6"><h5 class="text-light">Symbol</h5></div>
                                    <div class="col-6 text-right"><h5 class="text-light">Balance</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/btc.svg') }}" width="24px" class="p-r-10"><b>BTC</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/eth.svg') }}" width="24px" class="p-r-10"><b>ETH</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/xrp.svg') }}" width="24px" class="p-r-10"><b>XRP</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/ltc.svg') }}" width="24px" class="p-r-10"><b>LTC</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/usdt.svg') }}" width="24px" class="p-r-10"><b>USDT</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/ada.svg') }}" width="24px" class="p-r-10"><b>ADA</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6"><img src="{{ asset('/icons/wiz+.svg') }}" width="24px" class="p-r-10"><b>WIZ+</b></div>
                                    <div class="col-6 text-right"><h5 class="text-light">0.00300024</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row mh-100">
                    <div class="col-lg-4 border-panel p-0">
                        <table id="ask_order_list" class="table table-dark font-size-sm">
                            <thead class="text-center">
                            <tr>
                                <th scope="col" class="p-10 no-border">Symbol</th>
                                <th scope="col" class="p-10 no-border">Buy / Sell</th>
                                <th scope="col" class="p-10 no-border">Amount</th>
                                <th scope="col" class="p-10 no-border">DateTime</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-info">Buy</td>
                                <td class="p-0 no-border">0.02</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">BTC/USDT</td>
                                <td class="p-0 no-border text-danger">Sell</td>
                                <td class="p-0 no-border">0.005</td>
                                <td class="p-0 no-border">2021/01/23 16:58:00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-8 border-panel p-0">
                        <!-- TradingView Widget BEGIN -->
                        <div id="crypto_chart" class=""></div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
                <div class="font-size-sm text-light row overflow-auto" id="list_tab">
                    <table id="trade_list" class="table table-dark trading-list" style="width:100%">
                        <thead>
                        <tr>
                            <th class="background-dark">Trade ID</th>
                            <th class="background-dark">Trade DateTime</th>
                            <th class="background-dark">Symbol</th>
                            <th class="background-dark">Type</th>
                            <th class="background-dark">Price</th>
                            <th class="background-dark">Amount</th>
                            <th class="background-dark">Fee</th>
                            <th class="background-dark">Status</th>
                            <th class="background-dark">Remark</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr><tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>182723</td>
                            <td>2021/01/23 16:58:00</td>
                            <td>BTCUSDT</td>
                            <td>Buy</td>
                            <td>48675.25</td>
                            <td>1.2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            $('#trade_list').DataTable({
                searching: false,
                viewCount: false,
                bLengthChange: false,
                language: {
                    "paginate": {
                        "first":      "<<",
                        "last":       ">>",
                        "next":       ">",
                        "previous":   "<"
                    },
                }
            })
        });
    </script>
@endsection