@extends('adminlte::page')

@section('title', '개인정보 수정')

@section('content_header')
    <h1>개인정보 수정</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>개인정보 수정</h3>
                </div>
            </div>
        </div>
        <form action="/admin/mypage/{{ $user->id }}" id="mypage-form" class="form col-12 col-lg-6" method="POST">
            @method('PUT')
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">사용자명</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="입력해주세요.">
                            <input type="hidden" class="form-control" name="id" value="{{ $user->id }}" >
                        </div>
                        <div class="form-group">
                            <label for="">E-MAIL</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">비밀번호</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary text-white save-btn">저장</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const mypage_create = () => {

        const init = () => {
            event_listener();
        };

        const event_listener = () => {
             //저장 버튼 클릭시
            $('.save-btn').on('click', function() {
                if (validation()) {
                    $('#mypage-form').submit();
                }
            });
        }

        const validation = () => {
            if ($('input[name=name]').val() == '' || $('input[name=name]').val() == null) {
                alert('사용자명을 입력해주세요.');
                $('input[name=name]').focus();
                return false;
            }else if ($('input[name=password]').val() == '' || $('input[name=password]').val() == null) {
                alert('비밀번호를 입력해주세요.');
                $('input[name=password]').focus();
                return false;
            }

            var pw = $('input[name=password]').val();
            var num = pw.search(/[0-9]/g);
            var eng = pw.search(/[a-z]/ig);
            var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(pw.length < 8 || pw.length > 20){
                alert("비밀번호 8자리 ~ 20자리 이내로 입력해주세요.");
                $('input[name=password]').focus();
                return false;
            }else if(pw.search(/\s/) != -1){
                alert("비밀번호는 공백 없이 입력해주세요.");
                $('input[name=password]').focus();
                return false;
            }else if(num < 0 || eng < 0 || spe < 0 ){
                alert("비밀번호 영문,숫자, 특수문자를 혼합하여 입력해주세요.");
                $('input[name=password]').focus();
                return false;
            }

            return true;
        }

        init();
    }

    window.onload = function(){
        mypage_create();
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





