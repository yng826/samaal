@extends('adminlte::page')

@section('title', '메뉴')

@section('content_header')
    <h1>IR 공고 관리</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>IR 공고 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" class="form col-12" method="POST" enctype="multipart/form-data">
            @isset ($board)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">분류</label>
                            <select class="form-control w-auto" name="category">
                                <option value="">::선택::</option>
                                <option value="연결재무" {{ isset($board) && $board->category == '연결재무' ? 'selected' :''}}>연결재무</option>
                                <option value="별도재무" {{ isset($board) && $board->category == '별도재무' ? 'selected' :''}}>별도재무</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">제목</label>
                            <input type="text" class="form-control w-50" name="title" value="{{$board->title ?? ''}}">
                            <input type="hidden" class="form-control w-50" name="id" value="{{$board->id ?? 0}}">
                        </div>
                        <div class="form-group">
                            <label for="">내용</label><br>
                            <textarea rows="5" class="form-control w-50 tinymce-editor" name="contents">{{$board->contents ?? ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">첨부 파일</label>
                            <input type="file" accept="*.*" class="d-block" name="file">
                            <input type="hidden" name="file_name" value="{{$board->file_name ?? ''}}">
                            <input type="hidden" name="file_path" value="{{$board->file_path ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-primary text-white add-btn">저장</button>
                        {{-- 수정일때만 보임 --}}
                        @isset ($board)
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
        };

        const event_listener = () => {

             //저장 버튼 클릭시
            $('.add-btn').on('click', function() {
                if (validation()) {
                     $('form').submit();
                }
            });

            //삭제 버튼 클릭시
            $('.del-btn').on('click', function() {
                if (confirm('해당 IR공고를 삭제하시겠습니까?')) {
                    $('input[name=_method]').val('DELETE');
                    $('form').submit();
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

        const validation = () => {
            if ($('select[name=category]').val() == '' || $('select[name=category]').val() == null) {
                alert('분류를 선택해주세요.');
                return false;

            } else if ($('input[name=title]').val() == '' || $('input[name=title]').val() == null) {
                alert('제목을 선택해주세요.');
                $('input[name=title]').focus();
                return false;

            } else if (($('input[name=file_path]').val() == '' || $('input[name=file_path]').val() == null)
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






