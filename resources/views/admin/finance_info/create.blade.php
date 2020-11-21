@extends('layouts.admin')


@section('content')
<h1>재무정보</h1>
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ $action }}" class="form col-12" method="POST">
            @isset ( $info )
                @method('PUT')
            @endisset
            @csrf
            <div class="form-group">
                <label for="">연도</label>
                <input type="text" class="form-control" name="info_year1" value="{{$info->info_year ?? $new_info_year}}" disabled>
                <input type="hidden" class="form-control" name="info_year" value="{{$info->info_year ?? $new_info_year}}">
            </div>
            <div class="form-group">
                <label for="">연결_매출액</label>
                <input type="text" class="form-control" name="connect_sales" value="{{$info->connect_sales ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">연결_영업이익</label>
                <input type="text" class="form-control" name="connect_operating_income" value="{{$info->connect_operating_income ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">연결_당기순이익</label>
                <input type="text" class="form-control" name="connect_net_income" value="{{$info->connect_net_income ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">연결_자산</label>
                <input type="text" class="form-control" name="connect_assets" value="{{$info->connect_assets ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">연결_부채</label>
                <input type="text" class="form-control" name="connect_liability" value="{{$info->connect_liability ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">별도_매출액</label>
                <input type="text" class="form-control" name="separate_sales" value="{{$info->separate_sales ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">별도_영업이익</label>
                <input type="text" class="form-control" name="separate_operating_income" value="{{$info->separate_operating_income ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">별도_당기순이익</label>
                <input type="text" class="form-control" name="separate_net_income" value="{{$info->separate_net_income ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">별도_자산</label>
                <input type="text" class="form-control" name="separate_assets" value="{{$info->separate_assets ?? ''}}">
            </div>
            <div class="form-group">
                <label for="">별도_부채</label>
                <input type="text" class="form-control" name="separate_liability" value="{{$info->separate_liability ?? ''}}">
            </div>
            <button type="submit" class="btn btn-primary">저장</button>
        </form>
    </div>
</div>
@endsection
