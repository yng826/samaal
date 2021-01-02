@extends('layouts.business')

@section('detail__title')
    Refill Pouch
    <p>
        Refill pouch for fabric softener and detergent contributing to waste reduction
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_refill.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_refill_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Can we reduce the waste packaging material?
@endsection

@section('info__text')
    In order to save resources by reducing wasted plastic containers, this was developed for the first time in Korea and applied to fabric softener products.
    It is an eco-friendly product that reduces waste emissions by recycling packaging materials.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        We are developing recyclable materials with excellent strength and function.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">OPA/WHITE PE FILM</td>
            <td class="border-right-none">
                Refill packaging for various detergents, fabric softeners, cosmetics, food, etc.
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
