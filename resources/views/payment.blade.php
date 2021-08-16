@extends('layouts.dashboard')

@section('content')
<div class="container body-min-height">
<!-- Page title -->
<section id="page-title" class="page-title-left text-light background-dark">
    <div class="container">
        <div class="page-title">
            <h1>入出金</h1>
            <span>入出金関連説明</span>
        </div>
    </div>
</section>
<!-- end: Page title -->
<!-- Content -->
<section id="page-content" class="dark">
    <div class="container">
        <div class="tabs tabs-vertical">
            <div class="row">
                <div class="col-md-3 tab-border-right">
                    <ul class="nav flex-column nav-tabs border-1" id="myTab4" role="tablist" aria-orientation="vertical">
                        <li class="nav-item">
                            <a class="nav-link no-border active" id="btc-tab" data-bs-toggle="tab" href="#btc" role="tab" aria-controls="btc" aria-selected="true"><b>ビットコイン</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="xrp-tab" data-bs-toggle="tab" href="#xrp" role="tab" aria-controls="xrp" aria-selected="false"><b>リップル</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>イーサリアム</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>テゾス</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>ステラルーメン</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>ネム</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>イーサクラシック</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>リスク</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>ファイルコイン</b></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="myTabContent4">
                        <div class="tab-pane fade show active" id="btc" role="tabpanel" aria-labelledby="btc-tab">
                            <div class="tabs tabs-folder">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="btc-deposit-tab" data-bs-toggle="tab" href="#btc-deposit" role="tab" aria-controls="btc-deposit" aria-selected="true"><b>預入</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="btc-transfer-tab" data-bs-toggle="tab" href="#btc-transfer" role="tab" aria-controls="btc-transfer" aria-selected="false">送付</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade show active" id="btc-deposit" role="tabpanel" aria-labelledby="btc-deposit-tab">
                                        <h5>
                                            お客様の ビットコイン 預入用アドレスです。<br>
                                            コピーするか、2次元バーコードをスキャンしてご利用ください。
                                        </h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header">
                                                <span class="h4 mx-auto text-primary">お客様用ビットコインアドレス</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-lg-8 mx-auto mt-5">
                                                    <div class="form-group mb-5 text-center">
                                                        <img class="mx-auto img-thumbnail" src="{{ asset('/images/QR.png') }}" width="300px">
                                                    </div>
                                                    <div class="form-inline">
                                                        <div class="input-group">
                                                            <input id="addr" type="text" class="form-control widget-search-form" value="">
                                                            <span class="input-group-text"><button class="no-border" data-clipboard="true" data-clipboard-target="#addr"><i class="icon-copy"></i></button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4>ご注意点</h4>
                                        <p class="text-light">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト テキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                    </div>
                                    <div class="tab-pane fade" id="btc-transfer" role="tabpanel" aria-labelledby="btc-transfer-tab">
                                        <h5>
                                            送付先の外部ビットコインアドレスを選択してください。
                                        </h5>
                                        <hr>
                                        <div class="card background-dark">
                                            <div class="card-header">
                                                <span class="h4 mx-auto text-primary">ビットコインアドレス</span>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                        </div>
                                        <h4>ご注意点</h4>
                                        <p class="text-light">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト テキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="xrp" role="tabpanel" aria-labelledby="xrp-tab">
                            <p>Omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                            </p>
                            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt
                                mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        </div>
                        <div class="tab-pane fade" id="eth" role="tabpanel" aria-labelledby="eth-tab">
                            <p>Soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis
                                aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection