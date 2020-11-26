@extends('adminlte::page')

@section('title', '메뉴')

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
        <form action="{{ $action }}" class="form col-12" method="POST">
            @isset ($certification)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">최초인증일</label>
                            <input type="text" class="form-control w-50 datepicker" name="first_date" value="{{$certification->first_date ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">구분</label>
                            <input type="text" class="form-control w-50" name="type" value="{{$certification->type ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">인증규격</label>
                            <input type="text" class="form-control w-50" name="standard" value="{{$certification->standard ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">인증번호</label>
                            <input type="text" class="form-control w-50" name="number" value="{{$certification->number ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">파일</label>
                            <input type="file" accept=".gif, .jpg, .png" class="form-control w-50" name="file_path" value="{{$certification->file_path ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{-- 수정일때만 보임 --}}
                        @if(isset($certification->id) > 0)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endif

                        <button type="submit" class="btn btn-primary text-white">저장</button>
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
        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 ISO인증서를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('form').submit();
            }
        });
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
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/isoCertification.es5.js') }}"></script>
@stop
