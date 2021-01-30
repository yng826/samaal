@php
    $bodyClass = 'business';
    $meta_title = 'Sama Aluminium | Products | Retortable Packaging';
    $meta_desc = 'Retortable Packaging';
@endphp

@extends('layouts.business')

@section('detail__title')
    Retortable Packaging
    <p>
        Hygienic and easy-to-use product as a food packaging material for long-term preservation, the first in Korea
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
    <span>Is there a way to keep food fresh so that it can be consumed anytime</span>, anywhere?
@endsection

@section('info__text')
    Long-term storage is possible by sterilizing pre-cooked food at high temperature.
    This product made a big improvement in everyday life by reducing the cooking time and adding simplicity to use.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>It is being widely applied to various types of retort food used in microwave ovens, and is attracting attention as an eco-friendly material that can dramatically reduce carbon dioxide emissions by replacing canned products with pouch products.</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">Spec</th>
            <th class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">
                PET/AL/OPA/CPP<br>
                PET/OPA/CPP
                </td>
            <td class="border-right-none">
                Retort food (ready-to-eat),<br>
                Contact lenses, etc. (for medical use),<br>
                Sterilized product after packaging
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
