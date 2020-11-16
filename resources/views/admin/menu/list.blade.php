@extends('layouts.admin')


@section('content')
<h1>메뉴</h1>
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">메뉴명</th>
                <th class="text-center">url</th>
                <th class="text-center">메뉴종류</th>
                <th class="text-center">depth</th>
                <th class="text-center">부모ID</th>
                <th class="text-center">화면노출</th>
                <th class="text-center">관리</th>
            </tr>
            @foreach ($menus as $menu)
            <tr>
                <td class="text-center">{{ $menu->id }}</td>
                <td class="text-center">{{ $menu->name }}</td>
                <td class="text-center">{{ $menu->url }}</td>
                <td class="text-center">{{ $menu->menu_type }}</td>
                <td class="text-center">{{ $menu->depth }}</td>
                <td class="text-center">{{ $menu->parent_id }}</td>
                <td class="text-center">{{ $menu->is_front }}</td>
                <td class="text-center"><a class="btn btn-outline-info btn-xs" href="/admin/menu/{{$menu->id}}/edit">수정</button></td>
            </tr>
            @endforeach
        </table>
        <div class="col-md-12 text-right">
            <a class="btn btn-primary text-white" href="/admin/menu/create">추가</a>
        </div>
    </div>
</div>
@endsection
