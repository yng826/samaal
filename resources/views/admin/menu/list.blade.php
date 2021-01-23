@extends('adminlte::page')

@section('title', '메뉴 관리')

@section('content_header')
    <h1>메뉴 관리</h1>
@stop

@section('content')
<div id="app" class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>메뉴 추가/수정/삭제/이동</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <draggable-nested-tree :items="{{ json_encode($menus) }}"></draggable-nested-tree>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-primary text-white menu-order-btn">순서저장</button>
                    <button type="button" class="btn btn-primary text-white" onClick="location.href='/kor/admin/menu/create?parent_id=0&depth=0'">추가</button>
                </div>
            </div>

            <form action="/kor/admin/menu/order-update" id="order-form" class="hide" method="POST">
                @csrf
                <input type="hidden" name="orders">
            </form>
        </div>
    </div>
</div>

<script>
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/kor/css/admin.css">
@stop

@section('js')
    <script src="/kor/js/admin/manifest.js"></script>
    <script src="/kor/js/admin/vendor.js"></script>
    <script src="/kor/js/admin/menu.js"></script>
@stop
