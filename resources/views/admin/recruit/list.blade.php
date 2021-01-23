@extends('adminlte::page')

@section('title', '채용 공고 관리')

@section('content_header')
    <h1>채용 공고 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>채용 공고 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">경력</th>
                            <th class="text-center">직군</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">시작일</th>
                            <th class="text-center">종료일</th>
                            <th class="text-center">종료까지</th>
                            <th class="text-center">관리</th>
                        </tr>
                        @foreach ($recruits as $recruit)
                        <tr>
                            <td class="text-center">{{ $recruit->id }}</td>
                            <td class="text-center">{{ $recruit->career == 'new' ? '신입' : '경력' }}</td>
                            <td class="text-center">{{ $recruit->job_type }}</td>
                            <td class="text-center">{{ $recruit->title }}</td>
                            <td class="text-center">{{ $recruit->start_date }}</td>
                            <td class="text-center">{{ $recruit->end_date }}</td>
                            <td class="text-center">{{ $dt <= $recruit->end_date ? $dt->diffForHumans($recruit->end_date) : '종료' }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-warning btn-xs" href="/kor/admin/recruit/{{ $recruit->id }}/edit">수정</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if($recruits->count())
                    {{$recruits->links("pagination::bootstrap-4")}}
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/kor/admin/recruit/create">채용 공고 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/kor/css/admin.css">
@stop

@section('js')
    <script src="/kor/js/admin/manifest.js"></script>
    <script src="/kor/js/admin/vendor.js"></script>
@stop
