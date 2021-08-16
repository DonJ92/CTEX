@extends('layouts.dashboard')

@section('content')
<div class="container body-min-height">
    <!-- Page title -->
    <section id="page-title" class="page-title-left text-light background-dark">
        <div class="container">
            <div class="page-title">
                <h1>お取引レポート</h1>
                <span>お取引レポート関連説明</span>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- Content -->
    <section id="page-content" class="dark">
        <div class="container">
            <div class="form-group col-lg-12">
                <button type="button" class="btn btn-info"><i class="fa fa-download"></i> お取引レポートのダウンロード</button>
            </div>
            <div class="form-group row">
                <div class="col-lg-3 form-group"><input class="form-control" type="date" id="from_date"></div>
                <div class="col-lg-3 form-group"><input class="form-control" type="date" id="to_date"></div>
                <div class="col-lg-3 form-group">
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary">レポートを表示する</button>
                </div>
            </div>

            <table id="datatable" class="table table-dark" style="width:100%">
                <thead>
                <tr>
                    <th class="background-black-dark">取引日時</th>
                    <th class="background-black-dark">取引種別</th>
                    <th class="background-black-dark">価格</th>
                    <th class="background-black-dark">通貨等</th>
                    <th class="background-black-dark">数量</th>
                    <th class="background-black-dark">手数料</th>
                    <th class="background-black-dark">通貨等</th>
                    <th class="background-black-dark">数量</th>
                    <th class="background-black-dark">自己・媒介</th>
                    <th class="background-black-dark">注文 ID</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2021/01/23 16:58:00</td>
                    <td>外部送付</td>
                    <td>-</td>
                    <td>XRP</td>
                    <td>-600</td>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>234354trgdfsdew43</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection