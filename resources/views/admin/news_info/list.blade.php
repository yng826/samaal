@extends('adminlte::page')

@section('title', '뉴스 관리')

@section('content_header')
    <h1>뉴스 관리</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>뉴스 리스트</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table"  style="table-layout: fixed;">
                        <tr>
                            <th class="text-center" style="width: 80px;">idx</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">내용</th>
                            <th class="text-center">이미지 첨부파일</th>
                            <th class="text-center">URL</th>
                            <th class="text-center">사용여부</th>
                            <th class="text-center">등록/수정일</th>
                            <th class="text-center" style="width: 80px;">관리</th>
                        </tr>

                        @foreach ($infos as $info)
                        <tr>
                            <td class="text-center">{{ $info->idx }}</td>
                            <td class="text-center text-ov">{{ $info->title }}</td>
                            <td class="text-center text-ov" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $info->contents }}</td>
                            <td class="text-center text-ov">{{ $info->img_file_path }}</td>
                            <td class="text-center text-ov">{{ $info->url }}</td>
                            <td class="text-center text-ov">{{ $info->use_yn == 'y' ? '사용' :'미사용' }}</td>
                            <td class="text-center text-ov">{{ $info->updated_at ?? $info->created_at}}</td>
                            <td class="text-center" ><a class="btn btn-outline-info btn-xs" href="/admin/news_info/{{$info->idx}}/edit">수정</button></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/admin/news_info/create">뉴스 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop
