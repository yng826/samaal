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
            <li class="tab-item">
                <a href="/about-us/location/heritage">Heritage Zone</a>
            </li>
            <li class="tab-item on">
                <a href="/about-us/location/busan">Busan Office</a>
            </li>
        </ul>
    </div>
    <div class="about-location__contents">
        <div class="swiper-container about-location__swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/images/about/location/busan/img_location_01.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/busan/img_location_02.jpg" alt=""></div>
            </div>
            <div class="swiper-button-next swiper-button"></div>
            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="about-location__info">
            <div class="about-location__info--address">
                <div class="text-top">
                    <h3>Busan Office</h3>
                    <p>
                        Contact or visit our Busan Office.
                    </p>
                </div>
                <dl class="text-bottom">
                    <dt>Address</dt><dd>92 Pyeongtaekhang-ro, Poseung-eup, Pyeongtaek-si, Gyeonggi-do, Republic of Korea </dd><br>
                    <dt>Postal code</dt><dd>48936</dd><br>
                    <dt>Tel</dt><dd>051-463-7831</dd><br>
                    <dt>FAX</dt><dd>051-466-0245</dd>
                </dl>
            </div>
            <div class="about-location__info--map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.898329080955!2d129.03604761560132!3d35.109249568734285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3568e97ae1f29fc1%3A0xec74aea40894291!2z7IK87JWE7JWM66-464qE67aA7IKw7IKs66y07IaM!5e0!3m2!1sko!2skr!4v1608122047909!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</main>

@endsection
