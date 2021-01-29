@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 이노베이션 | 연구개발';
    $meta_desc = '연구개발';
@endphp

@extends('layouts.default')

@section('contents')
<main class="innovation-rnd contents-wrap">
    <div class="contents-wrap__title innovation-rnd__title">
        <h2>
            Innovation
        </h2>
    </div>
    <div class="contents-wrap__tab speciality-iso__tab">
        <ul>
            <li class="tab-item on">
                <a href="/kor/business/innovation/rnd">R&D</a>
            </li>
            <li class="tab-item">
                <a href="/kor/business/innovation/iso_certification">인증현황</a>
            </li>
        </ul>
    </div>

    <div class="contents-wrap__section innovation-rnd__contents">
        <h3>
            창의는 무한!<br>
            <p>최신의 연구설비 도입과 조직을 대폭 확대한 삼아 신기술/신제품의 산실</p>
        </h3>
        <div class="innovation-rnd__text">
            <p>고객과 제품에 대한 이해를 바탕으로 최고 품질과 새로운 가치를 창조하기 위한 삼아의 연구개발은 국내를 넘어 세계 최고 수준에 도전하고 있습니다.</p>
        </div>
        <div class="innovation-rnd__slide">
            <div class="swiper-container innovation-rnd-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/kor/images/business/innovation/slide_01.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/business/innovation/slide_02.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/business/innovation/slide_03.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/business/innovation/slide_04.jpg" alt=""></div>
                </div>
                <div class="swiper-button-next swiper-button"></div>
                <div class="swiper-button-prev swiper-button"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="innovation-rnd__intro-text">
            <h3>연구개발본부 소개</h3>
            <p>
                삼아의 연구개발본부에서는 급변하는 세계 시장환경과
                고객의 요구에 대응하기 위해 50년간 축적된 기술과 노하우를
                바탕으로 기존 제품의 원가절감과 성능향상을 달성하기 위해
                끊임없이 연구 개발을 진행하고 있습니다.
            </p>
            <P>
                또한 인류의 건강과 안전을 위한 친환경 소재 개발과 지구 환경 변화에
                대응하기 위한 노력으로써 온실가스 감축 대응과 관련된 제품을
                적극적으로 개발하여 지속가능한 미래를 도모합니다.
            </p>
        </div>
        <div class="innovation-rnd__img"></div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="/kor/js/app.js"></script> --}}
@endsection
