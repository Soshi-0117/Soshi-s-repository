
@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>商品情報編集商品ID:{{$item_category->id}}</h1>
@stop

@section('content')
    <div class="container grid gap-0 row-gap-3">
        <form action="/items/{id}" method="post">
            @csrf
            <input class="form-control" type="text" name="id" value="{{$item_category->id}}" hidden>
                <div class="form-group">名前
                    <input class="form-control" type="text" name="name" value="{{$item_category->name}}"> </div>
                カテゴリー
                <select class="form-control" aria-label="Default select example" type="text" name="category_id">
                    <option selected>カテゴリーを選択</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $item_category->category_id ? "selected" : "" }}>{{$category->name}}</option>
                    @endforeach
                </select>
            <div class="form-group">詳細
                <input class="form-control" type="text" name="detail" value="{{$item_category->detail}}"> </div>
            <div class="form-group">価格
                <input class="form-control" type="text" name="price" value="{{$item_category->price}}"> </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger">編集</button>
            </div>
            <div class="form-group">
                <a href="/items/{{$item_category->id}}"> <button type="button" class="btn btn-warning">削除</button></a>
            </div>
        </form>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
