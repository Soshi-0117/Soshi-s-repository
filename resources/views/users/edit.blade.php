@extends('adminlte::page')

@section('title', 'ユーザー情報編集')

@section('content_header')
    <h1>ユーザー情報編集</h1>
@stop

@section('content')
<div class="container">
    <div class="w-50 py-5 bg-white rounded mx-auto shadow">
        <div class="my-5">
            <h1 class="fs-4 fw-bold text-center">ユーザーの編集</h1>
        </div>
        <div class="my-5 col-md-6 mx-auto">
            <form method="POST" action="{{ route('users.update') }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name">名前</label>
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">メールアドレス</label>
                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <a href="{{ route('users.password', $user->id) }}">パスワードの変更はこちら</a>
                </div>

                <div class="my-5">
                    <div class="my-5 text-center">
                        <button type="submit" class="px-5 py-2 btn btn-primary fw-bold">
                            登録
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop

