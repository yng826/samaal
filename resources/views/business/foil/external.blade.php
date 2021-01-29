@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | LIB 외장재용';
    $meta_desc = 'LIB 외장재용';
@endphp

@extends('layouts.business')

@section('detail__title')
    LIB 외장재용
    <p>
        원통형 전지에 비해 규격과 모양을 다양하게 조정하여<br>
        자동차 경량화에 기여하는 외장재
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_external.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_external_hover.jpg);"></div></div>
@endsection

@section('info__title')
    <span>좀 더 가볍고 다양한 형태</span>의<br>
    자동차용 배터리를 만들 수 있을까요?
@endsection

@section('info__text')
    일본 수입 의존도 100%의 제품을 국산화하기 위해
    2012년 국내 최초로 개발하여 자동차의 경량화에 기여하고 있습니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>국내외 모든 전지 업체로<br>
        공급될 것으로 전망합니다</p>
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
            <td class="border-left-none">35㎛ ~ 60㎛</td>
            <td>
                A8021
            </td>
            <td class="border-right-none">
                파우치형 리튬 이온 배터리 외장재
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
