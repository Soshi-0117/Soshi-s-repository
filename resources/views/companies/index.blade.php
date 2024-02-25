@extends('adminlte::page')

@section('title', '企業一覧')

@section('content_header')
    <h1>企業一覧</h1>
@stop

@section('content')
    <div style="width: 500px; margin: 100px auto;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">企業一覧</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <a href="{{ url('companies/create') }}" class="btn btn-outline-secondary">企業登録</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="border w-100 table align-middle" style="table-layout:auto;">
                            <thead class="table-primary">
                            <tr>
                                <th class="p-2">名前</th>
                                <th class="p-2">詳細</th>
                                <th class="p-2">お取引条件</th>
                                <th class="p-2 text-center">企業情報編集</th>
                            </tr>
                        </thead>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="p-2"><a href="{{$company->url}}">{{$company->name}}</a></td>
                                <td class="p-2">{{$company->detail}}</td>
                                <td class="p-2">{{$company->term}}</td>
                                <td class="p-2 text-center"><a type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#js-modal{{$company->id}}" data-bs-whatever="{{$company->id}}" role="button"> >>企業情報確認・編集 </a></td>
                                
                                <div class="modal fade" id="js-modal{{$company->id}}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">企業情報を編集</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-dialog-scrollable mb-3">
                                                    <form action="/companies/{{$company->id}}" method="post">
                                                            @csrf
                                                        <div class="col-form-label">企業名
                                                            <input type="text" class="form-control" name="name" value={{$company->name}}  placeholder="企業名">
                                                        </div>
                                                        <div class="col-form-label">郵便番号
                                                            <input type="text" class="form-control" name="post_code" value={{$company->post_code}}  placeholder="郵便番号">
                                                        </div>
                                                        <div class="col-form-label">住所
                                                            <input type="text" class="form-control" name="address" value={{$company->address}}  placeholder="住所">
                                                        </div>
                                                        <div class="col-form-label">電話番号
                                                            <input type="text" class="form-control" name="tel_num" value={{$company->tel_num}}  placeholder="電話番号">
                                                        </div>
                                                        <div class="col-form-label">お取引条件
                                                            <input type="text" class="form-control" name="term" value={{$company->term}}  placeholder="お取引条件">
                                                        </div>
                                                        <div class="col-form-label">詳細
                                                            <input type="text" class="form-control" name="detail" value={{$company->detail}}  placeholder="詳細">
                                                        </div>
                                                        <div class="col-form-label">URL
                                                            <input type="text" class="form-control" name="url" value={{$company->url}}  placeholder="URL">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">保存する</button>
                                                    <a href="/companies/{{$company->id}}"> <button type="button" class="btn btn-danger">削除</button></a>
                                                </form>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </table>
                        {{ $companies->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop

    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @stop
    
    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @stop
    