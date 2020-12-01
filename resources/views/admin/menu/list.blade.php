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
                    <button type="button" class="btn btn-primary text-white" onClick="location.href='/admin/menu/create?parent_id=0&depth=0'">추가</button>
                </div>
            </div>

            <form action="/admin/menu/order-update" id="order-form" class="hide" method="POST">
                @csrf
                <input type="hidden" name="orders">
            </form>
        </div>
    </div>
</div>

<script>
const menu_list = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //순서저장 버튼 클릭시
        $('.menu-order-btn').on('click', function() {
            let order_arr = new Array();
            const id =  $('#treeMenu input[name=id]').val().slice(0, -1).split(','); //자신 아이디(마지막 공백 쉼표 제거)
            const depth =  $('#treeMenu input[name=depth]').val().split(','); //자신 위치
            const parent_id =  $('#treeMenu input[name=parent_id]').val().split(','); //부모 아이디

            $.each(id, function(index, item){
                order_arr.push({'id': item, 'order_id': index+1, 'depth': depth[index], 'parent_id': parent_id[index]});
            });
            $('input[name=orders]').val(JSON.stringify(order_arr));

            $('#order-form').submit();
        });
    }

    init();
}

window.onload = function(){
    menu_list();
}
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/menu.es5.js') }}"></script>
@stop
