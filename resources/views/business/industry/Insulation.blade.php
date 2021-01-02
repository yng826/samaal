@extends('layouts.business')

@section('detail__title')
    High barrier film for vacuum insulation panel
    <p>
        Korea's first product applied on refrigerators that reduces panel thickness of electronics and even improves insulation performance
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_Insulation.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_Insulation_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Can we improve the <span>insulation performance while reducing the thickness of the refrigerator panel</span>?
@endsection

@section('info__text')
    Sama developed a high barrier film for vacuum insulation panel for the first time in Korea and applied it to refrigerators. we further developed compound ultra-high-barrier film which conserves energy while applying it on eco-friendly passive houses.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        We are developing applications such as the improvement of heat insulation properties and durability, low-temperature tanks for vessels and medical containers.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">VM-PET LAMINATE FILM</td>
            <td class="border-right-none">
                Household electronics such as refrigerators, construction and vessel insulation
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
