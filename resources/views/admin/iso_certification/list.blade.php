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
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">최초인증일</th>
                            <th class="text-center">구분</th>
                            <th class="text-center">인증규격</th>
                            <th class="text-center">인증번호</th>
                            <th class="text-center">업로드파일</th>
                            <th class="text-center">등록일</th>
                            <th class="text-center">관리</th>
                        </tr>
                        @foreach ($certifications as $certification)
                        <tr>
                            <td class="text-center">{{ $certification->id }}</td>
                            <td class="text-center">{{ $certification->first_date }}</td>
                            <td class="text-center">{{ $certification->type }}</td>
                            <td class="text-center">{{ $certification->standard }}</td>
                            <td class="text-center">{{ $certification->number }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-info btn-xs" href="/admin/iso_certification/file-download?id={{ $certification->id }}">파일</button>
                            </td>
                            <td class="text-center">{{ $certification->updated_at ?? $certification->created_at}}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-warning btn-xs" href="/admin/iso_certification/{{ $certification->id }}/edit">수정</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if($certifications->count())
                    {{$certifications->links("pagination::bootstrap-4")}}
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/admin/iso_certification/create">ISO인증서 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop
