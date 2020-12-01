@extends('adminlte::page')

@section('title', 'ISO인증서 관리')

@section('content_header')
    <h1>ISO인증서 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>ISO인증서 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" id="iso-certification-form" class="form col-12 col-lg-6" method="POST" enctype="multipart/form-data">
            @isset ($certification)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">최초인증일</label>
                            <input type="text" class="form-control w-auto datepicker" name="first_date" value="{{$certification->first_date ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">구분</label>
                            <input type="text" class="form-control" name="type" value="{{$certification->type ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">인증규격</label>
                            <input type="text" class="form-control" name="standard" value="{{$certification->standard ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">인증번호</label>
                            <input type="text" class="form-control" name="number" value="{{$certification->number ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">파일</label>
                            <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="file">
                            <input type="hidden" name="file_name" value="{{$certification->file_name ?? ''}}">
                            <input type="hidden" name="file_path" value="{{$certification->file_path ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{-- 수정일때만 보임 --}}
                        @isset ($certification)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                        <button type="button" class="btn btn-primary text-white add-btn">저장</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
const iso_certification_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //저장 버튼 클릭시
        $('.add-btn').on('click', function() {
            if (validation()) {
                $('#iso-certification-form').submit();
            }
        });

        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 ISO인증서를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('#iso-certification-form').submit();
            }
        });
    }

    const validation = () => {
        if ($('input[name=first_date]').val() == '' || $('input[name=first_date]').val() == null) {
            alert('최초인증일을 선택해주세요.');
            return false;

        } else if ($('input[name=type]').val() == '' || $('input[name=type]').val() == null) {
            alert('구분을 입력해주세요.');
            $('input[name=type]').focus();
            return false;

        } else if ($('input[name=standard]').val() == '' || $('input[name=standard]').val() == null) {
            alert('인증규격을 입력해주세요.');
            $('input[name=standard]').focus();
            return false;

        } else if ($('input[name=number]').val() == '' || $('input[name=number]').val() == null) {
            alert('인증번호를 입력해주세요.');
            $('input[name=number]').focus();
            return false;

        } else if (($('input[name=file_path]').val() == '' || $('input[name=file_path]').val() == null)
                    && ($('input[name=file]').val() == '' || $('input[name=file]').val() == null)) {
            alert('파일을 선택해주세요.');
            return false;
        }
        return true;
    }

    init();
}

window.onload = function(){
    iso_certification_create();
}
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/isoCertification.es5.js') }}"></script>
@stop
