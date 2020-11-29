@extends('adminlte::page')

@section('title', '메뉴')

@section('content_header')
    <h1>뉴스 관리</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>뉴스 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" class="form col-12 col-lg-6 news-form" method="POST" enctype="multipart/form-data">
            @isset ($info)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">제목</label>
                            <input type="text" class="form-control w-50" name="title" value="{{$info->title ?? ''}}">
                            <input type="hidden" class="form-control w-50" name="id" value="{{$info->id ?? 0}}">
                        </div>
                        <div class="form-group">
                            <label for="">내용</label><br>
                            <textarea rows="5" class="form-control w-50 tinymce-editor" name="contents">{{$info->contents ?? ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" class="form-control w-50" name="url" value="{{$info->url ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">사용여부</label>
                            <input type="hidden" name="use_yn" value="{{$info->use_yn ?? 'n'}}">
                            <div class="form-check">
                                <input class="form-check-input" name="use_yn1" type="checkbox" value="y" {{ isset($info) && $info->use_yn == 'y' ? 'checked' :''}}>
                                <label class="form-check-label">사용</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">이미지 파일</label>
                            <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="file">
                            <input type="hidden" name="img_file_name" value="{{$info->img_file_name ?? ''}}">
                            <input type="hidden" name="img_file_path" value="{{$info->img_file_path ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-primary text-white save-btn">저장</button>
                        {{-- 수정일때만 보임 --}}
                        @isset ($info)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    const news_create = () => {

        const init = () => {
            event_listener();
            use_yn();
        };

        const event_listener = () => {

             //저장 버튼 클릭시
            $('.save-btn').on('click', function() {
                if (validation()) {
                     $('.news-form').submit();
                }
            });

            //삭제 버튼 클릭시
            $('.del-btn').on('click', function() {
                if (confirm('해당 뉴스를 삭제하시겠습니까?')) {
                    $('input[name=_method]').val('DELETE');
                    $('.news-form').submit();
                }
            });


            tinymce.init({
                selector: 'textarea.tinymce-editor',
                directionality: document.dir,
                path_absolute: "/",
                menubar: 'edit insert view format table',
                plugins: [
                    "advlist autolink lists link image charmap preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media save table contextmenu directionality",
                    "paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen code",
                relative_urls: false,
                language: 'ko_KR',
                height: 300,

                automatic_uploads : false,

                images_upload_handler : function(blobInfo, success, failure) {
                    var xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;

                    xhr.onload = function() {
                        var json;

                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }

                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.file_path != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        success(json.file_path);
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                },
            });
        }

        const use_yn = () => {
            $('input[name="use_yn1"]').on('click', function() {
                if($('input[name="use_yn1"]:checked').length ==0){
                    $('input[name=use_yn]').val('n');
                }else{
                    $('input[name=use_yn]').val('y');
                }
            });
        }

        const validation = () => {
            if ($('input[name=title]').val() == '' || $('input[name=title]').val() == null) {
                alert('제목을 선택해주세요.');
                $('input[name=title]').focus();
                return false;

            } else if ($('input[name=url]').val() == '' || $('input[name=url]').val() == null) {
                alert('URL을 입력해주세요.');
                $('input[name=url]').focus();
                return false;

            } else if (($('input[name=img_file_path]').val() == '' || $('input[name=img_file_path]').val() == null)
                        && ($('input[name=file]').val() == '' || $('input[name=file]').val() == null)) {
                alert('파일을 선택해주세요.');
                return false;
            }
            return true;
        }

        init();
    }

    window.onload = function(){
        news_create();
    }
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop






