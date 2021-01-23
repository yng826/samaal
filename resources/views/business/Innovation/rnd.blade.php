@php
    $bodyClass = 'business';
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
                <a href="/eng/business/innovation/rnd">R&D</a>
            </li>
            <li class="tab-item">
                <a href="/eng/business/innovation/iso_certification">Certifications</a>
            </li>
        </ul>
    </div>

    <div class="contents-wrap__section innovation-rnd__contents">
        <h3>
            Creativity is limitless<br>
            <p>Sama's state-of-the-art research facilities and expanded organization are the key source of<br> new technologies and ground-breaking products </p>
        </h3>
        <div class="innovation-rnd__text">
            <p>Sama's R&D strives to be the world's best by achieving the highest quality and creating values based on our understanding of customer needs and products.</p>
        </div>
        <div class="innovation-rnd__slide">
            <div class="swiper-container innovation-rnd-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/eng/images/business/innovation/slide_01.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/eng/images/business/innovation/slide_02.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/eng/images/business/innovation/slide_03.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/eng/images/business/innovation/slide_04.jpg" alt=""></div>
                </div>
                <div class="swiper-button-next swiper-button"></div>
                <div class="swiper-button-prev swiper-button"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="innovation-rnd__intro-text">
            <h3>Sama R&D Center</h3>
            <p>
                Sama's R&D is constantly conducting research to achieve improved efficiency and performance of existing products based on technology and experience accumulated over 50 years to respond to rapidly changing global market trends and customer needs.
            </p>
            <P>
                In addition, by developing eco-friendly materials for human health and safety and responding to changes in the global environment, we promote a sustainable future by actively developing products contributing to GHG reduction.
            </p>
        </div>
        <div class="innovation-rnd__img"></div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="/eng/js/app.js"></script> --}}
@endsection
