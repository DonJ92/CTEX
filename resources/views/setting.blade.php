@extends('layouts.dashboard')

@section('title', trans('setting.title'))

@section('content')
    <div class="container body-min-height">
        <!-- Page title -->
        <section id="page-title" class="page-title-left text-light background-dark">
            <div class="container">
                <div class="page-title">
                    <h1>{{ trans('setting.page_title') }}</h1>
                    <span>{{ trans('setting.page_title_desc') }}</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <hr>
        <!-- Content -->
        @if ($errors->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section id="page-content" class="dark">
            <div class="container">
                <div class="tabs tabs-vertical">
                    <div class="row">
                        <div class="col-md-3 tab-border-right mb-3">
                            <ul class="nav flex-column nav-tabs border-1" id="setting_tab" role="tablist" aria-orientation="vertical">
                                <li class="nav-item">
                                    <a class="nav-link no-border active" id="account_info-tab" data-bs-toggle="tab" href="#account_info" role="tab" aria-controls="account_info" aria-selected="true"><b>{{ trans('setting.account_info') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="change_password-tab" data-bs-toggle="tab" href="#change_password" role="tab" aria-controls="change_password" aria-selected="false"><b>{{ trans('setting.change_pwd') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="id_verify-tab" data-bs-toggle="tab" href="#id_verify" role="tab" aria-controls="id_verify" aria-selected="false"><b>{{ trans('setting.id_verify') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="step_auth-tab" data-bs-toggle="tab" href="#step_auth" role="tab" aria-controls="step_auth" aria-selected="false"><b>{{ trans('setting.step_auth') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="download-tab" data-bs-toggle="tab" href="#download" role="tab" aria-controls="download" aria-selected="false"><b>{{ trans('setting.data_download') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="login_history-tab" data-bs-toggle="tab" href="#login_history" role="tab" aria-controls="login_history" aria-selected="false"><b>{{ trans('setting.login_history') }}</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="language-tab" data-bs-toggle="tab" href="#language" role="tab" aria-controls="language" aria-selected="false"><b>{{ trans('setting.language') }}</b></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content" id="setting_tab_content">
                                <div class="tab-pane fade show active" id="account_info" role="tabpanel" aria-labelledby="account_info-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">Account Info</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 text-center mb-3">
                                                    <img src="{{ asset('images/user-avatar.png') }}" class="avatar avatar-xl">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6">{{ trans('setting.login_id')  }}</div>
                                                        <div class="col-lg-8 col-6">{{ auth()->user()->login_id }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6">{{ trans('setting.email')  }}</div>
                                                        <div class="col-lg-8 col-6">{{ auth()->user()->email }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6">Identity Verification</div>
                                                        <div class="col-lg-8 col-6">
                                                            @if(auth()->user()->kyc_status == config('constants.kyc_status.not_verified'))
                                                                <i class="icon-x-circle text-danger"></i>&nbsp;{{ trans('common.kyc_status.not_verified') }}
                                                            @elseif(auth()->user()->kyc_status == config('constants.kyc_status.verified'))
                                                                <i class="icon-check-circle text-success"></i>&nbsp;{{ trans('common.kyc_status.verified') }}
                                                            @elseif(auth()->user()->kyc_status == config('constants.kyc_status.review'))
                                                                <i class="icon-airplay text-info">&nbsp;</i>{{ trans('common.kyc_status.review') }}
                                                            @elseif(auth()->user()->kyc_status == config('constants.kyc_status.failed'))
                                                                <i class="icon-x-circle text-danger"></i>&nbsp;{{ trans('common.kyc_status.failed') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6">2-Step Verification</div>
                                                        <div class="col-lg-8 col-6">
                                                            @if(auth()->user()->use_google_auth == config('constants.step_auth_status.no_use'))
                                                                <i class="icon-x-circle text-danger"></i>&nbsp;{{ trans('common.step_auth_status.no_use') }}
                                                            @elseif(auth()->user()->use_google_auth == config('constants.step_auth_status.use'))
                                                                <i class="icon-check-circle text-success"></i>&nbsp;{{ trans('common.step_auth_status.use') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">Account Info Update</span>
                                        </div>
                                        <div class="card-body">
                                            <form method="Post" class="form-validate mt-5" action="{{ route('setting.updateprofile') }}">
                                                @csrf

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="avatar" class="text-light">Photo</label>
                                                        <input type="file" class="form-control-file" name="avatar">
                                                        @error('avatar')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name" class="text-light">{{ trans('setting.name') }}</label>
                                                        <input type="text" class="form-control text-light input-dark-bg @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : auth()->user()->name}}" placeholder="{{ trans('setting.name') }}" autofocus>
                                                        @error('name')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="gender" class="text-light">{{ trans('setting.gender') }}</label>
                                                        <select class="form-select text-light input-dark-bg" name="gender">
                                                            <option>Select your gender</option>
                                                            @foreach($gender_list as $gender_info)
                                                                <option value="{{ $gender_info['id'] }}" @if( (old('gender') ? old('gender') : auth()->user()->gender) == $gender_info['id']) selected @endif>{{ trans('common.gender.'.$gender_info['gender']) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="birthday" class="text-light">{{ trans('setting.birthday') }}</label>
                                                        <input class="form-control text-light input-dark-bg @error('birthday') is-invalid @enderror" type="date" name="birthday" value="{{ old('birthday') ? old('birthday') : auth()->user()->birthday}}">
                                                        @error('birthday')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="mobile" class="text-light">{{ trans('setting.mobile') }}</label>
                                                        <input class="form-control text-light input-dark-bg @error('mobile') is-invalid @enderror" type="tel" name="mobile" placeholder="{{ trans('register.mobile') }}" value="{{ old('mobile') ? old('mobile') : auth()->user()->mobile}}">
                                                        @error('mobile')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="country" class="text-light">{{ trans('setting.country') }}</label>
                                                        <select name="country" class="form-select text-light input-dark-bg @error('country') is-invalid @enderror">
                                                            <option value="">{{ trans('register.country_placeholder') }}</option>
                                                            @foreach($country_list as $country_info)
                                                                <option value="{{ $country_info['name'] }}" @if( (old('country') ? old('country') : auth()->user()->country) == $country_info['name']) selected @endif>{{ $country_info['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('country')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="state" class="text-light">{{ trans('register.lang') }}</label>
                                                        <select name="lang" class="form-select text-light input-dark-bg @error('lang') is-invalid @enderror">
                                                            <option value="">{{ trans('register.lang_placeholder') }}</option>
                                                            @foreach($language_list as $language_info)
                                                                <option value="{{ $language_info['code'] }}" @if( (old('lang') ? old('lang') : auth()->user()->lang) == $language_info['code']) selected @endif>{{ $language_info['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('lang')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="address" class="text-light">{{ trans('setting.address') }}</label>
                                                        <input type="text" class="form-control text-light input-dark-bg @error('address') is-invalid @enderror" name="address" placeholder="{{ trans('setting.address') }}" value="{{ old('address') ? old('address') : auth()->user()->address }}">
                                                        @error('address')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="postal_code" class="text-light">{{ trans('setting.postal_code') }}</label>
                                                        <input type="text" class="form-control text-light input-dark-bg @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="{{ trans('setting.postal_code') }}" value="{{ old('postal_code') ? old('postal_code') : auth()->user()->postal_code }}">
                                                        @error('postal_code')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn m-t-30 mt-3">{{ trans('buttons.save') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="change_password-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">{{ trans('setting.change_pwd') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('setting.updatepassword') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="current_password" class="col-lg-4 col-form-label text-light">{{ trans('setting.current_pwd') }}</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control input-dark-bg text-light @error('current_password') is-invalid @enderror" type="password" value="{{ old('current_password') }}" name="current_password" placeholder="{{ trans('setting.current_pwd') }}">
                                                        @error('current_password')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-lg-4 col-form-label text-light">{{ trans('setting.new_pwd') }}</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control input-dark-bg text-light @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}" name="password" placeholder="{{ trans('setting.new_pwd') }}">
                                                        @error('password')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-lg-4 col-form-label text-light">{{ trans('setting.new_pwd_confirm') }}</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control input-dark-bg text-light @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ trans('setting.new_pwd_confirm') }}">
                                                        @error('password_confirmation')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn m-t-30 mt-3 mx-auto">{{ trans('buttons.save') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="id_verify" role="tabpanel" aria-labelledby="id_verify-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">{{ trans('setting.id_verify') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group row">
                                                    <div class="col-lg-4 col-6">{{ trans('setting.id_verify') }}</div>
                                                    <div class="col-lg-8 col-6">
                                                        @if(auth()->user()->kyc_status == config('constants.kyc_status.not_verified'))
                                                            <i class="icon-x-circle text-danger"></i>&nbsp;{{ trans('common.kyc_status.not_verified') }}
                                                        @elseif(auth()->user()->kyc_status == config('constants.kyc_status.verified'))
                                                            <i class="icon-check-circle text-success"></i>&nbsp;{{ trans('common.kyc_status.verified') }}
                                                        @elseif(auth()->user()->kyc_status == config('constants.kyc_status.review'))
                                                            <i class="icon-airplay text-info">&nbsp;</i>{{ trans('common.kyc_status.review') }}
                                                        @elseif(auth()->user()->kyc_status == config('constants.kyc_status.failed'))
                                                            <i class="icon-x-circle text-danger"></i>&nbsp;{{ trans('common.kyc_status.failed') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card background-dark @if(auth()->user()->kyc_status == config('constants.kyc_status.verified')) d-none @endif">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">{{ trans('setting.upload_id_title') }}</span>
                                        </div>
                                        <div class="card-body">
                                            <p>{{ trans('setting.upload_id_desc') }}<p>
                                            <p>{{ trans('setting.upload_id_warning1') }}<br>
                                                {{ trans('setting.upload_id_warning2') }}
                                            </p>
                                            <form id="id_verify_form" class="form-validate mt-3" method="POST" enctype="multipart/form-data" action="{{ route('setting.idverify') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="Doc" class="col-lg-4 col-form-label text-light">{{ trans('setting.id_doc') }}</label>
                                                    <div class="col-lg-8">
                                                        <input type="file" class="form-control-file" name="id_doc">
                                                        @error('id_doc')
                                                            <div class="is-invalid">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn mx-auto">{{ trans('buttons.upload') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="step_auth" role="tabpanel" aria-labelledby="step_auth-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">2-Step Verification</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <div class="form-group row">
                                                <label for="step_switch" class="col-lg-4 col-6 col-form-label">Identify Doc</label>
                                                <div class="col-lg-8 col-6">
                                                    <input data-switch="true" data-on-color="success" data-off-color="secondary" id="step_switch" type="checkbox">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-8 mt-5 mx-auto text-center">
                                                <p>Please read the QR code below from the authentication app and enter the displayed 6-digit authentication code.</p>
                                                <div class="form-group">
                                                    <img class="mx-auto img-thumbnail mb-5" src="{{ asset('/images/QR.png') }}" width="300px">
                                                    <div class="row">
                                                        <div class="form-group col-lg-8">
                                                            <input type="text" class="form-control text-light input-dark-bg" name="verification_code" placeholder="Verification Code" required="" autofocus>
                                                        </div>
                                                        <div class="form-group col-lg-4 text-center">
                                                            <button type="submit" class="btn">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">{{ trans('setting.data_download') }}</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <h5>{{ trans('setting.data_download_desc') }}</h5>
                                            <div class="overflow-auto p-15">
                                                <table id="data_list_tbl" class="table table-dark font-size-sm" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="background-black-dark">{{ trans('setting.data_title') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.file_name') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.register_datetime') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.download') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="login_history" role="tabpanel" aria-labelledby="login_history-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">{{ trans('setting.login_history') }}</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <h5>Please check your login history.</h5>
                                            <div class="overflow-auto p-15">
                                                <table id="login_history_tbl" class="table table-dark font-size-sm" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="background-black-dark">{{ trans('setting.ip') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.device') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.platform') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.region') }}</th>
                                                        <th class="background-black-dark">{{ trans('setting.datetime') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="language" role="tabpanel" aria-labelledby="language-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">{{ trans('setting.language_title') }}</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <form method="POST" action="{{ route('setting.language') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-lg-4 col-6 col-form-label">{{ trans('setting.language') }}</label>
                                                    <div class="col-lg-8 col-6">
                                                        <select class="form-select text-light input-dark-bg" name="lang">
                                                            @foreach(config('constants.language_list') as $language_info)
                                                                <option value="{{ $language_info['code'] }}" @if($language_info['code'] == auth()->user()->lang) selected @endif>{{ $language_info['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn mt-3 mx-auto">{{ trans('buttons.save') }}</button>
                                                </div>
                                            </form>
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

@section('script')
    <script src="{{ asset('js/moment.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#account_info-tab').removeClass('active');
            $('#account_info').removeClass('show active');
            $('#change_password-tab').removeClass('active');
            $('#change_password').removeClass('show active');
            $('#id_verify-tab').removeClass('active');
            $('#id_verify').removeClass('show active');
            $('#step_auth-tab').removeClass('active');
            $('#step_auth').removeClass('show active');
            $('#download-tab').removeClass('active');
            $('#download').removeClass('show active');
            $('#login_history-tab').removeClass('active');
            $('#login_history').removeClass('show active');
            $('#language-tab').removeClass('active');
            $('#language').removeClass('show active');

            @if($errors->has('language') || session('language'))
                $('#language-tab').addClass('active');
                $('#language').addClass('show active');
            @elseif($errors->has('id_doc') || $errors->has('id_failed') || session('id_success'))
                $('#id_verify-tab').addClass('active');
                $('#id_verify').addClass('show active');
            @elseif($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation') || $errors->has('pwd_failed') || session('pwd_success'))
                $('#change_password-tab').addClass('active');
                $('#change_password').addClass('show active');
            @else
                $('#account_info-tab').addClass('active');
                $('#account_info').addClass('show active');
            @endif

            getDataList();
            getLoginHistory();
        });

        function getDataList() {
            var token = $("input[name=_token]").val();

            $.ajax({
                url: '{{ route('setting.datalist') }}',
                type: 'POST',
                data: {_token: token},
                dataType: 'JSON',
                success: function (response) {
                    if ( $.fn.DataTable.isDataTable( '#data_list_tbl' ) ) {
                        var data_list_tbl = $('#data_list_tbl').DataTable();
                        data_list_tbl.destroy();
                    }

                    datas = new Array();
                    if (response == undefined || response.length == 0) {
                    } else {
                        for (var i = 0; i < response.length; i++) {

                            var download = '<a target="_blank" href="' + response[i].url + '"><i class="fa fa-download"></i></a>';

                            datas.push([
                                response[i].title,
                                response[i].file_name,
                                moment(response[i].updated_at).utc().format('YYYY-MM-DD HH:mm:ss'),
                                download
                            ]);
                        }
                    }

                    $('#data_list_tbl').dataTable({
                        data: datas,
                        responsive: true,
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
                    });
                }
            });
        }

        function getLoginHistory() {
            var token = $("input[name=_token]").val();

            $.ajax({
                url: '{{ route('setting.loginhistory') }}',
                type: 'POST',
                data: {_token: token},
                dataType: 'JSON',
                success: function (response) {
                    if ( $.fn.DataTable.isDataTable( '#login_history_tbl' ) ) {
                        var login_history_tbl = $('#login_history_tbl').DataTable();
                        login_history_tbl.destroy();
                    }

                    datas = new Array();
                    if (response == undefined || response.length == 0) {
                    } else {
                        for (var i = 0; i < response.length; i++) {

                            var device = '{{ trans('common.device.Unknown') }}';
                            if(response[i].device == '{{ config('constants.device.Mobile') }}')
                                device = '{{ trans('common.device.Mobile') }}';
                            else if(response[i].device == '{{ config('constants.device.Tablet') }}')
                                device = '{{ trans('common.device.Tablet') }}';
                            else if(response[i].device == '{{ config('constants.device.Desktop') }}')
                                device = '{{ trans('common.device.Desktop') }}';

                            datas.push([
                                response[i].ip_addr,
                                device,
                                response[i].platform,
                                response[i].region,
                                moment(response[i].updated_at).utc().format('YYYY-MM-DD HH:mm:ss'),
                            ]);
                        }
                    }

                    $('#login_history_tbl').dataTable({
                        data: datas,
                        responsive: true,
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
                    });
                }
            });
        }

        $('#data_list_tbl').DataTable({
            searching: false,
            viewCount: false,
            bLengthChange: false,
        });
    </script>
@endsection