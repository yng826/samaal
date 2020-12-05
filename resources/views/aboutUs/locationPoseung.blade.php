@php
    $bodyClass = 'about';
@endphp

@extends('layouts.default')

@section('contents')

<main class="about-location contents-wrap">
    <div class="contents-wrap__title about-location__title">
        <h2>포승공장</h2>
    </div>
    <div class="about-location__contents">
        <div class="swiper-container about-location__swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
            </div>
            <div class="swiper-button-next swiper-button"></div>
            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="about-location__info">
            <div class="about-location__info--map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3187.7399119343017!2d126.84801621552414!3d36.96826806592003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b1c0c766d192b%3A0xfc79eb900e59401e!2z6rK96riw64-EIO2Pie2DneyLnCDtj6zsirnsnY0g7Y-J7YOd7ZWt66GcIDky!5e0!3m2!1sko!2skr!4v1606013488247!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="about-location__info--address">
                <p>
                    ‘업무자동화 프로세스와 지식경영’의
                    시스템을 갖춘, <em>국내 최고 수준의
                    알루미늄 박 / 포장재 생산 공장을
                    소개합니다</em>
                </p>
                <dl>
                    <dt>주소</dt><dd>경기도 평택시 포승읍 평택항로 92</dd><br>
                    <dt>전화</dt><dd>031-467-6800</dd><br>
                    <dt>FAX</dt><dd>031-683-6125</dd>
                </dl>
            </div>
            <div class="about-location__info--video">
                <!-- 영상 받으면 넣기-->
            </div>
        </div>
    </div>
</main>

@endsection
