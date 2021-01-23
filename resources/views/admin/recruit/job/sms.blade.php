@extends('adminlte::page')

@section('title', '문자 통보')

@section('content_header')
    <h1>문자 통보</h1>
@stop

@section('content')
<div class="container container-job-sms">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-9 col-xl-10">
                    <h3>문자입력</h3>
                </div>
                <div class="col-3 col-xl-2">
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    @php
                        // $phones = $jobs->pluck('phone_decrypt');
                        $phones_string = $jobs->implode('phone_decrypt', ',');
                    @endphp
                    <input type="text" class="form-control" readonly value="{{ $phones_string }}">
                    <span>개별전송됩니다</span>
                </div>
                <div class="col-12">
                        <textarea name="sms_text" id="sms_text" class="form-control" cols="30" rows="10">안녕하세요. 삼아알미늄입니다.
지원하신 채용에 합격하셨습니다.
자세한 사항은 유선으로 연락드리겠습니다.
감사합니다.</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary text-white">전송</button>
                </div>
            </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">문자 수신 목록</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>이름</th>
                                        <th>이메일</th>
                                        <th>전화번호</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                    <tr>
                                        <td></td>
                                        <td>{{ $job->user->name }}</td>
                                        <td>{{ $job->user->email }}</td>
                                        <td>{{ $job->phone_decrypt }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/eng/css/admin.css">
@stop

@section('js')
    <script src="/eng/js/admin/manifest.js"></script>
    <script src="/eng/js/admin/vendor.js"></script>
    <script src="/eng/js/admin/recruit.js"></script>
@stop
