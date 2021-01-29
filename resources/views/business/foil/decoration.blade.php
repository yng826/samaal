@php
    $bodyClass = 'business';
    $meta_desc = 'Decoration용';
@endphp

@extends('layouts.business')

@section('detail__title')
    Decoration용
    <p>
        고급제품의 포장에 적합한 고품질의<br>
        고광택 알루미늄 호일
    </p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_decoration.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_decoration_hover.jpg);"></div></div>
@endsection

@section('info__title')
    고급 화장품의 가치를 <span>더 돋보이게 만들 수 있는</span><br>
    포장재는 무엇일까요?
@endsection

@section('info__text')
    고급 화장품 튜브를 제조하는 고객의 인쇄 품질 니즈에 부합하기 위해
    개발한 제품으로 유려한 표면의 고광택이 특징입니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>종이와 접합되는 제품의 용도로<br>
        확대 적용이 가능하여 고급 제품에 적합한 프리미엄 알루미늄 호일입니다.</p>
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
            <td class="border-left-none">7㎛ ~ 12㎛</td>
            <td>
                A8079, A1235
            </td>
            <td class="border-right-none">
                고급화장품 튜브,<br/>
                고급 주류,<br/>
                고가의 제품 포장상자
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
