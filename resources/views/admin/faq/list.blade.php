@extends('adminlte::page')

@section('title', 'FAQ 관리')

@section('content_header')
    <h1>FAQ 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>FAQ 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">분류</th>
                            <th class="text-center">질문</th>
                            <th class="text-center">등록일</th>
                            <th class="text-center">관리</th>
                        </tr>
                        @foreach ($faqs as $faq)
                        <tr>
                            <td class="text-center">{{ $faq->id }}</td>
                            <td class="text-center">
                                @if ($faq->category_id == 1)
                                    채용절차
                                @elseif ($faq->category_id == 2)
                                    지원서 작성/수정
                                @elseif ($faq->category_id == 3)
                                    기타
                                @endif
                            </td>
                            <td class="text-center">{{ $faq->question }}</td>
                            <td class="text-center">{{ $faq->updated_at ?? $faq->created_at}}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-warning btn-xs" href="/admin/faq/{{ $faq->id }}/edit">수정</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if($faqs->count())
                    {{$faqs->links("pagination::bootstrap-4")}}
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-primary text-white" href="/admin/faq/create">FAQ 추가</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
@stop
