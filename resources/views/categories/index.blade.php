@extends('adminlte::page')

@section('title', 'カテゴリー一覧')

@section('content_header')
    <h1>カテゴリー一覧</h1>
@stop

@section('content')
<div class="container"> <!-- コンテナクラスを追加 -->
    <div class="d-flex align-categories-center justify-content-between">
        <h1 class="mb-2">カテゴリー一覧</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary" style="font-size: 23px;">登録</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="border w-100 table align-middle" style="table-layout:auto;">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>カテゴリー名</th>
                <th>アクション</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->count() > 0)
                @foreach($categories as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td> 
                        <td class="align-middle">
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
