@extends('layouts.business')

@section('detail__title')
    aluminium-backed Paper for Cigarette Packaging
    <p>
        aluminium-backed paper for cigarette packaging material which has higher barrierity against moisture and preservation of scent that is still being used since the 1960s
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_cigarette.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_cigarette_hover.jpg);"></div></div>
@endsection

@section('info__title')
    We hope that the scent and taste of cigarettes are preservable for a long time!
@endsection

@section('info__text')
    Produced to replace a product dependent on imports in the 1960s, this is Sama's first ever product. It has excellent barrierity against moisture and gas.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>
        It is expected to be used as an inner packaging material and filter cover film for heated tobacco products and cigars.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">Spec</th>
            <th class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">AL/PAPER</td>
            <td class="border-right-none">
                Aluminium backed paper for cigarette packaging
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
