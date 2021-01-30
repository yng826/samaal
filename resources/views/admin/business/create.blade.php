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
                    <h3>제품 관리 수정</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" class="form col-12 col-lg-6 business-form" method="POST" enctype="multipart/form-data">
            @isset ($business)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                @if (!empty($error))
                    <div class="alert alert-danger">
                        <ul class="error">
                            <li class="error">{{ $error }}</li>
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" class="form-control" name="url" value="{{$business->url ?? ''}}" {{$url_disabled}}>
                        </div>
                        <div class="form-group">
                            <label for="">문의 제목</label>
                            <input type="question_title" class="form-control" name="question_title" value="{{$business->question_title ?? ''}}" placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">담당자명</label>
                            <input type="name" class="form-control" name="name" value="{{$business->name ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">수신 전화번호</label>
                            <input type="tel" class="form-control" name="tel" value="{{$business->tel ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">표시 전화번호</label>
                            <input type="tel_view" class="form-control" name="tel_view" value="{{$business->tel_view ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">이메일</label>
                            <input type="email" class="form-control" name="email" value="{{$business->email ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="form-group">
                            <label for="">뷰</label>
                            <input type="text" class="form-control" name="view" value="{{$business->view ?? ''}}"  placeholder="입력해주세요.">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">이미지파일(Intro화면)</label>
                                    <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file_1">
                                    <input type="hidden" name="img_file_1_path" value="{{$business->img_file_1_path ?? ''}}">
                                    <input type="text" name="img_file_1_name" readonly class="form-control" value="{{$business->img_file_1_name ?? ''}}">
                                </div>
                                @if ( isset($business) )
                                @if ( $business->img_file_1_name )
                                <div class="form-group">
                                    <div>
                                        <img src="/kor/storage/{{$business->img_file_1_path}}" alt="" style="max-height: 200px">
                                    </div>
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">이미지 삭제</label>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">이미지파일(Intro화면 hover)</label>
                                    <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file_2">
                                    <input type="hidden" name="img_file_2_path" value="{{$business->img_file_2_path ?? ''}}">
                                    <input type="text" name="img_file_2_name" readonly class="form-control" value="{{$business->img_file_2_name ?? ''}}">
                                </div>
                                @if ( isset($business) )
                                @if ( $business->img_file_2_name )
                                <div class="form-group">
                                    <div>
                                        <img src="/kor/storage/{{$business->img_file_2_path}}" alt="" style="max-height: 200px">
                                    </div>
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">이미지 삭제</label>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">이미지파일</label>
                                    <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file_3">
                                    <input type="hidden" name="img_file_3_path" value="{{$business->img_file_3_path ?? ''}}">
                                    <input type="text" name="img_file_3_name" readonly class="form-control" value="{{$business->img_file_3_name ?? ''}}">
                                </div>
                                @if ( isset($business) )
                                @if ( $business->img_file_3_name )
                                <div class="form-group">
                                    <div>
                                        <img src="/kor/storage/{{$business->img_file_3_path}}" alt="" style="max-height: 200px">
                                    </div>
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">이미지 삭제</label>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">이미지파일</label>
                                    <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file_4">
                                    <input type="hidden" name="img_file_4_path" value="{{$business->img_file_4_path ?? ''}}">
                                    <input type="text" name="img_file_4_name" readonly class="form-control" value="{{$business->img_file_4_name ?? ''}}">
                                </div>
                                @if ( isset($business) )
                                @if ( $business->img_file_4_name )
                                <div class="form-group">
                                    <div>
                                        <img src="/kor/storage/{{$business->img_file_4_path}}" alt="" style="max-height: 200px">
                                    </div>
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">이미지 삭제</label>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">이미지파일</label>
                                    <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file_5">
                                    <input type="hidden" name="img_file_5_path" value="{{$business->img_file_5_path ?? ''}}">
                                    <input type="text" name="img_file_5_name" readonly class="form-control" value="{{$business->img_file_5_name ?? ''}}">
                                </div>
                                @if ( isset($business) )
                                @if ( $business->img_file_5_name )
                                <div class="form-group">
                                    <div>
                                        <img src="/kor/storage/{{$business->img_file_5_path}}" alt="" style="max-height: 200px">
                                    </div>
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">이미지 삭제</label>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="submit" class="btn btn-primary text-white save-btn">저장</button>
                        <a href="/kor/admin/business" class="btn btn-info text-white">목록</a>
                    </div>
                </div>
            </div>
        </form>
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
