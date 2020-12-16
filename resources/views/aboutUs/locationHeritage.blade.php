@php
    $bodyClass = 'about';
@endphp

@extends('layouts.default')

@section('contents')

<main class="about-location contents-wrap">
    <div class="contents-wrap__title about-location__title">
        <h2>Location</h2>
    </div>
    <div class="contents-wrap__tab about-location__tab">
        <ul>
            <li class="tab-item">
                <a href="/about-us/location/seoul">서울사무소</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/poseung">포승공장</a>
            </li>
            <li class="tab-item on">
                <a href="/about-us/location/heritage">헤리티지존</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/busan">부산사무소</a>
            </li>
        </ul>
    </div>

    <div class="about-location__contents">
        <div class="swiper-container about-location__swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_01.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_02.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_03.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_04.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_05.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_06.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/heritage/img_location_07.jpg" alt=""></div>
            </div>
            <div class="swiper-button-next swiper-button"></div>
            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="about-location__area">
            <div class="about-location__info ">
                <div class="about-location__info--address">
                    <div class="text-top">
                        <h3>헤리티지 존</h3>
                        <p>
                            1969년 창립 이래 50여 년,<br>
                            지금까지 걸어온 <em>삼아의 이야기와
                            앞으로 걸어갈 이야기를
                            헤리티지 존에서 만나보세요.</em>
                        </p>
                    </div>
                    <dl class="text-bottom">
                        <dt>주소</dt><dd>경기도 평택시 포승읍 평택항로 92</dd><br>
                        <dt>전화</dt><dd>031-467-6800</dd><br>
                        <dt>FAX</dt><dd>031-683-6125</dd>
                    </dl>
                </div>
                <div class="about-location__video m-video">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/dNGEmfJZRHM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="about-location__info--map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25501.794440568043!2d126.85151878551171!3d36.96864074894092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b1c74c82778e9%3A0xaf9602c296d9053f!2z7IK87JWE7JWM66-464qEIO2PrOyKueqzteyepQ!5e0!3m2!1sko!2skr!4v1608121888589!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="about-location__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/dNGEmfJZRHM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="top-btn">TOP</div>
</main>

@endsection
