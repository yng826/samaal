@extends('layouts.admin')


@section('content')
<h1>메뉴</h1>
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ $action }}" class="form col-12" method="POST">
            @isset ( $menu )
                @method('PUT')
            @endisset
            @csrf
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
                <select class="form-control">
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">부모ID</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>사이트 노출</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_front" value="1">
                  <label class="form-check-label">예</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_front" value="0">
                  <label class="form-check-label">아니오</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">저장</button>
        </form>
    </div>
</div>
@endsection
