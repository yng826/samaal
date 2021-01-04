@extends('layouts.business')

@section('detail__title')
    ALU-ALU
    Cold Forming Foil
    <p>
        Korea's first pharmaceutical packaging material for storing medical supplies for longer periods
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_alu.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_alu_hover.jpg);"></div></div>
@endsection

@section('info__title')
    Could there be a way to safely store medicine for a <span>long period of time in any environment</span>?
@endsection

@section('info__text')
    Since it can be blistered into various shapes and depths, ALU-ALU cold forming foil allows storage of various types of medicines, and with its excellent moisture and gas barrier characteristics, medicines sensitive to high temperature and high humidity environments can be safely stored anytime, anywhere for a long duration.
@endsection

@section('info__value')
    <em>Future Value</em>
    <p>
        It will be used in the development of deep drawing blister cavities and special packaging for preventing counterfeit products.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">Spec</th>
            <th class="border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">OPA/AL/PVC</td>
            <td class="border-right-none">
                Pharmaceutical packaging materials
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
