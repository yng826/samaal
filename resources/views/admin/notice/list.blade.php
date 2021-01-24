@extends('adminlte::page')

@section('title', '팝업 관리')

@section('content_header')
    <h1>팝업 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>팝업 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">버튼색상</th>
                            <th class="text-center">사용여부</th>
                            <th class="text-center">등록일</th>
                            <th class="text-center">관리</th>
                        </tr>
                        @foreach ($notices as $notice)
                        <tr>
                            <td class="text-center">{{ $notice->id }}</td>
                            <td class="text-center">{{ $notice->title }}</td>
                            <td class="text-center"><span class="text-light" style="background-color: #{{ $notice->button_color }}">#{{ $notice->button_color }}</span></td>
                            <td class="text-center">{{ $notice->is_use ? '사용': '미사용'}}</td>
                            <td class="text-center">{{ $notice->updated_at ?? $notice->created_at}}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-warning btn-xs" href="/kor/admin/notice/{{ $notice->id }}/edit">수정</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if($notices->count())
                    {{$notices->links("pagination::bootstrap-4")}}
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/kor/admin/notice/create">팝업 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/kor/css/admin.css">
@stop

@section('js')
    <script src="/kor/js/admin/manifest.js"></script>
    <script src="/kor/js/admin/vendor.js"></script>
@stop
