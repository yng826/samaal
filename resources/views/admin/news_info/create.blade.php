@extends('layouts.admin')


@section('content')
<h1>뉴스 관리</h1>
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ $action }}" class="form col-12" method="POST">
            @isset ( $info )
                @method('PUT')
            @endisset
            @csrf
            <div class="form-group">
                <label for="">제목</label>
                <input type="text" class="form-control" name="title" value="{{$info->title ?? ''}}">
                <input type="hidden" class="form-control" name="idx" value="{{$info->idx ?? 0}}">
            </div>
            <div class="form-group">
                <label for="">내용</label>
                <input type="textarea"rows="5" cols="30" class="form-control" name="contents" value="{{$info->contents ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">이미지_URL</label>
                <input type="text" class="form-control" name="img_url" value="{{$info->img_url ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">URL</label>
                <input type="text" class="form-control" name="url" value="{{$info->url ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">사용여부</label>
                <input type="hidden" name="use_yn" value="{{$info->use_yn ?? 'n'}}">
                <div class="form-check">
                    <input class="form-check-input" name="use_yn1" type="checkbox" value="y" {{ isset($info) && $info->use_yn == 'y' ? 'checked' :''}}>
                    <label class="form-check-label">사용</label>
                  </div>

            </div>
            <button type="submit" class="btn btn-primary">저장</button>
        </form>
    </div>
</div>
<script>
    const menu_create = () => {

        const init = () => {
            event_listener();
            use_yn();
        };

        const event_listener = () => {
            //저장 버튼 클릭시
            $('.save-btn').on('click', function() {

                if (confirm('저장하시겠습니까?')) {
                    $('form').submit();
                }
            });


        }

        const use_yn = () => {
            $('input[name="use_yn1"]').on('click', function() {
                if($('input[name="use_yn1"]:checked').length ==0){
                    $('input[name=use_yn]').val('n');
                }else{
                    $('input[name=use_yn]').val('y');
                }
            });


        }


        init();
    }

    window.onload = function(){
        menu_create();
    }
</script>
@endsection




