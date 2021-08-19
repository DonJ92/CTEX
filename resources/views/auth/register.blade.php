@extends('layouts.app')

@section('content')
    <section class="pt-5 pb-5 background-dark body-min-height">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <div class="card shadow-lg background-black-dark border-panel">
                        <div class="card-body py-5 px-sm-5">
                            <h3 class="text-primary">Register</h3>
                            <p>Enter the following information to create an account.</p>
                            <hr>
                            <form id="form1" class="form-validate text-light mt-5">
                                <div class="h5 mb-4 text-light">Account Info</div>
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
                                        <label for="password" class="text-light">Password</label>
                                        <div class="input-group show-hide-password">
                                            <input class="form-control text-light input-dark-bg" name="password" placeholder="Password" type="text" required="">
                                            <span class="input-group-text input-dark-bg"><i class="icon-eye" aria-hidden="true" style="cursor: pointer;"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password2" class="text-light">Password Confirmation</label>
                                        <div class="input-group show-hide-password">
                                            <input class="form-control text-light input-dark-bg" name="password2" placeholder="Password Confirmation" type="password" required="">
                                            <span class="input-group-text input-dark-bg"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                        </div>
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
                                <div class="form-check mb-1 mt-5">
                                    <input type="checkbox" name="reminders" id="reminders" class="form-check-input" value="1" required="">
                                    <label class="form-check-label text-light" for="reminders">I have read and agree to Ctex's Terms of Service.</label>
                                </div>
                                <button type="submit" class="btn m-t-30 mt-3">Register</button>
                            </form>
                            <div class="mt-4"><small>Already Registered?</small> <a href="{{route('login')}}" class="small fw-bold">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
