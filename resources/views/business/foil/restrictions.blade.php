@extends('layouts.business')

@section('detail__title')
    aluminium Foil for Pharmaceutical Packaging
    <p>
        Special packaging foil that can store pharmaceutical products safely for a long period of time
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_restrictions.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_restrictions_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Are there any packaging materials that allow me to store medicines for a <span>long time and take them safely</span>?
@endsection

@section('info__text')
    In order to respond to the demand for packaging of pharmaceuticals, we developed aluminium foil for pharmaceutical packaging that has superior moisture and gas barrier properties than conventional plastic films.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>With the development of aluminium foil, the barrier property and formability are superior even under a thin thickness.</p>
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
            <td class="border-left-none">20㎛, 28㎛, 30㎛,<br> 45㎛, 50㎛, 60㎛</td>
            <td>
                A1235, A8021,A8079
            </td>
            <td class="border-right-none">
                PTP, Strip Packaging,Alu-Alu cold forming foil,Pain-relieving patch packaging material
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
