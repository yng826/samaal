@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | ALU-ALU Cold Forming Foil';
    $meta_desc = 'ALU-ALU Cold Forming Foil';
@endphp

@extends('layouts.business')

@section('detail__title')
    ALU-ALU<br>
    Cold Forming Foil
    <p>
        보관 환경에 민감한 약을 언제 어디서나<br>
        장기간 안전하게 보관할 수 있도록 도운 국내 최초의 제약 포장재
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_alu.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_alu_hover.jpg);"></div></div>
@endsection

@section('info__title')
    <span>어떤 환경에서나<br>
    의약품을 장기간 보관</span>할 수는 없을까요?
@endsection

@section('info__text')
    다양한 형태와 깊이로 성형할 수 있어 다양한 종류의 약을 보관할 수 있게 하며,<br>
    우수한 수분 및 가스 차단성 덕분에 고온다습한 환경에 민감한 의약품을<br>
    언제 어디서나 장기간 안전하게 보관할 수 있습니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        고 성형성 제품과 복제품 방지용 포장재<br>
        개발에도 활용될 예정입니다
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">OPA/AL/PVC</td>
            <td class="border-right-none">
                제약포장재
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
