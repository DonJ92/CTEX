@extends('layouts.dashboard')

@section('content')
<div class="container body-min-height">
<!-- Page title -->
<section id="page-title" class="page-title-left text-light background-dark">
    <div class="container">
        <div class="page-title">
            <h1>Deposit / Withdraw</h1>
            <span>Deposit / Withdraw Description</span>
        </div>
    </div>
</section>
<!-- end: Page title -->
<hr>
<!-- Content -->
<section id="page-content" class="dark">
    <div class="container">
        <div class="tabs tabs-vertical">
            <div class="row">
                <div class="col-md-3 tab-border-right mb-3">
                    <ul class="nav flex-column nav-tabs border-1" id="cryptoTab" role="tablist" aria-orientation="vertical">
                        <li class="nav-item">
                            <a class="nav-link no-border active" id="btc-tab" data-bs-toggle="tab" href="#btc" role="tab" aria-controls="btc" aria-selected="true"><img src="{{ asset('/icons/btc.svg') }}" width="32px" class="p-r-10"><b>BTC</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><img src="{{ asset('/icons/eth.svg') }}" width="32px" class="p-r-10"><b>ETH</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="xrp-tab" data-bs-toggle="tab" href="#xrp" role="tab" aria-controls="xrp" aria-selected="false"><img src="{{ asset('/icons/xrp.svg') }}" width="32px" class="p-r-10"><b>XRP</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><img src="{{ asset('/icons/ltc.svg') }}" width="32px" class="p-r-10"><b>LTC</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><img src="{{ asset('/icons/usdt.svg') }}" width="32px" class="p-r-10"><b>USDT</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><img src="{{ asset('/icons/ada.svg') }}" width="32px" class="p-r-10"><b>ADA</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><img src="{{ asset('/icons/wiz+.svg') }}" width="32px" class="p-r-10"><b>WIZ+</b></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="myTabContent4">
                        <div class="tab-pane fade show active" id="btc" role="tabpanel" aria-labelledby="btc-tab">
                            <div class="tabs tabs-folder">
                                <ul class="nav nav-tabs" id="btc_payment_tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="btc-deposit-tab" data-bs-toggle="tab" href="#btc-deposit" role="tab" aria-controls="btc-deposit" aria-selected="true"><b>Deposit</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btc-withdraw-tab" data-bs-toggle="tab" href="#btc-withdraw" role="tab" aria-controls="btc-withdraw" aria-selected="false">Withdraw</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="btc_payment_content">
                                    <div class="tab-pane fade show active" id="btc-deposit" role="tabpanel" aria-labelledby="btc-deposit-tab">
                                        <h5>
                                            This is your Bitcoin deposit address.<br>
                                            Please copy or scan the QR code to use it.
                                        </h5>
                                        <br>
                                        <h4>Balance: <span class="text-primary">0.03BTC</span></h4>
                                        <h5>Minimal Deposit Amount: <span>0.001BTC</span> <p>You have to transfer funds larger than the minimal deposit amount</p></h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header background-black-dark">
                                                <span class="h4 mx-auto text-primary">Bitcoin Deposit Address</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-lg-8 mx-auto mt-5">
                                                    <div class="form-group mb-5 text-center">
                                                        <img class="mx-auto img-thumbnail" src="{{ asset('/images/QR.png') }}" width="300px">
                                                    </div>
                                                    <div class="form-inline">
                                                        <div class="input-group">
                                                            <input id="addr" type="text" disabled class="form-control widget-search-form text-light input-dark-bg" value="">
                                                            <span class="input-group-text input-dark-bg"><button class="no-border input-dark-bg text-light" data-clipboard="true" data-clipboard-target="#addr"><i class="icon-copy"></i></button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>※ Caution</h4>
                                        <p class="text-light">Please transfer funds to the correct Bitcoin address on the above. We are not responsible if you transfer funds to another address.</p>
                                    </div>
                                    <div class="tab-pane fade" id="btc-withdraw" role="tabpanel" aria-labelledby="btc-withdraw-tab">
                                        <h5>
                                            Please input an external Bitcoin address to withdraw to.
                                        </h5>
                                        <br>
                                        <h4>Balance: <span class="text-primary">0.03BTC</span></h4>
                                        <h5>Maximum Withdrawal Amount: <span>0.03BTC</span> <p>Your withdrawal funds can not be larger than the maximum withdrawal amount.</p></h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header background-black-dark">
                                                <span class="h4 mx-auto text-primary">Bitcoin Withdrawal Address</span>
                                            </div>
                                            <div class="card-body text-light text-center">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-lg-3 col-form-label">Bitcoin Address</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control text-light input-dark-bg" type="text" value="" id="btc_addr">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-lg-3 col-form-label">Withdrawal Amount</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control text-light input-dark-bg" type="text" value="" id="amount">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn m-t-30 mt-3">Withdraw</button>
                                            </div>
                                        </div>
                                        <h4>※ Caution</h4>
                                        <p class="text-light">Please input the correct Bitcoin withdrawal address. We are not responsible if your withdrawal address is invalid.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="eth" role="tabpanel" aria-labelledby="eth-tab">
                            <div class="tabs tabs-folder">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="btc-deposit-tab" data-bs-toggle="tab" href="#btc-deposit" role="tab" aria-controls="btc-deposit" aria-selected="true"><b>Deposit</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btc-transfer-tab" data-bs-toggle="tab" href="#btc-transfer" role="tab" aria-controls="btc-transfer" aria-selected="false">Withdraw</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade show active" id="btc-deposit" role="tabpanel" aria-labelledby="btc-deposit-tab">
                                        <h5>
                                            This is your Bitcoin deposit address.<br>
                                            Please copy or scan the QR code to use it.
                                        </h5>
                                        <br>
                                        <h4>Balance: <span class="text-primary">0.03BTC</span></h4>
                                        <h5>Minimal Deposit Amount: <span>0.001BTC</span> <p>You have to transfer funds larger than the minimal deposit amount</p></h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header background-black-dark">
                                                <span class="h4 mx-auto text-primary">Bitcoin Deposit Address</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-lg-8 mx-auto mt-5">
                                                    <div class="form-group mb-5 text-center">
                                                        <img class="mx-auto img-thumbnail" src="{{ asset('/images/QR.png') }}" width="300px">
                                                    </div>
                                                    <div class="form-inline">
                                                        <div class="input-group">
                                                            <input id="addr" type="text" disabled class="form-control widget-search-form text-light input-dark-bg" value="">
                                                            <span class="input-group-text input-dark-bg"><button class="no-border input-dark-bg text-light" data-clipboard="true" data-clipboard-target="#addr"><i class="icon-copy"></i></button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>※ Caution</h4>
                                        <p class="text-light">Please transfer funds to the correct Bitcoin address on the above. We are not responsible if you transfer funds to another address.</p>
                                    </div>
                                    <div class="tab-pane fade" id="btc-transfer" role="tabpanel" aria-labelledby="btc-transfer-tab">
                                        <h5>
                                            Please input an external Bitcoin address to withdraw to.
                                        </h5>
                                        <br>
                                        <h4>Balance: <span class="text-primary">0.03BTC</span></h4>
                                        <h5>Maximum Withdrawal Amount: <span>0.03BTC</span> <p>Your withdrawal funds can not be larger than the maximum withdrawal amount.</p></h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header background-black-dark">
                                                <span class="h4 mx-auto text-primary">Bitcoin Withdrawal Address</span>
                                            </div>
                                            <div class="card-body text-light">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-3 col-form-label">Bitcoin Address</label>
                                                    <div class="col-9">
                                                        <input class="form-control text-light input-dark-bg" type="text" value="" id="btc_addr">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-3 col-form-label">Withdrawal Amount</label>
                                                    <div class="col-9">
                                                        <input class="form-control text-light input-dark-bg" type="text" value="" id="amount">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block btn-primary">Withdraw</button>
                                            </div>
                                        </div>
                                        <h4>※ Caution</h4>
                                        <p class="text-light">Please input the correct Bitcoin withdrawal address. We are not responsible if your withdrawal address is invalid.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="xrp" role="tabpanel" aria-labelledby="xrp-tab">
                            <div class="tabs tabs-folder">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="btc-deposit-tab" data-bs-toggle="tab" href="#btc-deposit" role="tab" aria-controls="btc-deposit" aria-selected="true"><b>Deposit</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btc-transfer-tab" data-bs-toggle="tab" href="#btc-transfer" role="tab" aria-controls="btc-transfer" aria-selected="false">Withdraw</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade show active" id="btc-deposit" role="tabpanel" aria-labelledby="btc-deposit-tab">
                                        <h5>
                                            This is your Bitcoin deposit address.<br>
                                            Please copy or scan the QR code to use it.
                                        </h5>
                                        <br>
                                        <h4>Balance: <span class="text-primary">0.03BTC</span></h4>
                                        <h5>Minimal Deposit Amount: <span>0.001BTC</span> <p>You have to transfer funds larger than the minimal deposit amount</p></h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header background-black-dark">
                                                <span class="h4 mx-auto text-primary">Bitcoin Deposit Address</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-lg-8 mx-auto mt-5">
                                                    <div class="form-group mb-5 text-center">
                                                        <img class="mx-auto img-thumbnail" src="{{ asset('/images/QR.png') }}" width="300px">
                                                    </div>
                                                    <div class="form-inline">
                                                        <div class="input-group">
                                                            <input id="addr" type="text" disabled class="form-control widget-search-form text-light input-dark-bg" value="">
                                                            <span class="input-group-text input-dark-bg"><button class="no-border input-dark-bg text-light" data-clipboard="true" data-clipboard-target="#addr"><i class="icon-copy"></i></button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>※ Caution</h4>
                                        <p class="text-light">Please transfer funds to the correct Bitcoin address on the above. We are not responsible if you transfer funds to another address.</p>
                                    </div>
                                    <div class="tab-pane fade" id="btc-transfer" role="tabpanel" aria-labelledby="btc-transfer-tab">
                                        <h5>
                                            Please input an external Bitcoin address to withdraw to.
                                        </h5>
                                        <br>
                                        <h4>Balance: <span class="text-primary">0.03BTC</span></h4>
                                        <h5>Maximum Withdrawal Amount: <span>0.03BTC</span> <p>Your withdrawal funds can not be larger than the maximum withdrawal amount.</p></h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header background-black-dark">
                                                <span class="h4 mx-auto text-primary">Bitcoin Withdrawal Address</span>
                                            </div>
                                            <div class="card-body text-light">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-3 col-form-label">Bitcoin Address</label>
                                                    <div class="col-9">
                                                        <input class="form-control text-light input-dark-bg" type="text" value="" id="btc_addr">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-3 col-form-label">Withdrawal Amount</label>
                                                    <div class="col-9">
                                                        <input class="form-control text-light input-dark-bg" type="text" value="" id="amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>※ Caution</h4>
                                        <p class="text-light">Please input the correct Bitcoin withdrawal address. We are not responsible if your withdrawal address is invalid.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection