@extends('layouts.trading')

@section('content')
    <section class="p-0 h-100" style="min-height: 500px;">
        <div class="row col-12 h-100 p-0 m-0">
            <div class="col-lg-2 border-panel">
                <div class="tabs text-light">
                    <ul class="nav nav-tabs no-border m-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-4 py-2 font-size-sm" id="home-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-2 font-size-sm" id="profile-tab" data-bs-toggle="tab" href="#step" role="tab" aria-controls="step" aria-selected="false">取引一覧</a>
                        </li>
                    </ul>
                    <div class="tab-content font-size-sm" id="myTabContent">
                        <div class="tab-pane fade active show" id="order" role="tabpanel" aria-labelledby="order-tab">
                            <div class="tabs">
                                <nav class="nav nav-tabs nav-justified">
                                    <a class="nav-item nav-link active" id="limit-tab" data-bs-toggle="tab" href="#limit" role="tab" aria-controls="order" aria-selected="true">Limit</a>
                                    <a class="nav-item nav-link" id="market-tab" data-bs-toggle="tab" href="#market" role="tab" aria-controls="step" aria-selected="false">Market</a>
                                </nav>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="limit" role="tabpanel" aria-labelledby="step-tab">
                                        <div class="form-group">
                                            <div class="row m-0">
                                                <div class="col-6 p-r-0"><button type="button" class="btn btn-info btn-block b-r-2">Buy</button></div>
                                                <div class="col-6 p-l-0"><button type="button" class="btn btn-light btn-light-hover btn-block b-r-2">Sell</button></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">Price</span>
                                                <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text font-size-xs input-dark-bg">BTC/JPY</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">Amount</span>
                                                <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text font-size-xs input-dark-bg">BTC</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">予想</span>
                                                <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text font-size-xs input-dark-bg">JPY</span>
                                            </div>
                                        </div>
                                        <div class="form-group range-color-info">
                                            <input type="hidden" id="range_slider_limit"/>
                                        </div>
                                        <button type="button" class="btn btn-info btn-block">Order</button>
                                    </div>
                                    <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="step-tab">
                                        <div class="form-group">
                                            <div class="row m-0">
                                                <div class="col-6 p-r-0"><button type="button" class="btn btn-light btn-light-hover btn-block b-r-2">Buy</button></div>
                                                <div class="col-6 p-l-0"><button type="button" class="btn btn-danger btn-block b-r-2">Sell</button></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">Amount</span>
                                                <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text font-size-xs input-dark-bg">BTC</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">予想</span>
                                                <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text font-size-xs input-dark-bg">JPY</span>
                                            </div>
                                        </div>
                                        <div class="form-group range-color-info">
                                            <input type="hidden" id="range_slider_market"/>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-block">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step" role="tabpanel" aria-labelledby="step-tab">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row mh-100">
                    <div class="col-lg-3 border-panel p-0">
                        <table id="ask_order_list" class="table table-dark font-size-sm">
                            <thead class="text-center">
                            <tr>
                                <th scope="col" class="p-10 no-border">Ask</th>
                                <th scope="col" class="p-10 no-border">Price</th>
                                <th scope="col" class="p-10 no-border">Bid</th>
                            </tr>
                            </thead>
                            <tbody id="ask_order_list">
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border">0.0124</td>
                                <td class="p-0 no-border text-danger">45639.3</td>
                                <td class="p-0 no-border"></td>
                            </tr>
                            </tbody>
                            <tbody>
                            <tr class="text-center font-size-lg">
                                <td colspan="3" class="p-1 no-border text-info">45639.3</td>
                            </tr>
                            </tbody>
                            <tbody id="bid_order_list">
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            <tr class="text-center">
                                <td class="p-0 no-border"></td>
                                <td class="p-0 no-border text-info">45639.3</td>
                                <td class="p-0 no-border">0.0124</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-9 border-panel p-0">
                        <!-- TradingView Widget BEGIN -->
                        <div id="crypto_chart" class=""></div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
                <div class="tabs text-light row" id="list_tab">
                    <ul class="nav nav-tabs no-border m-0" id="list_tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-4 py-2 font-size-sm" id="order-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">Order List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-2 font-size-sm" id="trade-tab" data-bs-toggle="tab" href="#trade" role="tab" aria-controls="trade" aria-selected="false">Trade List</a>
                        </li>
                    </ul>
                    <div class="tab-content font-size-sm overflow-auto" id="myTabContent">
                        <div class="tab-pane fade active show" id="order" role="tabpanel" aria-labelledby="order-tab">
                            <table id="order_list" class="table table-dark" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="background-dark">Order ID</th>
                                    <th class="background-dark">Order DateTime</th>
                                    <th class="background-dark">Order Type</th>
                                    <th class="background-dark">Symbol</th>
                                    <th class="background-dark">Type</th>
                                    <th class="background-dark">Price</th>
                                    <th class="background-dark">Amount</th>
                                    <th class="background-dark">Status</th>
                                    <th class="background-dark">Remark</th>
                                    <th class="background-dark">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>182723</td>
                                    <td>2021/01/23 16:58:00</td>
                                    <td>Market</td>
                                    <td>BTCUSDC</td>
                                    <td>Buy</td>
                                    <td>48675.25</td>
                                    <td>1.2</td>
                                    <td>Pending</td>
                                    <td></td>
                                    <td>
                                        <a class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Cancel"><i class="icon-delete"></i></a>
                                        <a class="ms-2 text-reset" href="#" data-bs-toggle="tooltip" data-bs-original-title="Settle"><i class="icon-x"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="trade" role="tabpanel" aria-labelledby="trade-tab">
                            <table id="trade_list" class="table table-dark" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="background-dark">Order ID</th>
                                    <th class="background-dark">Order DateTime</th>
                                    <th class="background-dark">Settle DateTime</th>
                                    <th class="background-dark">Order Type</th>
                                    <th class="background-dark">Symbol</th>
                                    <th class="background-dark">Type</th>
                                    <th class="background-dark">Order Price</th>
                                    <th class="background-dark">Settle Price</th>
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
                                    <td>2021/01/24 16:58:00</td>
                                    <td>Market</td>
                                    <td>BTCUSDC</td>
                                    <td>Buy</td>
                                    <td>48675.25</td>
                                    <td>48690.25</td>
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
        </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            $('#trade_list').DataTable({
                responsive: true,
                searching: false,
                viewCount: false,
                bLengthChange: false,
                "language": {
                    "info": "すべてのお取引_TOTAL_の中で_START_から_END_まで",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "次へ",
                        "previous": "前へ"
                    },
                }
            });

            $('#order_list').DataTable({
                responsive: true,
                searching: false,
                viewCount: false,
                bLengthChange: false,
                "language": {
                    "info": "すべてのお取引_TOTAL_の中で_START_から_END_まで",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "次へ",
                        "previous": "前へ"
                    },
                }
            });
        });
    </script>
@endsection