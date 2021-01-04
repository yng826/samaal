@extends('layouts.business')

@section('detail__title')
    High-gloss Aluminum Foil for Decoration
    <p>
        High-quality, high-gloss aluminium foil for high-end packaging
    </p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_decoration.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_decoration_hover.jpg);"></div></div>
@endsection

@section('info__title')
    What packaging materials <span>can make the luxury</span> cosmetics stand out from others?
@endsection

@section('info__text')
    Our decoration foil is developed to meet the needs of customers who manufacture high-end cosmetic tubes, and features a high-gloss property with a refined surface.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>Premium AL-Foil suitable for high-end products as it can be expanded and applied to paper laminated packaging.</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none">Spec</th>
            <th rowspan="2" class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--title">
            <th class="border-left-none">Thickness</th>
            <th>Material</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">7㎛ ~ 12㎛</td>
            <td>
                A8079, A1235
            </td>
            <td class="border-right-none">
                Luxury cosmetic tubes, high-quality liquor, ginseng packaging boxes
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
