@php
    $bodyClass = 'business';
    $meta_title = 'Sama Aluminium | Products | Steel/Aluminium Laminated Tape';
    $meta_desc = 'Steel/Aluminium Laminated Tape';
@endphp

@extends('layouts.business')

@section('detail__title')
    Steel/Aluminium Laminated Tape
    <p>
        Laminated tape provides excellent protection of optical fiber cables, protecting the internet service environment from adverse conditions
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_steel.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/eng/images/business/foil/img_steel_hover.jpg);"></div></div>
@endsection

@section('info__title')
    I would like to have a material <span>that protects the optical fiber cable for stable internet access</span>!
@endsection

@section('info__text')
    This is the first steel laminated tape developed in Korea in 2005 for the purpose of protecting optical fiber cables as the communication environment was changed from the use of copper cables to optical  cables due to the rapid spread of the Internet.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>
        Demand is increasing for underwater installation and for underdeveloped countries.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">Spec</th>
            <th class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">AL/EAA, STEEL/EAA</td>
            <td class="border-right-none">
                For optical-fiber cable protection
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
