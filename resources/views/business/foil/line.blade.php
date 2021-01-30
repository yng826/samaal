@php
    $meta_title = 'Sama Aluminium | Products | Hair Line Aluminium Foil';
    $meta_desc = 'Hair Line Aluminium Foil';
@endphp

@extends('layouts.business')

@section('detail__title')
    Hair Line Aluminium Foil
    <p>
        Sama's unique hair line pattern, utilized on home appliances
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
    I need to find a way to <span>add luxurious design</span> to a standard home appliance
@endsection

@section('info__text')
    In line with the diverse needs of consumers and the trends in high-end home appliances, we developed a unique hairline pattern in 2017 in collaboration with domestic and overseas home appliance companies.
    The exterior design of household appliances, including refrigerators, is implemented in various forms to enable a luxurious design.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>Expandable application is also possible for automobile interior decoration.</p>
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
            <td class="border-left-none">15㎛</td>
            <td>
                A8079
            </td>
            <td class="border-right-none">
                For exterior decoration of home appliances such as refrigerators and washing machines
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop01')
@endsection
