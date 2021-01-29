@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | 열교환기용 Fin재';
    $meta_desc = '열교환기용 Fin재';
@endphp

@extends('layouts.business')

@section('detail__title')
    열교환기용 Fin재
    <p>
        자동차에 사용되는 소형·고성능 열교환기용 Fin재<br>
        50㎛를 국내 최초로 개발
    </p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_fin.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_fin_hover.jpg);"></div></div>
@endsection

@section('info__title')
    점점 가벼워지는 자동차에 알맞게
    <span>열교환기의 효율도 높여야 합니다</span>
@endsection

@section('info__text')
    자동차 경량화에 따른 제품 박육화를 위해
    국내 Strip Maker와 협업, 국내 최초로 국산화에 성공한 제품입니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>전기자동차 배터리의 일정한 내부 온도 유지용 온열기 및<br>
        냉방기에도 접목할 수 있습니다</p>
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
            <td class="border-left-none">50㎛ ~ 300㎛</td>
            <td>
                F308, F309,
                A3003, BRW04
            </td>
            <td class="border-right-none">
                라디에이터, 히터,<br>
                콘덴서, 증발기
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
