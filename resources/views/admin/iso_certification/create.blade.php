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
            <form action="{{ $action }}" id="iso-certification-form" class="form col-12 col-lg-6" method="POST" enctype="multipart/form-data">
                @isset ($certification)
                    @method('PUT')
                @endisset
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">최초인증일</label>
                            <input type="text" class="form-control w-auto datepicker" name="first_date" value="{{$certification->first_date ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">구분</label>
                            <input type="text" class="form-control" name="type" value="{{$certification->type ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">인증규격</label>
                            <input type="text" class="form-control" name="standard" value="{{$certification->standard ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">인증번호</label>
                            <input type="text" class="form-control" name="number" value="{{$certification->number ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">이미지파일</label>
                            @if ($certification->img_file_name)
                            <div>
                                <img src="/eng/storage/{{$certification->img_file_path}}" alt="" style="max-height: 200px">
                            </div>
                            @endif
                            <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file">
                            <input type="hidden" name="img_file_name" value="{{$certification->img_file_name ?? ''}}">
                            <input type="hidden" name="img_file_path" value="{{$certification->img_file_path ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">PDF파일</label>
                            @if ($certification->pdf_file_name)
                            <div>
                            <span>{{$certification->pdf_file_name}}</span>
                            </div>
                            @endif
                            <input type="file" accept=".pdf" class="d-block" name="pdf_file">
                            <input type="hidden" name="pdf_file_name" value="{{$certification->pdf_file_name ?? ''}}">
                            <input type="hidden" name="pdf_file_path" value="{{$certification->pdf_file_path ?? ''}}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12">
                    {{-- 수정일때만 보임 --}}
                    @isset ($certification)
                    <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                    @endisset

                    <button type="button" class="btn btn-primary text-white add-btn">저장</button>
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
    <script src="/eng/js/admin/isoCertification.js"></script>
@stop
