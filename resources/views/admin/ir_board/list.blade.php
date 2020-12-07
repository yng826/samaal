@extends('adminlte::page')

@section('title', 'IR 공고 관리')

@section('content_header')
    <h1>IR 공고 관리</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>IR 공고 리스트</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table"  style="table-layout: fixed;">
                        <tr>
                            <th class="text-center" style="width: 80px;">번호</th>
                            <th class="text-center">분류</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">첨부파일</th>
                            <th class="text-center">등록/수정일</th>
                            <th class="text-center" style="width: 80px;">관리</th>
                        </tr>

                        @foreach ($boards as $board)
                        <tr>
                            <td class="text-center">{{ $board->id }}</td>
                            <td class="text-center">{{ $board->category }}</td>
                            <td class="text-center">{{ $board->title }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-info btn-xs" href="/admin/ir_board/file-download?id={{ $board->id }}">파일</a>
                            </td>
                            <td class="text-center">{{ $board->updated_at ?? $board->created_at}}</td>
                            <td class="text-center" ><a class="btn btn-outline-warning btn-xs" href="/admin/ir_board/{{$board->id}}/edit">수정</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        @if($boards->count())
                                {{$boards->links("pagination::bootstrap-4")}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/admin/ir_board/create">IR공고 추가</a>
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
