@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                        <form method="POST" action="/items/add">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">名前<br>
                                    <input class="form-control" type="text" name="name" placeholder="商品名を入力してください" required>
                                </div>
                                <div class="form-group">カテゴリー<br>
                                    <select class="form-control" aria-label="Default select example" type="text" name="category_id" required>
                                        <option disabled>カテゴリーを選択</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">企業<br>
                                    <select class="form-control" aria-label="Default select example" type="text" name="company_id" required>
                                        <option disabled>企業を選択</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">JANコード<br>
                                    <input class="form-control" type="number"  pattern="[0-9]{13}" min="4900000000000" max="4999999999999" name="jan_code" placeholder="JANコードを入力してください" required>
                                </div>
                                <div class="form-group">詳細<br>
                                    <input class="form-control" type="text" name="detail" placeholder="詳細を入力してください（例）100g、1袋" required>
                                </div>
                                <div class="form-group">価格<br>
                                    <input class="form-control" type="number" pattern="^[0-9]{1,5}$" name="price" placeholder="価格を入力してください" required>
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
</div>
@stop

@section('css')
@stop

@section('js')
@stop
