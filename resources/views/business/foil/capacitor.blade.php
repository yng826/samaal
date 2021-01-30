@php
    $meta_title = 'Sama Aluminium | Products | Aluminium Foil for Electrical Capacitor';
    $meta_desc = 'Aluminium Foil for Electrical Capacitor';
@endphp

@extends('layouts.business')

@section('detail__title')
Aluminium Foil for Electrical Capacitor
<p>
    Sama's signature product designed to improve high-voltage capacitor's performance
</p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_capacitor.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_capacitor_hover.jpg);"></div></div>
@endsection

@section('info__title')
Could the ultra-thin aluminium foil be made thinner to further increase the capacity of the <span>high-voltage capacitor?</span>
@endsection

@section('info__text')
In accordance with customer needs for improving the performance of high- voltage capacitors, we have developed and are currently supplying 4.5㎛ ultra-thin aluminium foil.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>We can expand sales opportunities to multinational power companies</p>
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
        <td class="border-left-none">4.5㎛ ~ 6㎛</td>
        <td>A1235</td>
        <td class="border-right-none">Capacitor</td>
    </tr>
</table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
