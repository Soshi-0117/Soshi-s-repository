@extends('adminlte::page')

@section('title', 'カテゴリー一覧')

@section('content_header')
    <h1>カテゴリー一覧</h1>
@stop

@section('content')
<div class="container"> <!-- コンテナクラスを追加 -->
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">カテゴリー一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('categories/create') }}" class="btn btn-outline-secondary">カテゴリー登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="border w-100 table align-middle" style="table-layout:auto;">
                        <thead class="table-primary">
            <tr>
                <th class="p-2">#</th>
                <th class="p-2">カテゴリー名</th>
                <th class="p-2 text-center">アクション</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->count() > 0)
                @foreach($categories as $rs)
                    <tr>
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="p-2">{{ $rs->name }}</td> 
                        <td class="p-2 text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('categories.edit', $rs->id)}}" type="button" class="btn btn-warning">編集</a>
                                <form action="{{ route('categories.destroy', $rs->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('削除しますか？')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">カテゴリーが見つかりません</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $categories->links('pagination::bootstrap-5') }}
</div> <!-- コンテナクラスの終了 -->
@stop

@section('css')
@stop

@section('js')
@stop
