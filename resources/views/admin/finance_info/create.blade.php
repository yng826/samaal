@extends('adminlte::page')

@section('title', '재무정보 관리')

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
        <form action="{{ $action }}" class="form col-12 col-lg-6 info-form" method="POST">
            @isset ($info)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">연도</label>
                            <input type="text" class="form-control" name="info_year1" value="{{$info->info_year ?? $new_info_year}}" disabled>
                            <input type="hidden" class="form-control" name="info_year" value="{{$info->info_year ?? $new_info_year}}">
                        </div>
                        <div class="form-group">
                            <label for="">분기</label>
                            <input type="text" class="form-control" id="info_quarter" name="info_quarter" value="{{ isset($info->info_quarter) ? $info->info_quarter : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_매출액 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="connect_sales" name="connect_sales" value="{{ isset($info) ? number_format($info->connect_sales) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_영업이익 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="connect_operating_income" name="connect_operating_income" value="{{ isset($info) ? number_format($info->connect_operating_income) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_당기순이익 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="connect_net_income" name="connect_net_income" value="{{ isset($info) ? number_format($info->connect_net_income) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_자산 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="connect_assets" name="connect_assets" value="{{ isset($info) ? number_format($info->connect_assets) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_부채 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="connect_liability" name="connect_liability" value="{{ isset($info) ? number_format($info->connect_liability) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">연결_자본총계 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="connect_total" name="connect_total" value="{{ isset($info) ? number_format($info->connect_total) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_매출액 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="separate_sales" name="separate_sales" value="{{ isset($info) ? number_format($info->separate_sales) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_영업이익 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="separate_operating_income" name="separate_operating_income" value="{{ isset($info) ? number_format($info->separate_operating_income) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_당기순이익 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="separate_net_income" name="separate_net_income" value="{{ isset($info) ? number_format($info->separate_net_income) : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">별도_자산 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="separate_assets" name="separate_assets" value="{{ isset($info) ? number_format($info->separate_assets) : ''}}" numberOnly>
                        </div>
                        <div class="form-group">
                            <label for="">별도_부채 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="separate_liability" name="separate_liability" value="{{ isset($info) ? number_format($info->separate_liability) : ''}}" numberOnly>
                        </div>
                        <div class="form-group">
                            <label for="">별도_자본총계 <p style="display: inline-block;font-size: 70%;">(단위: 백만원)</p></label>
                            <input type="text" class="form-control" id="separate_total" name="separate_total" value="{{ isset($info) ? number_format($info->separate_total) : ''}}">
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
    const finance_create = () => {

        const init = () => {
            event_listener();
            numeric_chk();
        };

        const event_listener = () => {
            //저장 버튼 클릭시
            $('.save-btn').on('click', function() {
                if (confirm('저장하시겠습니까?')) {
                        validation();
                        $('.info-form').submit();

                }
            });

        }
        const numeric_chk = () => {

            // 숫자만
            $('#connect_sales, #connect_operating_income, #connect_net_income, #connect_assets, #connect_liability, #connect_total').on('input', function(e){
                this.value = this.value.replace(/[^0-9]/g, '');
                this.value = this.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.value = this.value.slice(0, '13');
            });

            $('#separate_sales, #separate_operating_income, #separate_net_income, #separate_assets, #separate_liability, #separate_total').on('input', function(e){
                this.value = this.value.replace(/[^0-9]/g, '');
                this.value = this.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.value = this.value.slice(0, '13');
            });

        }
        const validation = () => {
            removeComma('connect_sales');
            removeComma('connect_operating_income');
            removeComma('connect_net_income');
            removeComma('connect_assets');
            removeComma('connect_liability');
            removeComma('connect_total');
            removeComma('separate_sales');
            removeComma('separate_operating_income');
            removeComma('separate_net_income');
            removeComma('separate_assets');
            removeComma('separate_liability');
            removeComma('separate_total');
        }

        const removeComma = function( _id ) {
            if ( $('#' + _id).val() ) {

                $('#'+ _id).val($('#'+ _id).val().replaceAll(',', ''));
            }
        }

        init();
    }

    window.onload = function(){
        finance_create();
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

