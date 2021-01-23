@extends('adminlte::page')

@section('title', '사이트맵 관리')

@section('content_header')
    <h1>사이트맵 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>사이트맵 추가/수정/삭제/이동</h3>
                </div>
            </div>
        </div>

        <form action="{{ $action }}" id="sitemap-form" class="form col-12 col-lg-6" method="POST">
            @isset ($sitemap)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">사이트맵명</label>
                            <input type="text" class="form-control" name="name" value="{{$sitemap->name ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" class="form-control" name="url" value="{{$sitemap->url ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label>사이트맵 종류</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="sitemap_type1" name="sitemap_type" value="in_link" {{ isset($sitemap) && $sitemap->sitemap_type == 'in_link' ? 'checked' :''}}>
                              <label for="sitemap_type1" class="form-check-label">내부링크</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="sitemap_type2" name="sitemap_type" value="out_link" {{ isset($sitemap) && $sitemap->sitemap_type == 'out_link' ? 'checked' :''}}>
                              <label for="sitemap_type2" class="form-check-label">외부링크</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="sitemap_type3" name="sitemap_type" value="file" {{ isset($sitemap) && $sitemap->sitemap_type == 'file' ? 'checked' :''}}>
                              <label for="sitemap_type3" class="form-check-label">파일</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">통합 검색 카테고리</label>
                            <select class="form-control w-auto" name="category_id">
                                <option value="0">::선택::</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}" {{ isset($sitemap) && $sitemap->category_id == $category->id ? 'selected' :''}}>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Depth</label>
                            <input type="text" class="form-control" name="depth" value="{{ isset($depth) ? $depth+1 : $sitemap->depth }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">부모ID</label>
                            <input type="text" class="form-control" name="parent_id" value="{{ $parent_id ?? $sitemap->parent_id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>사이트 노출</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="is_front1" name="is_front" value="1" {{ isset($sitemap) && $sitemap->is_front == 1 ? 'checked' :''}}>
                              <label for="is_front1" class="form-check-label">예</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="is_front2" name="is_front" value="0" {{ isset($sitemap) && $sitemap->is_front == 0 ? 'checked' :''}}>
                              <label for="is_front2" class="form-check-label">아니오</label>
                            </div>
                        </div>

                        @if((isset($depth) ? $depth+1 : $sitemap->depth) == 2)
                        <div class="form-group">
                            <label>우측메뉴 노출</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="is_right1" name="is_right" value="1" {{ isset($sitemap) && $sitemap->is_right == 1 ? 'checked' :''}}>
                              <label for="is_right1" class="form-check-label">예</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="is_right2" name="is_right" value="0" {{ isset($sitemap) && $sitemap->is_right == 0 ? 'checked' :''}}>
                              <label for="is_right2" class="form-check-label">아니오</label>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="is_right" value="0">
                        @endif

                        @empty($sitemap)
                        <div class="form-group">
                            <label>키워드</label>
                            <input type="text" class="form-control w-50" value="수정 화면에서 입력 가능합니다." disabled>
                        </div>
                        @endempty

                        {{-- 수정일때만 보임 --}}
                        @isset ($sitemap)
                        <div class="form-group">
                            <label>키워드</label>
                            <div class="form-inline">
                                <input type="text" class="form-control w-50 mb-1" id="keyword">
                                <button type="button" class="btn btn-primary text-white mb-1 keyword-add-btn">추가</button>
                            </div>

                            <div id="keyword-div">
                                @foreach($sitemap_keywords as $sitemap_keyword)
                                <div class="form-inline">
                                    <input type="text" class="form-control w-50 mb-1" name="keyword[]" value="{{ $sitemap_keyword->keyword }}">
                                    <button type="button" class="btn btn-danger text-white mb-1 keyword-del-btn">삭제</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{-- 수정일때만 보임 --}}
                        @isset ($sitemap)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                        <button type="button" class="btn btn-primary text-white add-btn">저장</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
const sitemap_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //저장 버튼 클릭시
        $('.add-btn').on('click', function() {
            if (validation()) {
                $('#sitemap-form').submit();
            }
        });

        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 사이트맵을 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('#sitemap-form').submit();
            }
        });

        //키워드 추가 버튼 클릭시
        $('.keyword-add-btn').on('click', function() {
            const val = $('#keyword').val();
            let html = '<div class="form-inline">';
            html += '<input type="text" class="form-control w-50 mb-1" name="keyword[]" value="'+val+'">';
            html += '<button type="button" class="btn btn-danger text-white mb-1 keyword-del-btn">삭제</button>';
            html += '</div>';
            $('#keyword-div').append(html);
            $('#keyword').val('');
        });

        //키워드 삭제 버튼 클릭시
        $(document).on('click', '.keyword-del-btn', function() {
            $(this).parent().remove();
        });
    }

    const validation = () => {
        if ($('input[name=name]').val() == '' || $('input[name=name]').val() == null) {
            alert('사이트맵명을 입력해주세요.');
            $('input[name=name]').focus();
            return false;

        } else if ($('input[name=url]').val() == '' || $('input[name=url]').val() == null) {
            alert('URL을 입력해주세요.');
            $('input[name=url]').focus();
            return false;

        } else if ($('input[name=sitemap_type]:checked').val() == '' || $('input[name=sitemap_type]:checked').val() == null) {
            alert('사이트맵 종류를 선택해주세요.');
            return false;

        } else if ($('input[name=is_front]:checked').val() == '' || $('input[name=is_front]:checked').val() == null) {
            alert('사이트 노출을 선택해주세요.');
            return false;

        } else if ($('input[name=depth]').val() == '2' && ($('input[name=is_right]:checked').val() == '' || $('input[name=is_right]:checked').val() == null)) {
            alert('우측메뉴 노출을 선택해주세요.');
            return false;
        }
        return true;
    }

    init();
}

window.onload = function(){
    sitemap_create();
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
