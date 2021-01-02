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
                <a href="/about-us/location/seoul">Seoul Office</a>
            </li>
            <li class="tab-item on">
                <a href="/about-us/location/poseung">Poseung Factory</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/heritage">Heritage Zone</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/busan">부산사무소</a>
            </li>
        </ul>
    </div>
    <div class="about-location__contents">
        <div class="swiper-container about-location__swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/images/about/location/poseung/img_location_01.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/poseung/img_location_02.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/poseung/img_location_03.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/poseung/img_location_04.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/poseung/img_location_05.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/poseung/img_location_06.jpg" alt=""></div>
            </div>
            <div class="swiper-button-next swiper-button"></div>
            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="about-location__info">
            <div class="about-location__info--address">
                <div class="text-top">
                    <h3>Poseung Factory</h3>
                    <p>
                        Sam-A Poseung Factory is <em>Korea's top-tier aluminium foil</em> and
                        packaging materials production facility equipped with automatic processing and
                        automized processing system.
                    </p>
                </div>
                <dl class="text-bottom">
                    <dt>Address</dt><dd>92 Pyeongtaekhang-ro, Poseung-eup, Pyeongtaek-si, Gyeonggi-do, Republic of Korea </dd><br>
                    <dt>Postal code</dt><dd>17960</dd><br>
                    <dt>Tel</dt><dd>+82-31-467-6800</dd><br>
                    <dt>FAX</dt><dd>+82-31-683-6125</dd>
                </div>
                <div class="about-location__info--map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3187.767473648141!2d126.8478655!3d36.9676099!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b1c0c6f19adb9%3A0x9baa96ab1111469c!2z7IK87JWE7JWM66-464qEKOyjvCkg7Y-s7Iq56rO17J6l!5e0!3m2!1sko!2skr!4v1608298946546!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
