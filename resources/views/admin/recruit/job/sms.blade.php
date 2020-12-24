@extends('adminlte::page')

@section('title', '합격자 문자 통보')

@section('content_header')
    <h1>합격자 문자 통보</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-9 col-xl-10">
                    <h3>합격자 문자 통보</h3>
                </div>
                <div class="col-3 col-xl-2">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">합격자 목록</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <th></th>
                                    <th>이름</th>
                                    <th>이메일</th>
                                    <th>전화번호</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const job_list = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //변경 버튼 클릭시
        $('.edit-btn').on('click', function() {
            if (validation()) {
                $('#job-form').submit();
            }
        });
    }

    const validation = () => {
        if ($('select[name=status]').val() == '' || $('select[name=status]').val() == null) {
            alert('처리상태를 선택해주세요.');
            return false;
        }
        return true;
    }

    init();
}

window.onload = function(){
    job_list();
}
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
@stop
