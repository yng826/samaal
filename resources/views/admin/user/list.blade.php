@extends('adminlte::page')

@section('title', '사용자 관리')

@section('content_header')
    <h1>사용자 관리</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>사용자 리스트</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table"  style="table-layout: fixed;">
                        <tr>
                            <th class="text-center" style="width: 80px;">번호</th>
                            <th class="text-center">사용자명</th>
                            <th class="text-center">형태</th>
                            <th class="text-center">등록/수정일</th>
                            <th class="text-center" style="width: 80px;">관리</th>
                        </tr>

                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->role }}</td>
                            <td class="text-center">{{ $user->updated_at ?? $user->created_at}}</td>
                            <td class="text-center" ><a class="btn btn-outline-warning btn-xs" href="/admin/user/{{$user->id}}/edit">수정</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        @if($users->count())
                            {{$users->links("pagination::bootstrap-4")}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/admin/user/create">사용자 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
@stop
