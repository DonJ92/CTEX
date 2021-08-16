@extends('layouts.app')

@section('content')
    <section class="pt-5 pb-5 background-dark background-theme">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                    <div class="card">
                        <div class="card-body py-5 px-sm-5">
                            <div class="mb-5 text-center">
                                <h6 class="h3 mb-1 text-primary">CTEX</h6>
                                <p class="text-muted mb-0">ログイン</p>
                            </div><span class="clearfix"></span>
                            <hr>
                            <form class="form-validate">
                                <div class="form-group">
                                    <label for="email">メールアドレス</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="メールアドレス" autocomplete="email" autofocus>
                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="password">パスワード</label>
                                    <div class="input-group show-hide-password">
                                        <input class="form-control" name="password" placeholder="パスワード" type="password" autocomplete="password">
                                        <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                    </div>
                                </div>
                                <div class="mt-4"><button type="submit" class="btn btn-primary btn-block btn-primary">ログイン</button></div>
                            </form>
                            <div class="mt-4 text-center">
                                <div><small>パスワードをお忘れの方は</small> <a href="page-user-register.html" class="small fw-bold">こちら</a></div>
                                <div><small>アカウントをお持ちではない方は</small> <a href="{{ route('register') }}" class="small fw-bold">こちら</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
