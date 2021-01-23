@extends('adminlte::page')

@section('title', '문의 - 상세보기')

@section('content_header')
    <h1>문의 관리</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>문의 - 상세보기</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" class="form col-12 col-lg-6 news-form" method="GET">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">제목</label>
                            <input type="text" class="form-control" name="title" value="{{$board->title ?? ''}}" disabled>
                            <input type="hidden" class="form-control" name="id" value="{{$board->id ?? 0}}">
                        </div>
                        <div class="form-group">
                            <label for="">문의 분류/제품명</label>
                            <input type="text" class="form-control" name="category" value="{{$board->category ?? ''}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">작성자 메일 주소</label>
                            <input type="text" class="form-control" name="email" value="{{$board->email ?? ''}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">내용</label><br>
                            <textarea rows="5" class="form-control" name="question" disabled>{{$board->question ?? ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">답글</label><br>
                            <textarea rows="5" class="form-control" name="answer" disabled>{{$board->answer ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary text-white list-btn">목록</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const board_create = () => {

        const init = () => {
            event_listener();
        };

        const event_listener = () => {

             //목록 버튼 클릭시
            $('.list-btn').on('click', function() {
                $('.news-form').submit();
            });
        }

        init();
    }

    window.onload = function(){
        board_create();
    }
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/kor/css/admin.css">
@stop

@section('js')
    <script src="/kor/js/admin/manifest.js"></script>
    <script src="/kor/js/admin/vendor.js"></script>
@stop





