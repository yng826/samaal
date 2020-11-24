@extends('adminlte::page')

@section('title', '메뉴')

@section('content_header')
    <h1>메뉴</h1>
@stop

@section('content')
<div id="app" class="container">
    <div class="row">
        <draggable-treeview :items="{{ json_encode($menus) }}"></draggable-treeview>
    </div>
    <div class="row">
        <draggable-nested-tree></draggable-nested-tree>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary text-white menu-order-btn">순서저장</button>
            <button type="button" class="btn btn-primary text-white" onClick="location.href='/admin/menu/create?parent_id=0&depth=0'">추가</button>
        </div>
    </div>

    <form action="/admin/menu/order-update" id="order-form" class="hide" method="POST">
        @csrf
        <input type="hidden" name="orders">
    </form>
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
            $('div.v-treeview input[name=id]').each(function(index, item){
                const depth = $(this).parents('div.v-treeview-node__children').length+1;
                let parent_id = depth==1 ? 0 : $(this).closest('div.v-treeview-node__children').prev('div.v-treeview-node__root').find('input[name=id]').val();

                order_arr.push({'id': $(this).val(), 'order_id': index+1, 'depth': depth, 'parent_id': parent_id});
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
    {{-- <script src="{{ mix('/js/vendor.js') }}"></script> --}}
    <script src="{{ mix('/js/admin/menu.js') }}"></script>
@stop
