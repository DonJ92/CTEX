@extends('layouts.dashboard')

@section('content')
    <div class="container body-min-height">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-light background-dark">
            <div class="container">
                <div class="page-title">
                    <h1>Setting</h1>
                    <span>Setting Description</span>
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
                                    <a class="nav-link no-border active" id="btc-tab" data-bs-toggle="tab" href="#btc" role="tab" aria-controls="btc" aria-selected="true"><b>Account Info</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="xrp-tab" data-bs-toggle="tab" href="#xrp" role="tab" aria-controls="xrp" aria-selected="false"><b>Change Password</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>Security</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>Partner Service</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>LoginHistory / IP</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="eth-tab" data-bs-toggle="tab" href="#eth" role="tab" aria-controls="eth" aria-selected="false"><b>Language</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content" id="myTabContent4">
                                <div class="tab-pane fade show active" id="btc" role="tabpanel" aria-labelledby="btc-tab">
                                    <div class="tabs tabs-folder">
                                        <div class="widget p-cb background-dark">
                                            <div class="card background-dark">
                                                <div class="card-header background-black-dark">
                                                    <span class="h4 mx-auto text-primary">Account Info</span>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-4">Account ID</div>
                                                        <div class="col-8">abcdefg1234567</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-4">Buy/Sell Cryptocurrency</div>
                                                        <div class="col-8">利用可</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-4">Lightning FX Futures</div>
                                                        <div class="col-8">利用不可</div>
                                                    </div>
                                                </div>
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