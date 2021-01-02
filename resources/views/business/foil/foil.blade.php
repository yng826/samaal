@extends('layouts.business')

@section('detail__title')
    Aluminum Foil for Flexible Packaging
    <p>
        Sama's signature packaging material that improves the preservation of products
    </p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_foil.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_foil_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Is there any packaging material that <span>retains the taste and aroma</span> of the product?
@endsection

@section('info__text')
    We have product packaging solutions that increase the shelf life and preserve the properties of contents for a longer period.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>It can be widely applied in packaging of high- value products which require a longer shelf life.</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none">제품 사양</th>
            <th rowspan="2" class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--title">
            <th class="border-left-none">Thickness</th>
            <th>Material</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none"> 5.5㎛ ~ 40㎛</td>
            <td>A1235, A8079<br>
                폭 최대 2090mm</td>
            <td class="border-right-none">Food packaging, coffee, confectionary and dairy packaging, insulation, etc.</td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
