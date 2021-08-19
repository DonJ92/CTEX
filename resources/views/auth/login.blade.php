@extends('layouts.app')

@section('content')
    <section class="pt-5 pb-5 background-dark background-theme body-min-height">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                    <div class="card background-black-dark border-panel">
                        <div class="card-body py-5 px-sm-5">
                            <div class="mb-5 text-center">
                                <h6 class="h3 mb-1 text-primary">CTEX</h6>
                                <p class="text-muted mb-0">Login</p>
                            </div><span class="clearfix"></span>
                            <hr>
                            <form class="form-validate text-light">
                                <div class="form-group">
                                    <label for="email" class="text-light">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control text-light input-dark-bg @error('email') is-invalid @enderror" name="email" placeholder="Email" autocomplete="email" autofocus>
                                        <span class="input-group-text input-dark-bg"><i class="icon-user"></i></span>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="password" class="text-light">Password</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control text-light input-dark-bg" name="password" placeholder="Password" type="password" autocomplete="password">
                                        <span class="input-group-text input-dark-bg"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                                <div class="mt-4"><!--<button type="submit" class="btn btn-primary btn-block btn-primary">Login</button>-->
                                    <a class="btn btn-primary btn-block btn-primary text-center" href="{{route('home')}}">Login</a>
                                </div>
                            </form>
                            <div class="mt-4 text-center">
                                <div><a href="page-user-register.html" class="small fw-bold">Forgot password?</a></div>
                                <div><a href="{{ route('register') }}" class="small fw-bold">Register Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
