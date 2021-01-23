@extends('adminlte::page')

@section('title', 'IR 공고 관리')

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
        <form action="{{ $action }}" class="form col-12 col-lg-12 board-form" method="POST" enctype="multipart/form-data">
            @isset ($board)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                        <div class="form-group">
                            <label for="">제목</label>
                            <input type="text" class="form-control" name="title" value="{{$board->title ?? ''}}">
                            <input type="hidden" class="form-control" name="id" value="{{$board->id ?? 0}}">
                        </div>
                        <div class="form-group">
                            <label for="">내용</label><br>
                            <textarea rows="5" class="form-control tinymce-editor" name="contents">{{$board->contents ?? ''}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">이미지파일</label>
                                    <input type="file" accept=".gif, .jpeg, .jpg, .png" class="d-block" name="img_file">
                                    <input type="hidden" name="img_file_path" value="{{$board->img_file_path ?? ''}}">
                                    <input type="text" name="img_file_name" readonly class="form-control" value="{{$board->img_file_name ?? ''}}">
                                </div>
                                @if ( $board->img_file_name )
                                <div class="form-group">
                                    <div>
                                        <img src="/eng/storage/{{$board->img_file_path}}" alt="" style="max-height: 200px">
                                    </div>
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">이미지 삭제</label>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="">PDF파일</label>
                                    <input type="file" accept=".pdf" class="d-block" name="pdf_file">
                                    <input type="text" name="pdf_file_name" readonly class="form-control" value="{{$board->pdf_file_name ?? ''}}">
                                    <input type="hidden" name="pdf_file_path" value="{{$board->pdf_file_path ?? ''}}">
                                </div>
                                @if ( $board->pdf_file_name )
                                <div class="form-group">
                                    <input type="checkbox" name="del_img" id="del_img" class="">
                                    <label for="del_img">PDF 삭제</label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-primary text-white save-btn">저장</button>
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

<script src="https://cdn.tiny.cloud/1/dooz8iy4tgsa8o5kr7a225fgpo6mjh0z4c7yfty1gsxw4ytp/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    const ir_create = () => {

        const init = () => {
            event_listener();
        };

        const event_listener = () => {

             //저장 버튼 클릭시
            $('.save-btn').on('click', function() {
                if (validation()) {
                     $('.board-form').submit();
                }
            });

            //삭제 버튼 클릭시
            $('.del-btn').on('click', function() {
                if (confirm('해당 IR공고를 삭제하시겠습니까?')) {
                    $('input[name=_method]').val('DELETE');
                    $('.board-form').submit();
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
            if ($('input[name=title]').val() == '' || $('input[name=title]').val() == null) {
                alert('제목을 선택해주세요.');
                $('input[name=title]').focus();
                return false;

            // } else if (($('input[name=img_file_path]').val() == '' || $('input[name=img_file_path]').val() == null)
            //         && ($('input[name=img_file]').val() == '' || $('input[name=img_file]').val() == null)) {
            //     alert('이미지파일을 선택해주세요.');
            //     return false;

            // } else if (($('input[name=pdf_file_path]').val() == '' || $('input[name=pdf_file_path]').val() == null)
            //             && ($('input[name=pdf_file]').val() == '' || $('input[name=pdf_file]').val() == null)) {
            //     alert('PDF파일을 선택해주세요.');
            //     return false;
            }
            return true;
        }

        init();
    }

    window.onload = function(){
        ir_create();
    }
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/eng/css/admin.css">
@stop

@section('js')
    <script src="/eng/js/admin/manifest.js"></script>
    <script src="/eng/js/admin/vendor.js"></script>
@stop





