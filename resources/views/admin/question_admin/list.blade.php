@extends('adminlte::page')

@section('title', '문의 관리')

@section('content_header')
    <h1>문의 관리</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>문의 리스트</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table"  style="table-layout: fixed;">
                        <tr>
                            <th class="text-center" style="width: 80px;">번호</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">문의 분류/제품명</th>
                            <th class="text-center">작성자 메일 주소</th>
                            <th class="text-center">답글 여부</th>
                            <th class="text-center">등록/수정일</th>
                            <th class="text-center" style="width: 100px;">관리</th>
                        </tr>

                        @foreach ($boards as $board)
                        <tr>
                            <td class="text-center">{{ $board->id }}</td>
                            <td class="text-center">{{ $board->title }}</td>
                            <td class="text-center">{{ $board->category }}</td>
                            <td class="text-center">{{ $board->email }}</td>
                            <td class="text-center">{{ $board->state_yn == 'y' ? '답변 완료' :'' }}</td>
                            <td class="text-center">{{ $board->updated_at ?? $board->created_at}}</td>
                            @if ($board->state_yn == 'y')
                                <td class="text-center" ><a class="btn btn-outline-info btn-xs" href="/admin/question_admin/{{$board->id}}">상세보기</a></td>
                            @else
                                <td class="text-center" ><a class="btn btn-outline-warning btn-xs" href="/admin/question_admin/{{$board->id}}/edit">답글추가</a></td>
                            @endif

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
