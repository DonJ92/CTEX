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
        <hr>
        <!-- Content -->
        <section id="page-content" class="dark">
            <div class="container">
                <div class="tabs tabs-vertical">
                    <div class="row">
                        <div class="col-md-3 tab-border-right">
                            <ul class="nav flex-column nav-tabs border-1" id="setting_tab" role="tablist" aria-orientation="vertical">
                                <li class="nav-item">
                                    <a class="nav-link no-border active" id="account_into-tab" data-bs-toggle="tab" href="#account_info" role="tab" aria-controls="account_info" aria-selected="true"><b>Account Info</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="change_password-tab" data-bs-toggle="tab" href="#change_password" role="tab" aria-controls="change_password" aria-selected="false"><b>Change Password</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="id_verify-tab" data-bs-toggle="tab" href="#id_verify" role="tab" aria-controls="id_verify" aria-selected="false"><b>Identity Verification</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="step_auth-tab" data-bs-toggle="tab" href="#step_auth" role="tab" aria-controls="step_auth" aria-selected="false"><b>2-Step Verification</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link no-border" id="download-tab" data-bs-toggle="tab" href="#download" role="tab" aria-controls="download" aria-selected="false"><b>Data Download</b></a>
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
                            <div class="tab-content" id="setting_tab_content">
                                <div class="tab-pane fade show active" id="account_info" role="tabpanel" aria-labelledby="account_into-tab">
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
                                                        <div class="col-lg-4 col-6">Account ID</div>
                                                        <div class="col-lg-8 col-6">abcdefg1234567</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6">Identity Verification</div>
                                                        <div class="col-lg-8 col-6"><i class="icon-check-circle text-success"></i> Not Verified</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-4 col-6">2-Step Verification</div>
                                                        <div class="col-lg-8 col-6"><i class="icon-x-circle text-danger"></i> No Use</div>
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
                                            <form id="form1" class="form-validate text-light mt-5">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" class="form-control-file" id="photo">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="username" class="text-light">Full Name</label>
                                                        <input type="text" class="form-control text-light input-dark-bg" name="username" placeholder="Full Name" required="" autofocus>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email"   class="text-light">Email</label>
                                                        <input type="email" class="form-control text-light input-dark-bg" name="email" placeholder="Email" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="gender" class="text-light">Gender</label>
                                                        <select class="form-select text-light input-dark-bg" name="gender" required="">
                                                            <option value="">Select your gender</option>
                                                            <option>Female</option>
                                                            <option>Male</option>
                                                            <option>Rather not say</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="birthday" class="text-light">Birthday</label>
                                                        <input class="form-control text-light input-dark-bg" type="date" name="dateofbirth" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="telephone" class="text-light">Phone</label>
                                                        <input class="form-control text-light input-dark-bg" type="tel" name="telephone" placeholder="Phone" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="country" class="text-light">Country</label>
                                                        <select name="country" class="form-select text-light input-dark-bg" required="">
                                                            <option value="">United States</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="state" class="text-light">Language</label>
                                                        <select name="lang" class="form-select text-light input-dark-bg" required="">
                                                            <option value="">English</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="address" class="text-light">Address</label>
                                                        <input type="text" class="form-control text-light input-dark-bg" name="address" placeholder="Address" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Postal Code</label>
                                                        <input type="text" class="form-control text-light input-dark-bg" name="zip" placeholder="Postal Code" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn m-t-30 mt-3">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="change_password-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">Change Password</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <div class="form-group row">
                                                <label for="current_password" class="col-lg-4 col-form-label">Current Password</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control input-dark-bg text-light" type="password" value="" id="current_password" placeholder="Current Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-lg-4 col-form-label">New Password</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control input-dark-bg text-light" type="password" value="" id="password" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password_confirmation" class="col-lg-4 col-form-label">New Password Confirmation</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control input-dark-bg text-light" type="password" value="" id="password_confirmation" placeholder="New Password Confirmation">
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn m-t-30 mt-3 mx-auto">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="id_verify" role="tabpanel" aria-labelledby="id_verify-tab">
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">Identify Verification</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group row">
                                                    <div class="col-lg-4 col-6">Identity Verification</div>
                                                    <div class="col-lg-8 col-6"><i class="icon-check-circle text-success"></i> Not Verified</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card background-dark">
                                        <div class="card-header background-black-dark">
                                            <span class="h4 mx-auto text-primary">Upload ID Docs</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <p>Please upload your identity verification doc.<p>
                                            <p>Upload file must be JPG, PNG, or PDF.<br>
                                                Upload file max size is 10MB.
                                            </p>
                                            <form id="id_verify_form" class="form-validate text-light mt-3">
                                                <div class="form-group row">
                                                    <label for="Doc" class="col-lg-4 col-form-label">Identify Doc</label>
                                                    <div class="col-lg-8">
                                                        <input type="file" class="form-control-file" id="photo">
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn mx-auto">Upload</button>
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
                                            <div class="form-group col-lg-8 row mt-5">
                                                <p>Please read the QR code below from the authentication app and enter the displayed 6-digit authentication code.</p>
                                                <div class="form-group">
                                                    <img class="mx-auto img-thumbnail mb-5" src="{{ asset('/images/QR.png') }}" width="300px">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <input type="text" class="form-control text-light input-dark-bg" name="verification_code" placeholder="Verification Code" required="" autofocus>
                                                        </div>
                                                        <div class="form-group col-lg-6 text-center">
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
                                            <span class="h4 mx-auto text-primary">Data Download</span>
                                        </div>
                                        <div class="card-body text-light">
                                            <h5>You can download the data registered by the Service Team.</h5>
                                            <div class="overflow-auto p-15">
                                                <table id="data_list_tbl" class="table table-dark font-size-sm" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="background-black-dark">Title</th>
                                                        <th class="background-black-dark">FileName</th>
                                                        <th class="background-black-dark">Register Datetime</th>
                                                        <th class="background-black-dark">Download</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Title1</td>
                                                        <td>File1</td>
                                                        <td>2021/01/23 16:58:00</td>
                                                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title1</td>
                                                        <td>File1</td>
                                                        <td>2021/01/23 16:58:00</td>
                                                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title1</td>
                                                        <td>File1</td>
                                                        <td>2021/01/23 16:58:00</td>
                                                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title1</td>
                                                        <td>File1</td>
                                                        <td>2021/01/23 16:58:00</td>
                                                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Title1</td>
                                                        <td>File1</td>
                                                        <td>2021/01/23 16:58:00</td>
                                                        <td><a href="#"><i class="fa fa-download"></i></a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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

@section('script')
    <script>
        $('#data_list_tbl').DataTable({
            searching: false,
            viewCount: false,
            bLengthChange: false,
        });
    </script>
@endsection