@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')

<div class="input-group mb-3">
    <form action="/items/search1" method="GET">

    @csrf

    <input class="form-control" type="text" name="keyword" placeholder="商品名、例)白菜">
    <input type="submit" value="名前検索">
    </form>
</div>

<div class="input-group mb-3">
    <form action="/items/search2" method="GET">

    @csrf

    <select class="form-control" type="text" aria-label="Default select example" name="keyword">
        <option selected>カテゴリーを選択</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        <input type="submit" value="カテゴリー検索">
    </select>
</form>
</div>

<div class="input-group mb-3">
    <form action="/items/search3" method="GET">

    @csrf

    <input class="form-control" type="text" name="keyword" placeholder="価格、例)100">円
    <input type="submit" value="価格検索">
    </form>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">商品一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="border w-100 table align-middle" style="table-layout:auto;">
                    <thead class="table-primary">
                        <tr>
                            <th class="p-2">ID</th>
                            <th class="p-2">名前</th>
                            <th class="p-2">カテゴリー</th>
                            <th class="p-2">詳細</th>
                            <th class="p-2">価格</th>
                            <th class="p-2">商品編集</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item_categories as $item)
                            <tr>
                                <td class="p-2">{{ $item->id }}</td>
                                <td class="p-2">{{ $item->name }}</td>
                                <td class="p-2">{{ $item->category->name }}</td>
                                <td class="p-2">{{ $item->detail }}</td>
                                <td class="p-2">{{ $item->price }}円</td>
                                <td class="p-2 align-middle"><a type="button" class="btn btn-outline-dark" href="/items/{{$item->id}}/edit" role="button"> >>編集 </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $item_categories->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
