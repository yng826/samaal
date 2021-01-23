@extends('layouts.business')

@section('detail__title')
    LIB Cathode Foil for Electronics
    <p>
        Makes it possible to improve the performance of high capacity batteries on a thinner device design
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_electronic.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_electronic_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Even after a phone is used for a <span>long time, it would be nice if the battery</span> lasted longer.
@endsection

@section('info__text')
    Our LIB cathode foil for electronics devices was developed for the first time in Korea in 2012 in order to meet the needs of increasing mobile phone usage time. The development of a high-capacity battery not only improves battery performance, but also enables the phones to become thinner.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>It contributes to improving the battery performance of small electronic devices such as high-performance/multifunctional smartphones and laptops, cordless vacuum cleaners, toys, and power tools.</p>
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
            <td class="border-left-none">10㎛ ~ 30㎛</td>
            <td>
                A1050, A1100,
                A1235, A3003,
                etc
            </td>
            <td class="border-right-none">
                Smartphones, laptops, cordless vacuum cleaners, toys, power tools, etc.
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
