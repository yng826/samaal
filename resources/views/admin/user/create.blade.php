@extends('adminlte::page')

@section('title', '사용자 관리')

@section('content_header')
    <h1>사용자 관리</h1>
@stop

@section('content')

<div class="container user-{{ $user ? 'update':'create'}}">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>사용자 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        @if (!empty($error))
            <div class="alert alert-danger">
                <ul class="error">
                    <li class="error">{{ $error }}</li>
                </ul>
            </div>
        @endif
        <form action="{{ $action }}" class="form col-12 col-lg-6 board-form" method="POST">
            @isset ($user)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">사용자명</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name ?? ''}}" placeholder="입력해주세요.">
                            <input type="hidden" class="form-control" name="id" value="{{$user->id ?? 0}}" >
                        </div>
                        <div class="form-group">
                            <label for="">E-MAIL</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email ?? ''}}" {{ isset($user) ? 'disabled' :''}} placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">역할</label>
                            <select class="form-control w-auto" name="role">
                                <option value="editor" {{ isset($user) && $user->role == 'editor' ? 'selected' :''}}>editor</option>
                                <option value="recruit" {{ isset($user) && $user->role == 'recruit' ? 'selected' :''}}>recruit</option>
                                <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' :''}}>admin</option>
                            </select>
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
                        {{-- 수정일때만 보임 --}}
                        @isset ($user)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const user_create = () => {

        const init = () => {
            event_listener();
        };

        const event_listener = () => {

             //저장 버튼 클릭시
            $('.save-btn').on('click', function() {

                if (validation()) {
                    $('.board-form').submit();
                }
            });

            //삭제 버튼 클릭시
            $('.del-btn').on('click', function() {
                if (confirm('해당 사용자를 삭제하시겠습니까?')) {
                    $('input[name=_method]').val('DELETE');
                    $('.board-form').submit();
                }
            });

        }

        const validation = () => {
            if ($('input[name=name]').val() == '' || $('input[name=name]').val() == null) {
                alert('사용자명을 입력해주세요.');
                $('input[name=name]').focus();
                return false;
            }
            if ($('input[name=email]').val() == '' || $('input[name=email]').val() == null) {
                alert('이메일을 입력해주세요.');
                $('input[name=email]').focus();
                return false;
            }
            if ($('.container').hasClass('user-create')) {
                if ($('input[name=password]').val() == '' || $('input[name=password]').val() == null) {
                    alert('비밀번호를 입력해주세요.');
                    $('input[name=password]').focus();
                    return false;
                }

                var pw = $('input[name=password]').val();
                var num = pw.search(/[0-9]/g);
                var eng = pw.search(/[a-z]/ig);
                var spe = pw.search(/[`~!@#$%^&*()|₩₩₩'₩";:₩/?]/gi);

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
            }

             /* 이메일 체크 */
            var regexEmail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var inputEmail = $("input[name=email]").val();

            if(!regexEmail.test(inputEmail)) {
                alert('이메일 형식이 올바르지 않습니다.');
                $('input[name=email]').focus();

                return false;
            }

            return true;
        }

        init();
    }

    window.onload = function(){
        user_create();
    }
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/eng/css/admin.css">
@stop

@section('js')
    <script src="/eng/js/admin/manifest.js"></script>
    <script src="/eng/js/admin/vendor.js"></script>
@stop





