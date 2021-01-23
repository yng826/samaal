@extends('layouts.business')

@section('detail__title')
    Finstock for Heat Exchanger
    <p>
        First in Korea to develop highly efficient and compact, 50㎛ Fin material for automotive and heat exchange application
    </p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_fin.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_fin_hover.jpg);"></div></div>
@endsection

@section('info__title')
    The efficiency of the heat exchanger must also be increased to match with the trend of <span>automotive lightening</span>
@endsection

@section('info__text')
    It is the first product that succeeded with localization in cooperation with a domestic strip maker in order to reduce the thickness of the finstock  according to the latest trend of automotive lightening.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>It can also be applied to heaters and air conditioners for maintaining a constant internal temperature of electric vehicle batteries.</p>
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
            <td class="border-left-none">50㎛ ~ 300㎛</td>
            <td>
                F308, F309,
                A3003, BRW04
            </td>
            <td class="border-right-none">
                Radiator, heater, condenser, evaporator
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
