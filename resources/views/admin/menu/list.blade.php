@extends('layouts.admin')


@section('content')
<h1>메뉴</h1>
<div class="container">
    <div class="row">

        <div class="w-100 text-lg" id="list">
            @foreach ($menus as $menu)
            <span class="border">
                {{ $menu->name }}
                <a class="btn btn-outline-info btn-xs" href="/admin/menu/{{ $menu->id }}/edit">수정</a>
                <a class="btn btn-outline-info btn-xs" href="/admin/menu/create?parent_id={{ $menu->id }}&depth={{ $menu->depth }}">하위 추가</a>
            </span>
            <br/>

            @if(isset($menu->childrens) && count($menu->childrens) > 0)
                @include('admin.menu.menusub',['childrens' => $menu->childrens])
            @endif
            @endforeach
        </div>

        <div class="col-md-12 text-right">
            <a class="btn btn-primary text-white" href="/admin/menu/create?parent_id=0&depth=0">추가</a>
        </div>
    </div>
</div>

<script>
const menu_list = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
    }

    init();
}

window.onload = function(){
    menu_list();
}
</script>
@endsection
