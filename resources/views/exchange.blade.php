@extends('layouts.trading')

@section('content')
    <section class="p-0 h-100" style="min-height: 500px;">
        <div class="row col-12 h-100 p-0 m-0">
            <div class="col-lg-2 border-panel">
                <div class="tabs text-light">
                    <ul class="nav nav-tabs no-border m-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-4 py-2 font-size-sm" id="home-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">注文</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-2 font-size-sm" id="profile-tab" data-bs-toggle="tab" href="#step" role="tab" aria-controls="step" aria-selected="false">取引一覧</a>
                        </li>
                    </ul>
                    <div class="tab-content font-size-sm" id="myTabContent">
                        <div class="tab-pane fade active show" id="order" role="tabpanel" aria-labelledby="order-tab">
                            <div class="tabs">
                                <nav class="nav nav-tabs nav-justified">
                                    <a class="nav-item nav-link active" id="limit-tab" data-bs-toggle="tab" href="#limit" role="tab" aria-controls="order" aria-selected="true">指値</a>
                                    <a class="nav-item nav-link" id="market-tab" data-bs-toggle="tab" href="#market" role="tab" aria-controls="step" aria-selected="false">成行</a>
                                </nav>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="limit" role="tabpanel" aria-labelledby="step-tab">
                                        <div class="form-group">
                                            <div class="row m-0">
                                                <div class="col-6 p-r-0"><button type="button" class="btn btn-info btn-block b-r-2">買い</button></div>
                                                <div class="col-6 p-l-0"><button type="button" class="btn btn-light btn-light-hover btn-block b-r-2">売り</button></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">価格</span>
                                                <input type="text" class="form-control form-control-sm text-light input-dark-bg" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text font-size-xs input-dark-bg">BTC/JPY</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">数量</span>
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
                                        <button type="button" class="btn btn-info btn-block">注文</button>
                                    </div>
                                    <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="step-tab">
                                        <div class="form-group">
                                            <div class="row m-0">
                                                <div class="col-6 p-r-0"><button type="button" class="btn btn-light btn-light-hover btn-block b-r-2">買い</button></div>
                                                <div class="col-6 p-l-0"><button type="button" class="btn btn-danger btn-block b-r-2">売り</button></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text font-size-xs input-dark-bg">数量</span>
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
                                        <button type="button" class="btn btn-danger btn-block">注文</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step" role="tabpanel" aria-labelledby="step-tab">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 border-panel p-0">
            <table id="ask_order_list" class="table table-dark font-size-sm">
                <thead class="text-center">
                <tr>
                    <th scope="col" class="p-10 no-border">Ask</th>
                    <th scope="col" class="p-10 no-border">価格</th>
                    <th scope="col" class="p-10 no-border">Bid</th>
                </tr>
                </thead>
                <tbody id="ask_order_list">
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border">0.0124</td>
                    <td class="p-1 no-border text-danger">45639.3</td>
                    <td class="p-1 no-border"></td>
                </tr>
                </tbody>
                <tbody>
                <tr class="text-center font-size-md">
                    <td colspan="3" class="p-1 no-border text-info">45639.3</td>
                </tr>
                </tbody>
                <tbody id="bid_order_list">
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                <tr class="text-center">
                    <td class="p-1 no-border"></td>
                    <td class="p-1 no-border text-info">45639.3</td>
                    <td class="p-1 no-border">0.0124</td>
                </tr>
                </tbody>
            </table>
        </div>
            <div class="col-lg-8 border-panel p-0">
                <!-- TradingView Widget BEGIN -->
                <div id="crypto_chart" class="h-75"></div>
                <!-- TradingView Widget END -->
                <div class="tabs text-light h-25 overflow-auto">
                    <ul class="nav nav-tabs no-border m-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-4 py-2 font-size-sm" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">注文一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-2 font-size-sm" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">取引一覧</a>
                        </li>
                    </ul>
                    <div class="tab-content font-size-sm overflow-auto" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-dark">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col" class="p-10">注文ID</th>
                                    <th scope="col" class="p-10">通貨ペア</th>
                                    <th scope="col" class="p-10">タイプ</th>
                                    <th scope="col" class="p-10">売/買</th>
                                    <th scope="col" class="p-10">数量</th>
                                    <th scope="col" class="p-10">価格</th>
                                    <th scope="col" class="p-10">約定数量</th>
                                    <th scope="col" class="p-10">平均価格</th>
                                    <th scope="col" class="p-10">注文日時</th>
                                    <th scope="col" class="p-10">ステータス</th>
                                    <th scope="col" class="p-10">キャンセル</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-dark">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col" class="p-10">注文ID</th>
                                    <th scope="col" class="p-10">通貨ペア</th>
                                    <th scope="col" class="p-10">タイプ</th>
                                    <th scope="col" class="p-10">売/買</th>
                                    <th scope="col" class="p-10">数量</th>
                                    <th scope="col" class="p-10">価格</th>
                                    <th scope="col" class="p-10">約定数量</th>
                                    <th scope="col" class="p-10">平均価格</th>
                                    <th scope="col" class="p-10">注文日時</th>
                                    <th scope="col" class="p-10">ステータス</th>
                                    <th scope="col" class="p-10">キャンセル</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="p-5">1</th>
                                    <td class="p-5">BTCUSDT</td>
                                    <td class="p-5">Type1</td>
                                    <td class="p-5">Buy</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">0.2</td>
                                    <td class="p-5">45639.3</td>
                                    <td class="p-5">2021/8/12 12:12:00</td>
                                    <td class="p-5"></td>
                                    <td class="p-5"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
