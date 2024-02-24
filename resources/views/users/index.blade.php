@extends('adminlte::page')

@section('title', 'ユーザー一覧')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop

@section('content')
<div class="container">
  @if (session()->has('message'))
    <div class="alert alert-success font-bold" role="alert">
      {{ session('message') }}
    </div>
  @endif

  <div class="p-4 bg-white rounded shadow">
    <div class="mb-4 row">
      
      {{-- 検索フォーム --}}
      <div class="col-12 col-md-6">
        <form method="GET" action="{{ route('users.search') }}">
          @csrf
          <div class="input-group">
            <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="ID、名前で検索">
            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
          </div>
        </form>
      </div>

      {{-- ユーザー登録ボタン --}}
      {{-- <div class="col-12 col-md-6 text-end mt-3 mt-md-0">
        <form method="GET" action="">
          @csrf
          <button type="submit" class="px-2 btn btn-primary">ユーザー登録</button>
        </form>
      </div> --}}
    </div>

    <div class="table-responsive">
      <table class="border w-100 table align-middle" style="table-layout:auto;">
        <thead class="table-primary">
          <tr>
            <th class="p-2" scope="col">ID</th>
            <th class="p-2 w-25" scope="col">名前</th>
            <th class="p-2 w-25" scope="col">email</th>
            <th class="p-2 w-25" scope="col">登録日</th>
            <th class="p-2 text-center" style="width: 15%;" scope="col">操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td class="p-2">{{ $user->id }}</td>
            <td class="p-2">{{ $user->name }}</td>
            <td class="p-2">{{ $user->email }}</td>
            <td class="p-2">{{ $user->created_at }}</td>
            <td class="p-2 text-center">
              <div class="d-flex justify-content-center">
                @if (Auth::id() == $user->id)
                  <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-primary btn-sm me-2">編集</button></a>
                  <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onClick="return confirm('本当に削除しますか？');">削除</button>
                  </form>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->links('pagination::bootstrap-5') }}
    </div>
  </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
