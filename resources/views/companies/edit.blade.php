
@extends('adminlte::page')

@section('title', '企業情報編集')

@section('content_header')
<h1>企業情報編集企業ID:{{$company->id}}</h1>
@stop

@section('content')
    <div class="container grid gap-0 row-gap-3">
        <form action="/companies/{{$company->id}}" method="post">
            @csrf
        <div class="col-form-label">企業名
            <input type="text" class="form-control" name="name" value={{$company->name}}  placeholder="企業名">
        </div>
        <div class="col-form-label">郵便番号
            <input type="text" class="form-control" name="post_code" value={{$company->post_code}}  placeholder="郵便番号">
        </div>
        <div class="col-form-label">住所
            <input type="text" class="form-control" name="address" value={{$company->address}}  placeholder="住所">
        </div>
        <div class="col-form-label">電話番号
            <input type="text" class="form-control" name="tel_num" value={{$company->tel_num}}  placeholder="電話番号">
        </div>
        <div class="col-form-label">お取引条件
            <input type="text" class="form-control" name="term" value={{$company->term}}  placeholder="お取引条件">
        </div>
        <div class="col-form-label">詳細
            <input type="text" class="form-control" name="detail" value={{$company->detail}}  placeholder="詳細">
        </div>
        <div class="col-form-label">URL
            <input type="text" class="form-control" name="url" value={{$company->url}}  placeholder="URL">
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">編集</button>
            </div>
            <div class="form-group">
                <a href="/companies/{{$company->id}}"> <button type="button" class="btn btn-warning">削除</button></a>
            </div>
        </form>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
