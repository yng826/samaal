@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | 연포장용';
    $meta_desc = '연포장용';
@endphp

@extends('layouts.business')

@section('detail__title')
    연포장용
    <p>
        제품 가치 보존에 힘써온<br>
        삼아 대표 아이템
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
    <span>제품의 맛과 향을 그대로 간직</span>하는<br>
    포장재는 없을까요?
@endsection

@section('info__text')
    제품의 포장재에 활용되어<br>
    내용물 보존기간을 증가시키기 위해 개발했습니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>보존기간에 민감한 고부가가치<br>제품 포장지에 널리 적용될 수 있습니다.</p>
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
            <td class="border-left-none"> 5.5㎛ ~ 40㎛</td>
            <td>A1235, A8079<br>
                폭 최대 2090mm</td>
            <td class="border-right-none">식품포장재, 단열재 등</td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
