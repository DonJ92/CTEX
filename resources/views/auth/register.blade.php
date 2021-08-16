@extends('layouts.app')

@section('content')
    <section class="pt-5 pb-5 background-dark">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-body py-5 px-sm-5">
                            <h3 class="text-primary">会員登録</h3>
                            <p>次の情報を入力して口座を作成します。</p>
                            <hr>
                            <form id="form1" class="form-validate mt-5">
                                <div class="h5 mb-4">アカウント情報</div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="username">氏名</label>
                                        <input type="text" class="form-control" name="username" placeholder="氏名" required="" autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">メールアドレス</label>
                                        <input type="email" class="form-control" name="email" placeholder="メールアドレス" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">パスワード</label>
                                        <div class="input-group show-hide-password">
                                            <input class="form-control" name="password" placeholder="パスワード" type="text" required="">
                                            <span class="input-group-text"><i class="icon-eye" aria-hidden="true" style="cursor: pointer;"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password2">パスワード確認</label>
                                        <div class="input-group show-hide-password">
                                            <input class="form-control" name="password2" placeholder="パスワード確認" type="password" required="">
                                            <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="gender">性別</label>
                                        <select class="form-select" name="gender" required="">
                                            <option value="">Select your gender</option>
                                            <option>Female</option>
                                            <option>Male</option>
                                            <option>Rather not say</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="gender">生年月日</label>
                                        <input class="form-control" type="date" name="dateofbirth" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="telephone">携帯番号</label>
                                        <input class="form-control" type="tel" name="telephone" placeholder="携帯番号" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="country">国</label>
                                        <select name="country" class="form-select" required="">
                                            <option value="">United States</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="state">言語</label>
                                        <select name="lang" class="form-select" required="">
                                            <option value="">English</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="address">住所</label>
                                        <input type="text" class="form-control" name="address" placeholder="住所" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>郵便番号</label>
                                        <input type="number" class="form-control" name="zip" placeholder="郵便番号" required="">
                                    </div>
                                </div>
                                <div class="form-check mb-1 mt-5">
                                    <input type="checkbox" name="reminders" id="reminders" class="form-check-input" value="1" required="">
                                    <label class="form-check-label" for="reminders">利用規約を理解し、利用することに同意します。</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="terms_conditions" id="terms_conditions" class="form-check-input" value="1" required="">
                                    <label class="form-check-label" for="terms_conditions">契約締結前交付書面を理解し、利用することに同意します。</label>
                                </div>
                                <button type="submit" class="btn m-t-30 mt-3">登録</button>
                            </form>
                            <div class="mt-4"><small>アカウントをお持ちの方は</small> <a href="{{route('login')}}" class="small fw-bold">こちら</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
