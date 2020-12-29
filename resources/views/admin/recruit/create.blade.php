@extends('adminlte::page')

@section('title', '채용 공고 관리')

@section('content_header')
    <h1>채용 공고 관리</h1>
@stop

@section('content')
<div class="container container-recruit-edit">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>채용 공고 추가/수정/삭제/이동</h3>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ $action }}" id="recruit-form" class="form col-12 col-lg-6" method="POST">
                @isset ($recruit)
                    @method('PUT')
                @endisset
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="">채용기간</label>
                            <div class="form-inline">
                                <input type="text" class="form-control w-auto datepicker" name="start_date" value="{{$recruit->start_date ?? ''}}">
                                &nbsp;~&nbsp;<input type="text" class="form-control w-auto datepicker" name="end_date" value="{{$recruit->end_date ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>제목</label>
                            <input type="text" class="form-control" name="title" value="{{$recruit->title ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label>경력</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="career1" name="career" value="new" {{ isset($recruit) && $recruit->career == 'new' ? 'checked' :''}}>
                              <label for="career1" class="form-check-label">신입</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="career2" name="career" value="career" {{ isset($recruit) && $recruit->career == 'career' ? 'checked' :''}}>
                              <label for="career2" class="form-check-label">경력</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">지원직군</label>
                            <select class="form-control w-auto" name="job_type">
                                <option value="">::선택::</option>
                                <option value="영업" {{ isset($recruit) && $recruit->job_type == '영업' ? 'selected' :''}}>영업</option>
                                <option value="생산" {{ isset($recruit) && $recruit->job_type == '생산' ? 'selected' :''}}>생산</option>
                                <option value="품질" {{ isset($recruit) && $recruit->job_type == '품질' ? 'selected' :''}}>품질</option>
                                <option value="경영지원" {{ isset($recruit) && $recruit->job_type == '경영지원' ? 'selected' :''}}>경영지원</option>
                                <option value="생산지원" {{ isset($recruit) && $recruit->job_type == '생산지원' ? 'selected' :''}}>생산지원</option>
                                <option value="R&D" {{ isset($recruit) && $recruit->job_type == 'R&D' ? 'selected' :''}}>R&D</option>
                                <option value="설비" {{ isset($recruit) && $recruit->job_type == '설비' ? 'selected' :''}}>설비</option>
                                <option value="환경안전" {{ isset($recruit) && $recruit->job_type == '환경안전' ? 'selected' :''}}>환경안전</option>
                                <option value="IT" {{ isset($recruit) && $recruit->job_type == 'IT' ? 'selected' :''}}>IT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">지원자격</label>
                            <textarea class="form-control" name="description" rows="8">{{$recruit->description ?? ''}}</textarea>
                        </div>

                        @empty($recruit)
                        <div class="form-group">
                            <label>키워드</label>
                            <div class="form-inline">
                                <input type="text" class="form-control w-50" value="수정 화면에서 입력 가능합니다." disabled>
                            </div>
                        </div>
                        @endempty

                        {{-- 수정일때만 보임 --}}
                        @isset ($recruit)
                        <div class="form-group">
                            <label>키워드</label>
                            <div class="form-inline">
                                <input type="text" class="form-control w-50" id="keyword">
                                <button type="button" class="btn btn-primary text-white keyword-add-btn">추가</button>
                            </div>

                            <div id="keyword-div">
                                @foreach($recruit_keywords as $recruit_keyword)
                                <div class="form-inline">
                                    <input type="text" class="form-control w-50" name="keyword[]" value="{{ $recruit_keyword->keyword }}">
                                    <button type="button" class="btn btn-danger text-white keyword-del-btn">삭제</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endisset
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12">
                    {{-- 수정일때만 보임 --}}
                    @isset ($recruit)
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
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/recruit.js') }}"></script>
@stop
