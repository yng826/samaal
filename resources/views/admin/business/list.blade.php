@extends('adminlte::page')

@section('title', '제품 관리')

@section('content_header')
    <h1>제품 관리</h1>
@stop
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>제품 관리 리스트</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table"  style="table-layout: fixed;">
                        <tr>
                            <th class="text-center" style="width: 80px;">번호</th>
                            <th class="text-center">제품명</th>
                            <th class="text-center">담당자명</th>
                            <th class="text-center">수정일</th>
                            <th class="text-center" style="width: 80px;">관리</th>
                        </tr>

                        @foreach ($business as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-left">{{ $item->question_title }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center" ><a class="btn btn-outline-warning btn-xs" href="/kor/admin/business/{{$item->id}}/edit">수정</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                {{-- <div class="row">
                    <div class="col-12 text-center">
                        @if($business->count())
                            {{$business->links("pagination::bootstrap-4")}}
                        @endif
                    </div>
                </div> --}}
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    {{-- <a class="btn btn-primary text-white" href="/kor/admin/user/create">사용자 추가</a> --}}
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
