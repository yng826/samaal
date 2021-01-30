@php
    $meta_title = 'Sama Aluminium | Products | LIB Cathode Foil for Automotive';
    $meta_desc = 'LIB Cathode Foil for Automotive';
@endphp

@extends('layouts.business')

@section('detail__title')
    LIB Cathode Foil for Automotive
    <p>
        Even with thinner gauge aluminium foil, it maintains high-strength enabling the development of high-capacity, high-efficiency battery
    </p>
@endsection

@section('swiper-container')
@foreach ([1,2,3,4,5] as $i)
    @if( $business['img_file_'.$i.'_path'] )
    <div class="swiper-slide">
        <div class="slide-img" style="background-image:url(/eng/storage/{{$business['img_file_'.$i.'_path']}});"></div>
    </div>
    @endif
@endforeach
@endsection

@section('info__title')
    I hope there will be an electric vehicle that <span>can go from Seoul to Busan</span> with a single charge.
@endsection

@section('info__text')
In 2009, we developed LIB cathode foil with LG Chem that maintains high strength for the first time in Korea with the goal of developing a high-capacity, high-efficiency electric vehicle.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>It can be applied not only to automobiles, but also to ESS and small sized batteries.</p>
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
