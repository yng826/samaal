@extends('adminlte::page')

@section('title', '문의 관리')

@section('content_header')
    <h1>문의 관리</h1>
@stop
@section('content')
<div class="container question_list">
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
                    <div class="form-inline">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger text-white ml-1 btn-delete">선택 삭제</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table"  style="table-layout: fixed;">
                        <tr>
                            <th class="text-center">
                                <input type="checkbox" id="all-check">
                            </th>
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
                            <td class="text-center">
                                <input type="checkbox" name="id-check" value="{{ $board->id }}">
                            </td>
                            <td class="text-center">{{ $board->id }}</td>
                            <td class="text-center">{{ $board->title }}</td>
                            <td class="text-center">{{ $board->category }}</td>
                            <td class="text-center">{{ $board->email }}</td>
                            <td class="text-center">{{ $board->state_yn == 'y' ? '답변 완료' :'' }}</td>
                            <td class="text-center">{{ $board->updated_at ?? $board->created_at}}</td>
                            @if ($board->state_yn == 'y')
                                <td class="text-center" ><a class="btn btn-outline-info btn-xs" href="/eng/admin/question_admin/{{$board->id}}">상세보기</a></td>
                            @else
                                <td class="text-center" ><a class="btn btn-outline-warning btn-xs" href="/eng/admin/question_admin/{{$board->id}}/edit">관리</a></td>
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
    <form action="/eng/admin/question/" id="question-list" method="POST">
        @method('DELETE')
        <input type="hidden" name="ids" id="question-list-ids">
    </form>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/eng/css/admin.css">
@stop

@section('js')
    <script src="/eng/js/admin/manifest.js"></script>
    <script src="/eng/js/admin/vendor.js"></script>
    <script src="/eng/js/admin/question.js"></script>
@stop
