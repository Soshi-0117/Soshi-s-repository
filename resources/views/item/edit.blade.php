
@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>商品情報編集商品ID:{{$item->id}}</h1>
@stop

@section('content')
    <div class="container grid gap-0 row-gap-3">
        <form action="/items/{id}" method="post">
            @csrf
            <input class="form-control" type="text" name="id" value="{{$item->id}}" hidden>
                <div class="form-group">名前
                    <input class="form-control" type="text" name="name" value="{{$item->name}}"> </div>
                カテゴリー
                <select class="form-control" aria-label="Default select example" type="text" name="category_id">
                    <option selected>カテゴリーを選択</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $item->category_id ? "selected" : "" }}>{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="form-group">企業<br>
                    <select class="form-control" aria-label="Default select example" type="text" name="company_id">
                        <option selected>企業を選択</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}" {{ $company->id == $item->company_id ? "selected" : "" }}>{{$company->name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">JANコード<br>
                        <input class="form-control" type="number" pattern="[0-9]{13}" min="4900000000000" max="4999999999999" name="jan_code" value="{{$item->jan_code}}"> </div>
            <div class="form-group">詳細
                <input class="form-control" type="text" name="detail" value="{{$item->detail}}"> </div>
            <div class="form-group">価格
                <input class="form-control" type="number" pattern="^[0-9]{1,5}$" name="price" value="{{$item->price}}"> </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">編集</button>
            </div>
            <div class="form-group">
                <a href="/items/{{$item->id}}"> <button type="button" class="btn btn-warning">削除</button></a>
            </div>
        </form>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
