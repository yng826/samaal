@php
    $meta_title = 'Sama Aluminium | Products | LIB Tab';
    $meta_desc = 'LIB Tab';
@endphp

@extends('layouts.business')

@section('detail__title')
    LIB Tab
    <p>
        Lead tab material for lithium-ion battery terminal that can be used on various electronics devices
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
    Please develop a LIB lead tab that can be <span>used in various devices</span>!
@endsection

@section('info__text')
    Sama's LIB lead tab material is a core part of secondary battery developed at the time of full-scale mass production by domestic LIB manufacturers.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>Usage is expanding towards compact and lightweight products such as Bluetooth and wearable devices.</p>
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
            <td class="border-left-none">80㎛ ~150㎛</td>
            <td>
                A1235
            </td>
            <td class="border-right-none">
                LIB lead tab
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
