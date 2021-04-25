@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | 연포장용';
    $meta_desc = '연포장용';
@endphp

@extends('layouts.business')

@section('detail__title')
    제목
    <p>
        설명 1줄<br>
        설명 2줄
    </p>
@endsection

@section('swiper-container')
@foreach ([1,2,3,4,5] as $i)
    @if( $business['img_file_'.$i.'_path'] )
    <div class="swiper-slide">
        <div class="slide-img" style="background-image:url(/kor/storage/{{$business['img_file_'.$i.'_path']}});"></div>
    </div>
    @endif
@endforeach
@endsection

@section('info__title')
    <span>강조 문구</span> 일반 문구
@endsection

@section('info__text')
    답변 1줄<br>
    답변 2줄
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>미래가치 설명 1줄<br>미래가치 설명 2줄</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none">제품 사양</th>
            <th rowspan="2" class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--title">
            <th class="border-left-none">두께</th>
            <th>재질</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none"> 두께 정보</td>
            <td>재질 정보 1줄<br>
                재질 정보 2줄</td>
            <td class="border-right-none">활용 영역 정보</td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
