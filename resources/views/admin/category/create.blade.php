@extends('adminlte::page')

@section('title', '카테고리 관리')

@section('content_header')
    <h1>카테고리 관리</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>카테고리 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" class="form col-12 col-lg-6 board-form" method="POST" enctype="multipart/form-data">
            @isset ($category)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">카테고리명</label>
                            <input type="text" class="form-control" name="category" value="{{$category->category ?? ''}}">
                            <input type="hidden" class="form-control" name="id" value="{{$category->id ?? 0}}">
                        </div>
                        <div class="form-group">
                            <label for="">순번</label>
                            <input type="text" class="form-control" name="order_id" value="{{$category->order_id ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">

                        <button type="button" class="btn btn-primary text-white save-btn">저장</button>
                        {{-- 수정일때만 보임 --}}
                        @isset ($category)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const category_create = () => {

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
                if (confirm('해당 카테고리를 삭제하시겠습니까?')) {
                    $('input[name=_method]').val('DELETE');
                    $('.board-form').submit();
                }
            });

        }

        const validation = () => {
            if ($('input[name=category]').val() == '' || $('input[name=category]').val() == null) {
                alert('카테고리를 선택해주세요.');
                $('input[name=category]').focus();
                return false;
            }else if ($('input[name=order_id]').val() == '' || $('input[name=order_id]').val() == null) {
                alert('순번을 선택해주세요.');
                $('input[name=order_id]').focus();
                return false;
            }
            return true;
        }

        init();
    }

    window.onload = function(){
        category_create();
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





