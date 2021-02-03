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
        <form action="{{ $action }}" class="form col-12 col-lg-6 notice-form" method="POST" enctype="multipart/form-data">
            @isset ($notice)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">제목</label>
                            <input type="text" class="form-control" name="title" value="{{$notice->title ?? ''}}">
                            <input type="hidden" class="form-control" name="id" value="{{$notice->id ?? 0}}">
                        </div>
                        <div class="form-group">
                            <label for="">내용</label><br>
                            <input type="text" class="form-control" name="content" value="{{$notice->content ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">URL</label><br>
                            <input type="text" class="form-control" name="url" value="{{$notice->url ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">순서(낮을수록 상위)</label><br>
                            <input type="text" class="form-control" name="order" type="number" min="0" value="{{$notice->order ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">사용여부</label>
                            <div class="form-check">
                                <input class="form-check-input" name="is_use" id="is_use" type="checkbox" value="1" {{ isset($notice) && $notice->is_use ? 'checked' :''}}>
                                <label class="form-check-label" for="is_use">사용</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">버튼색상</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="button_color" id="color-1" value="8A82FF" {{ isset($notice) && $notice->button_color == '8A82FF' ? 'checked' : ''}}>
                                <label for="color-1" class="form-check-label pl-1 pr-1 text-light" style="background-color: #8A82FF;">#8A82FF</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="button_color" id="color-2" value="331A7F" {{ isset($notice) && $notice->button_color == '331A7F' ? 'checked' : ''}}>
                                <label for="color-2" class="form-check-label pl-1 pr-1 text-light" style="background-color: #331A7F;">#331A7F</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="button_color" id="color-3" value="01011B" {{ isset($notice) && $notice->button_color == '01011B' ? 'checked' : ''}}>
                                <label for="color-3" class="form-check-label pl-1 pr-1 text-light" style="background-color: #01011B;">#01011B</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="button_color" id="color-4" value="600044" {{ isset($notice) && $notice->button_color == '600044' ? 'checked' : ''}}>
                                <label for="color-4" class="form-check-label pl-1 pr-1 text-light" style="background-color: #600044;">#600044</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="button_color" id="color-5" value="DF5796" {{ isset($notice) && $notice->button_color == 'DF5796' ? 'checked' : ''}}>
                                <label for="color-5" class="form-check-label pl-1 pr-1 text-light" style="background-color: #DF5796;">#DF5796</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-primary text-white save-btn">저장</button>
                        {{-- 수정일때만 보임 --}}
                        @isset ($notice)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    const news_create = () => {

        const init = () => {
            event_listener();
            use_yn();
        };

        const event_listener = () => {

             //저장 버튼 클릭시
            $('.save-btn').on('click', function() {
                if (validation()) {
                    if (confirm('저장하시겠습니까?')) {
                        $('.notice-form').trigger('submit');
                    }
                }
            });

            //삭제 버튼 클릭시
            $('.del-btn').on('click', function() {
                if (confirm('해당 팝업를 삭제하시겠습니까?')) {
                    $('input[name=_method]').val('DELETE');
                    $('.notice-form').trigger('submit');
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

        const validation = () => {
            if ($('input[name=title]').val() == '' || $('input[name=title]').val() == null) {
                alert('제목을 선택해주세요.');
                $('input[name=title]').focus();
                return false;

            }
            if ($('input[name=url]').val() == '' || $('input[name=url]').val() == null) {
                alert('URL을 선택해주세요.');
                $('input[name=url]').focus();
                return false;

            }
            if ($('input[name=button_color]').val() == '' || $('input[name=button_color]').val() == null) {
                alert('색상을 선택해주세요.');
                // $('#color-1').focus();
                return false;

            }
            return true;
        }

        init();
    }

    window.onload = function(){
        news_create();
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




