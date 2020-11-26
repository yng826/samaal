@extends('adminlte::page')

@section('title', '메뉴')

@section('content_header')
    <h1>메뉴 설정</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>메뉴 추가/수정/삭제/이동</h3>
                </div>
            </div>
        </div>

        <form action="{{ $action }}" class="form col-12" method="POST">
            @isset ($menu)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">메뉴명</label>
                            <input type="text" class="form-control w-50" name="name" value="{{$menu->name ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" class="form-control w-50" name="url" value="{{$menu->url ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label>메뉴 종류</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="menu_type" value="in_link" {{ isset($menu) && $menu->menu_type == 'in_link' ? 'checked' :''}}>
                              <label class="form-check-label">내부링크</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="menu_type" value="out_link" {{ isset($menu) && $menu->menu_type == 'out_link' ? 'checked' :''}}>
                              <label class="form-check-label">외부링크</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="menu_type" value="file" {{ isset($menu) && $menu->menu_type == 'file' ? 'checked' :''}}>
                              <label class="form-check-label">파일</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Depth</label>
                            <input type="text" class="form-control w-50" name="depth" value="{{ isset($depth) ? $depth+1 : $menu->depth }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">부모ID</label>
                            <input type="text" class="form-control w-50" name="parent_id" value="{{ $parent_id ?? $menu->parent_id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>사이트 노출</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="is_front" value="1" {{ isset($menu) && $menu->is_front == 1 ? 'checked' :''}}>
                              <label class="form-check-label">예</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="is_front" value="0" {{ isset($menu) && $menu->is_front == 0 ? 'checked' :''}}>
                              <label class="form-check-label">아니오</label>
                            </div>
                        </div>


                        {{-- 수정일때만 보임 --}}
                        @if(isset($menu->id) > 0)
                        <div class="form-group">
                            <label>키워드</label>
                            <div class="form-inline">
                                <input type="text" class="form-control w-50" id="keyword">
                                <button type="button" class="btn btn-primary text-white keyword-add-btn">추가</button>
                            </div>

                            <div id="keyword-div">
                                @foreach($menu_keywords as $menu_keyword)
                                <div class="form-inline">
                                    <input type="text" class="form-control d-inline-block w-50" name="keyword[]" value="{{ $menu_keyword->keyword }}">
                                    <button type="button" class="btn btn-danger text-white keyword-del-btn">삭제</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{-- 수정일때만 보임 --}}
                        @if(isset($menu->id) > 0)
                        <button type="button" class="btn btn-danger text-white menu-del-btn">삭제</button>
                        @endif

                        <button type="submit" class="btn btn-primary text-white">저장</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
const menu_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //메뉴 삭제 버튼 클릭시
        $('.menu-del-btn').on('click', function() {
            if (confirm('해당 메뉴를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('form').submit();
            }
        });

        //키워드 추가 버튼 클릭시
        $('.keyword-add-btn').on('click', function() {
            const val = $('#keyword').val();
            let html = '<div class="form-inline">';
            html += '<input type="text" class="form-control d-inline-block w-50" name="keyword[]" value="'+val+'">';
            html += '<button type="button" class="btn btn-danger text-white keyword-del-btn">삭제</button>';
            html += '</div>';
            $('#keyword-div').append(html);
            $('#keyword').val('');
        });

        //키워드 삭제 버튼 클릭시
        $(document).on('click', '.keyword-del-btn', function() {
            $(this).parent().remove();
        });
    }

    init();
}

window.onload = function(){
    menu_create();
}
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop
