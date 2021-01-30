@php
    $meta_title = 'Sama Aluminium | Products | Aluminium Foil for LIB Pouch';
    $meta_desc = 'Aluminium Foil for LIB Pouch';
@endphp

@extends('layouts.business')

@section('detail__title')
    Aluminium Foil for LIB Pouch
    <p>
       An exterior packaging material that contributes to a weight reduction of automobiles by adjusting various sizes and shapes compared to cylindrical battery
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
Can we make a battery for automobiles <span>that is lighter and variable in shape</span>?
@endsection

@section('info__text')
    In order to localize products that were previously 100% dependent on import from Japan, we developed special aluminium foil used for LIB pouch for the first time in Korea in 2012. Since then we have been contributing to the Korean automotive industry, helping the automobiles become lighter and more efficient.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>It is expected to be supplied to all domestic and overseas LIB manufacturers.</p>
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
            <td class="border-left-none">35㎛ ~ 60㎛</td>
            <td>
                A8021
            </td>
            <td class="border-right-none">
                LIB pouch
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
