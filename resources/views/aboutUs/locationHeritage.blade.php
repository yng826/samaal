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
            <li class="tab-item">
                <a href="/about-us/location/poseung">Poseung Factory</a>
            </li>
            <li class="tab-item on">
                <a href="/about-us/location/heritage">Heritage Zone</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/busan">Busan Office</a>
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
                        <h3>Heritage Zone</h3>
                        <p>
                            The 50th Anniversary Heritage Zone captures
                             <em>the history of Sam-A</em>.
                        </p>
                    </div>
                    <dl class="text-bottom">
                        <dt>Address</dt><dd>92 Pyeongtaekhang-ro, Poseung-eup, Pyeongtaek-si, Gyeonggi-do, Republic of Korea </dd><br>
                        <dt>Tel</dt><dd>031-467-6800</dd><br>
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
</main>

@endsection
