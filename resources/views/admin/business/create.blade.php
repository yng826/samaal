@extends('adminlte::page')

@section('title', '제품 관리')

@section('content_header')
    <h1>제품 관리</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>제품 관리 수정</h3>
                </div>
            </div>
        </div>
        <form action="/admin/business/{{ $id }}" class="form col-12 col-lg-6 board-form" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                @if (!empty($error))
                    <div class="alert alert-danger">
                        <ul class="error">
                            <li class="error">{{ $error }}</li>
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" class="form-control" name="url" value="{{$business->url ?? ''}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">문의 제목</label>
                            <input type="question_title" class="form-control" name="question_title" value="{{$business->question_title ?? ''}}" placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">담당자명</label>
                            <input type="name" class="form-control" name="name" value="{{$business->name ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">수신 전화번호</label>
                            <input type="tel" class="form-control" name="tel" value="{{$business->tel ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">표시 전화번호</label>
                            <input type="tel_view" class="form-control" name="tel_view" value="{{$business->tel_view ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">이메일</label>
                            <input type="email" class="form-control" name="email" value="{{$business->email ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="submit" class="btn btn-primary text-white save-btn">저장</button>
                        <a href="/admin/business" class="btn btn-info text-white">목록</a>
                    </div>
                </div>
            </div>
        </form>
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
