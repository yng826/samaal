@extends('adminlte::page')

@section('title', '메뉴 관리')

@section('content_header')
    <h1>메뉴 관리</h1>
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

        <form action="{{ $action }}" id="menu-form" class="form col-12 col-lg-6" method="POST">
            @isset ($menu)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">메뉴명</label>
                            <input type="text" class="form-control" name="name" value="{{$menu->name ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" class="form-control" name="url" value="{{$menu->url ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label>메뉴 종류</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="menu_type1" name="menu_type" value="in_link" {{ isset($menu) && $menu->menu_type == 'in_link' ? 'checked' :''}}>
                              <label for="menu_type1" class="form-check-label">내부링크</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="menu_type2" name="menu_type" value="out_link" {{ isset($menu) && $menu->menu_type == 'out_link' ? 'checked' :''}}>
                              <label for="menu_type2" class="form-check-label">외부링크</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="menu_type3" name="menu_type" value="file" {{ isset($menu) && $menu->menu_type == 'file' ? 'checked' :''}}>
                              <label for="menu_type3" class="form-check-label">파일</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Depth</label>
                            <input type="text" class="form-control" name="depth" value="{{ isset($depth) ? $depth+1 : $menu->depth }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">부모ID</label>
                            <input type="text" class="form-control" name="parent_id" value="{{ $parent_id ?? $menu->parent_id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>사이트 노출</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="is_front1" name="is_front" value="1" {{ isset($menu) && $menu->is_front == 1 ? 'checked' :''}}>
                              <label for="is_front1" class="form-check-label">예</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" id="is_front2" name="is_front" value="0" {{ isset($menu) && $menu->is_front == 0 ? 'checked' :''}}>
                              <label for="is_front2" class="form-check-label">아니오</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{-- 수정일때만 보임 --}}
                        @isset ($menu)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                        <button type="button" class="btn btn-primary text-white add-btn">저장</button>
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
    <script src="/kor/js/admin/menu.js"></script>
@stop
