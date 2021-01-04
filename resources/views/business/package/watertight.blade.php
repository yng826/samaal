@extends('layouts.business')

@section('detail__title')
    Water-repellent Lid Film
    <p>
        Application of Japan's Toyo Aluminium's technology for more hygienic food packaging materials, the first in Korea
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_watertight.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_watertight_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Like a lotus leaf that doesn't get wet, is it possible to invent a <span>yogurt lid to have the same characteristics</span>?
@endsection

@section('info__text')
    The super water-repellent function is implemented, so that the contents do not stick to the lid and can be disposed of conveniently and hygienically, making it eco-friendly.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>In addition to water repellency, we are trying to develop products that use oil repellency (the function that prevents oil from sticking to the container), and we intend to apply this to various substrates such as aluminium and film, etc.</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">Spec</th>
            <th class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">PET/AL/PET/PE/WAX</td>
            <td class="border-right-none">
                Yogurt
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
