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
            <li class="tab-item on">
                <a href="/about-us/location/seoul">Seoul Office</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/poseung">Poseung Factory</a>
            </li>
            <li class="tab-item">
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
                <div class="swiper-slide"><img src="/images/about/location/seoul/img_location_01.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/seoul/img_location_02.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/seoul/img_location_03.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/seoul/img_location_04.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/seoul/img_location_05.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/images/about/location/seoul/img_location_06.jpg" alt=""></div>
            </div>
            <div class="swiper-button-next swiper-button"></div>
            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="about-location__info">
            <div class="about-location__info--address">
                <div class="text-top">
                    <h3>Seoul Office</h3>
                    <p>
                        Contact or visit our Seoul Office.
                    </p>
                </div>
                <dl class="text-bottom">
                    <dt>Address</dt><dd>2F, 5 Nambusunhwan-ro 289-gil, Seocho-gu, Seoul, Republic of Korea</dd><br>
                    <dt>Postal code</dt><dd>06699</dd><br>
                    <dt>Tel</dt><dd>02-3458-0600</dd><br>
                    <dt>FAX</dt><dd>02-565-0999</dd>
                </dl>
            </div>
            <div class="about-location__info--map">
                <iframe width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJwySyiEyhfDURGzsaEaCkMiA&key=<?php echo env('GOOGLE_MAP_API')?>&language=en&zoom=13" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</main>

@endsection
