@extends('adminlte::page')

@section('title', 'カテゴリー作成')

@section('content_header')
    <h1>カテゴリー作成</h1>
@stop

@section('content')
    <div class="container"> <!-- コンテナを追加して余白を確保 -->
        <div class="row justify-content-center"> <!-- 中央寄せを追加 -->
            <div class="col-md-8"> <!-- サイズを調整して余白を追加 -->
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
                    <form method="POST" action="/categories/store">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">カテゴリー名</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="カテゴリー名を入力してください">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">登録</button>
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
    