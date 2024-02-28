
@extends('adminlte::page')

@section('title', '企業情報編集')

@section('content_header')
<h1>企業情報編集 企業ID:{{$company->id}}</h1>
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
                    <div class="container grid gap-0 row-gap-3">
                        <form action="/companies/{{$company->id}}" method="post">
                            @csrf
                        <div class="col-form-label">企業名
                            <input type="text" class="form-control" name="name" value={{$company->name}}  placeholder="企業名" required>
                        </div>
                        <div class="col-form-label">郵便番号
                            <input type="text" class="form-control" name="post_code" value={{$company->post_code}}  placeholder="郵便番号"required>
                        </div>
                        <div class="col-form-label">住所
                            <input type="text" class="form-control" name="address" value={{$company->address}}  placeholder="住所" required>
                        </div>
                        <div class="col-form-label">電話番号
                            <input type="text" class="form-control" name="tel_num" value={{$company->tel_num}}  placeholder="電話番号" required>
                        </div>
                        <div class="col-form-label">お取引条件
                            <input type="text" class="form-control" name="term" value={{$company->term}}  placeholder="お取引条件" required>
                        </div>
                        <div class="col-form-label">詳細
                            <input type="text" class="form-control" name="detail" value={{$company->detail}}  placeholder="詳細" required>
                        </div>
                        <div class="col-form-label">URL
                            <input type="text" class="form-control" name="url" value={{$company->url}}  placeholder="URL" required>
                        </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">編集</button>
                            </div>
                            <div class="form-group">
                                <a href="/companies/{{$company->id}}"> <button type="button" class="btn btn-warning">削除</button></a>
                            </div>
                        </form>
                    </div>
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
