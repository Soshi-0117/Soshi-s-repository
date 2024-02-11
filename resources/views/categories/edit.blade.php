@extends('adminlte::page')

@section('title', 'カテゴリー編集')

@section('content_header')
    <h1>カテゴリー編集</h1>
@stop

@section('content')
<div class="container"> <!-- コンテナクラスを追加 -->
    <div class="row justify-content-center"> <!-- 中央寄せクラスを追加 -->
        <div class="col-md-8"> <!-- カラムサイズを調整 -->
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
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT') <!-- PUTリクエスト指定 -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ $category->name }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
