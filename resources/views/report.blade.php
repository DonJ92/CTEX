@extends('layouts.dashboard')

@section('content')
<div class="container-fluid body-min-height">
    <!-- Page title -->
    <section id="page-title" class="page-title-left text-light background-dark">
        <div class="container-fluid">
            <div class="page-title">
                <h1>Report</h1>
                <span>You could confirm trade, deposit, withdraw history and search, export data.</span>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <hr>
    <!-- Content -->
    <section id="page-content" class="dark">
        <div class="container-fluid">
            <div class="tabs tabs-vertical">
                <div class="row">
                    <div class="col-md-2 tab-border-right mb-3">
                        <ul class="nav flex-column nav-tabs border-1" id="myTab4" role="tablist" aria-orientation="vertical">
                            <li class="nav-item">
                                <a class="nav-link no-border active" id="trade-tab" data-bs-toggle="tab" href="#trade" role="tab" aria-controls="trade" aria-selected="true"><b>Trade</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link no-border" id="deposit-tab" data-bs-toggle="tab" href="#deposit" role="tab" aria-controls="deposit" aria-selected="true"><b>Deposit</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link no-border" id="withdraw-tab" data-bs-toggle="tab" href="#withdraw" role="tab" aria-controls="withdraw" aria-selected="true"><b>Withdraw</b></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div class="tab-content" id="myTabContent4">
                            <div class="tab-pane fade show active" id="trade" role="tabpanel" aria-labelledby="trade-tab">
                                <div class="form-group row">
                                    <div class="col-lg-3 form-group"><input class="form-control text-light input-dark-bg" type="date" id="from_date"></div>
                                    <div class="col-lg-3 form-group"><input class="form-control text-light input-dark-bg" type="date" id="to_date"></div>
                                    <div class="col-lg-3 form-group">
                                        <select id="inputState" class="form-select text-light input-dark-bg">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-dark font-size-sm overflow-auto" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="background-black-dark">Trade ID</th>
                                        <th class="background-black-dark">Type</th>
                                        <th class="background-black-dark">Order DateTime</th>
                                        <th class="background-black-dark">Order Price</th>
                                        <th class="background-black-dark">Symbol</th>
                                        <th class="background-black-dark">Order Type</th>
                                        <th class="background-black-dark">Settle DateTime</th>
                                        <th class="background-black-dark">Settle Price</th>
                                        <th class="background-black-dark">Settle Amount</th>
                                        <th class="background-black-dark">Fee</th>
                                        <th class="background-black-dark">Status</th>
                                        <th class="background-black-dark">Remark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Tx-28477348</td>
                                        <td>Trade</td>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>43562.54</td>
                                        <td>BTCUSDT</td>
                                        <td>BUY</td>
                                        <td>2021/01/24 16:58:00</td>
                                        <td>43852.54</td>
                                        <td>3</td>
                                        <td>21.5</td>
                                        <td>Settle</td>
                                        <td></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                                <div class="form-group row">
                                    <div class="col-lg-3 form-group"><input class="form-control text-light input-dark-bg" type="date" id="from_date"></div>
                                    <div class="col-lg-3 form-group"><input class="form-control text-light input-dark-bg" type="date" id="to_date"></div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </div>
                                </div>
                                <table id="deposit_history_tbl" class="table table-dark font-size-sm" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="background-black-dark">DateTime</th>
                                        <th class="background-black-dark">Symbol</th>
                                        <th class="background-black-dark">Amount</th>
                                        <th class="background-black-dark">Deposit Address</th>
                                        <th class="background-black-dark">Tx_ID</th>
                                        <th class="background-black-dark">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                    </tr>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
                                <div class="form-group row">
                                    <div class="col-lg-3 form-group"><input class="form-control text-light input-dark-bg" type="date" id="from_date"></div>
                                    <div class="col-lg-3 form-group"><input class="form-control text-light input-dark-bg" type="date" id="to_date"></div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </div>
                                </div>
                                <table id="withdraw_history_tbl" class="table table-dark font-size-sm overflow-auto" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="background-black-dark">DateTime</th>
                                        <th class="background-black-dark">Symbol</th>
                                        <th class="background-black-dark">Amount</th>
                                        <th class="background-black-dark">Withdraw Address</th>
                                        <th class="background-black-dark">Tx_ID</th>
                                        <th class="background-black-dark">Status</th>
                                        <th class="background-black-dark">Remark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2021/01/23 16:58:00</td>
                                        <td>BTC</td>
                                        <td>1.0</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe</td>
                                        <td>0x4832hjd028eje202e8fehj20e28fe8hj2fe82fe349jdsjdsdsdsfds</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="form-group col-lg-12">
                <button type="button" class="btn btn-info"><i class="fa fa-download"></i> Trading Report Download</button>
            </div>-->
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    $('#datatable').DataTable({
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

    $('#deposit_history_tbl').DataTable({
        responsive: true,
        searching: false,
        viewCount: false,
        bLengthChange: false,
    });

    $('#withdraw_history_tbl').DataTable({
        responsive: true,
        searching: false,
        viewCount: false,
        bLengthChange: false,
    });
</script>
@endsection