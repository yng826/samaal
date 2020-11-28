@extends('adminlte::page')

@section('title', '메뉴')

@section('content_header')
    <h1>재무정보 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>재무정보 추가/수정</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" class="form col-12" method="POST">
            @isset ($info)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">연도</label>
                            <input type="text" class="form-control w-50" name="info_year1" value="{{$info->info_year ?? $new_info_year}}" disabled>
                            <input type="hidden" class="form-control w-50" name="info_year" value="{{$info->info_year ?? $new_info_year}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_매출액</label>
                            <input type="text" class="form-control w-50" id="connect_sales" name="connect_sales" value="{{$info->connect_sales ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_영업이익</label>
                            <input type="text" class="form-control w-50" id="connect_operating_income" name="connect_operating_income" value="{{$info->connect_operating_income ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_당기순이익</label>
                            <input type="text" class="form-control w-50" id="connect_net_income" name="connect_net_income" value="{{$info->connect_net_income ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_자산</label>
                            <input type="text" class="form-control w-50" id="connect_assets" name="connect_assets" value="{{$info->connect_assets ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_부채</label>
                            <input type="text" class="form-control w-50" id="connect_liability" name="connect_liability" value="{{$info->connect_liability ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_매출액</label>
                            <input type="text" class="form-control w-50" id="separate_sales" name="separate_sales" value="{{$info->separate_sales ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_영업이익</label>
                            <input type="text" class="form-control w-50" id="separate_operating_income" name="separate_operating_income" value="{{$info->separate_operating_income ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_당기순이익</label>
                            <input type="text" class="form-control w-50" id="separate_net_income" name="separate_net_income" value="{{$info->separate_net_income ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_자산</label>
                            <input type="text" class="form-control w-50" id="separate_assets" name="separate_assets" value="{{$info->separate_assets ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_부채</label>
                            <input type="text" class="form-control w-50" id="separate_liability" value="{{$info->separate_liability ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary text-white save-btn">저장</button>
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
            numeric_chk();
        };

        const event_listener = () => {
            //저장 버튼 클릭시
            $('.save-btn').on('click', function() {
                if (confirm('저장하시겠습니까?')) {
                    $('form').submit();
                }
            });


        }
        const numeric_chk = () => {

            // 숫자만
            $('#connect_sales, #connect_operating_income, #connect_net_income, #connect_assets, #connect_liability').on('input', function(e){
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#separate_sales, #separate_operating_income, #separate_net_income, #separate_assets, #separate_liability').on('input', function(e){
                this.value = this.value.replace(/[^0-9]/g, '');
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


