@extends('adminlte::page')

@section('title', 'ISO인증서 내역')

@section('content_header')
    <h1>ISO인증서 내역</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <tr>
                <th class="text-center">번호</th>
                <th class="text-center">최초인증일</th>
                <th class="text-center">구분</th>
                <th class="text-center">인증규격</th>
                <th class="text-center">인증번호</th>
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
                <td class="text-center">{{ $certification->updated_at ?? $certification->created_at}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-warning btn-xs" href="/admin/iso_certification/{{ $certification->id }}/edit">수정</button>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="col-md-12 text-right">
            <a class="btn btn-primary text-white" href="/admin/iso_certification/create">ISO인증서 추가</a>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop
