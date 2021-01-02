@extends('layouts.business')

@section('detail__title')
    LIB Cathode Foil for Automotive
    <p>
        Even with thinner gauge aluminum foil, it maintains high-strength enabling the development of high-capacity, high-efficiency battery
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_car.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_car_hover.jpg);"></div></div>
@endsection

@section('info__title')
    I hope there will be an electric vehicle that <span>can go from Seoul to Busan</span> with a single charge.
@endsection

@section('info__text')
In 2009, we developedLIB cathode foil with LG Chem that maintains high strength for the first time in Korea with the goal of developing a high-capacity, high-efficiency electric vehicle.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>It can be applied not only to automobiles, but also to ESS and small sized batteries.</p>
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
            <td class="border-left-none">12㎛ ~ 20㎛</td>
            <td>
                A1050, A1100,
                A1235, etc
            </td>
            <td class="border-right-none">
                Electric vehicle, battery for ESS
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
