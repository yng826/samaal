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
                            <th class="text-center">등록일</th>
                            <th class="text-center">관리</th>
                        </tr>
                        @foreach ($recruits as $recruit)
                        <tr>
                            <td class="text-center">{{ $recruit->id }}</td>
                            <td class="text-center">{{ $recruit->career == 'new' ? '신입' : '경력' }}</td>
                            <td class="text-center">{{ $recruit->job_type }}</td>
                            <td class="text-center">{{ $recruit->title }}</td>
                            <td class="text-center">{{ $recruit->updated_at ?? $recruit->created_at}}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-warning btn-xs" href="/admin/recruit/{{ $recruit->id }}/edit">수정</button>
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
                    <a class="btn btn-primary text-white" href="/admin/recruit/create">채용 공고 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop