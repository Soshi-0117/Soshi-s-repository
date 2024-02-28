@extends('adminlte::page')

@section('title', '企業情報登録')

@section('content_header')
    <h1>企業情報登録</h1>
@stop

@section('content')
<div class="container"> <!-- コンテナを追加して余白を確保 -->
    <div class="row justify-content-center"> <!-- 中央寄せを追加 -->
        <div class="col-md-8"> <!-- サイズを調整して余白を追加 -->
            <div class="row">
                <div class="col-md-10">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-primary">
                    <form action="/companies/store" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">企業名<br>
                                <input type="text" class="form-control mb-4" name="name" id="name" placeholder="企業名" required>
                            </div>
                            <div class="form-group">郵便番号<br>
                                <input type="text" class="form-control mb-4" pattern="[0-9]{3}-[0-9]{4}" name="post_code" id="post_code" placeholder="郵便番号（例）000-0000" required>
                            </div>
                            <div class="form-group">住所<br>
                                <input type="text" class="form-control mb-4" name="address" id="address" placeholder="住所" required>
                            </div>
                            <div class="form-group">電話番号<br>
                                <input type="tel" class="form-control mb-4" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" name="tel_num" id="tel_num" placeholder="電話番号（例）000-0000-0000" required>
                            </div>
                            <div class="form-group">お取引条件<br>
                                <input type="text" class="form-control mb-4" name="term" id="term" placeholder="お取引条件" required>
                            </div>
                            <div class="form-group">詳細<br>
                                <input type="text" class="form-control mb-4" name="detail" id="detail" placeholder="詳細" required>
                            </div>
                            <div class="form-group">URL<br>
                                <input type="text" class="form-control mb-4" name="url" id="url" placeholder="URL" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">登録</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @stop

    @section('css')
    @stop
    
    @section('js')
    @stop
    