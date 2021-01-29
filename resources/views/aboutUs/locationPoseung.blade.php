@php
    $bodyClass = 'about';
    $meta_title = '삼아알미늄 | 포승공장';
    $meta_desc = '포승공장';
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
                <a href="/kor/about-us/location/seoul">서울사무소</a>
            </li>
            <li class="tab-item on">
                <a href="/kor/about-us/location/poseung">포승공장</a>
            </li>
            <li class="tab-item">
                <a href="/kor/about-us/location/heritage">헤리티지존</a>
            </li>
            <li class="tab-item">
                <a href="/kor/about-us/location/busan">부산사무소</a>
            </li>
        </ul>
    </div>
    <div class="about-location__contents">
        <div class="swiper-container about-location__swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/kor/images/about/location/poseung/img_location_01.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/kor/images/about/location/poseung/img_location_02.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/kor/images/about/location/poseung/img_location_03.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/kor/images/about/location/poseung/img_location_04.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/kor/images/about/location/poseung/img_location_05.jpg" alt=""></div>
                <div class="swiper-slide"><img src="/kor/images/about/location/poseung/img_location_06.jpg" alt=""></div>
            </div>
            <div class="swiper-button-next swiper-button"></div>
            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="about-location__info">
            <div class="about-location__info--address">
                <div class="text-top">
                    <h3>포승공장</h3>
                    <p>
                        ‘업무자동화 프로세스와 지식경영’의
                        시스템을 갖춘, <em>국내 최고 수준의
                        알루미늄 박 / 포장재 생산 공장을
                        소개합니다.</em>
                    </p>
                </div>
                <dl class="text-bottom">
                    <dt>주소</dt><dd>경기도 평택시 포승읍 평택항로 92</dd><br>
                    <dt>우편번호</dt><dd>17960</dd><br>
                    <dt>전화</dt><dd>031-467-6800</dd><br>
                    <dt>FAX</dt><dd>031-683-6125</dd>
                </div>
                <div class="about-location__info--map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3187.767473648141!2d126.8478655!3d36.9676099!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b1c0c6f19adb9%3A0x9baa96ab1111469c!2z7IK87JWE7JWM66-464qEKOyjvCkg7Y-s7Iq56rO17J6l!5e0!3m2!1sko!2skr!4v1608298946546!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
