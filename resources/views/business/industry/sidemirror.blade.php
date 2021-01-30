@php
    $bodyClass = 'business';
    $meta_title = 'Sama Aluminium | Products | Laminated Film for Rear View Mirror Heater';
    $meta_desc = 'Laminated Film for Rear View Mirror Heater';
@endphp

@extends('layouts.business')

@section('detail__title')
    Laminated Film for Rear View Mirror Heater
    <p>
        Material for heated rear-view mirrors, steering wheels and seats with superior etching and uniform resistance deviation
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
    In the cold winter, it is uncomfortable to drive because of the frost on the rear-view mirror. Is there any way to defrost?
@endsection

@section('info__text')
    Our material for heated rear-view mirror heaters has unique characteristics by being well-etched and maintaining electric resistance stability. It is used not only for rear-view mirror heaters, but also for steering wheels and heated seats, giving the driver a comfortable driving experience.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>
        We are expanding the field of application by developing flexible products.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">Spec</th>
            <th class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">PET/AL</td>
            <td class="border-right-none">
                Heated rear-view mirror, steering wheel and seat
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
