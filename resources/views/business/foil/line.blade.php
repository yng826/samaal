@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | Hair Line';
    $meta_desc = 'Hair Line';
@endphp

@extends('layouts.business')

@section('detail__title')
    Hair Line
    <p>
        가전제품 외부 디자인에 활용되는<br>
        삼아 고유의 헤어라인 패턴
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_line.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_line_hover.jpg);"></div></div>
@endsection

@section('info__title')
    평범한 가전제품에 <span>고급스러운 디자인을
    추가</span>할 수 있는 방법을 찾아주세요
@endsection

@section('info__text')
    소비자의 다양한 요구와 가전제품의 고급화 추세에 맞춰,
    국내외 가전업체와의 협업으로 2017년에 삼아 고유의 헤어라인 패턴을 개발했습니다.
    냉장고를  비롯한 생활 가전제품의 외부 디자인을 다양한 형태로 구현하여
    고급스러운 디자인을 가능하게 합니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>자동차 실내 장식용으로도<br>
        확장 적용이 가능합니다</p>
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
            <td class="border-left-none">15㎛</td>
            <td>
                A8079
            </td>
            <td class="border-right-none">
                냉장고, 세탁기 등의
                가전제품 외관장식용
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
