@php
    $bodyClass = 'about';
@endphp

@extends('layouts.default')

@section('contents')

<main class="about-location contents-wrap">
    <div class="contents-wrap__title about-location__title">
        <h2>헤리티지 존</h2>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25503.81890334096!2d126.8481664193355!3d36.96259747413987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b1c0c766d192b%3A0xfc79eb900e59401e!2z6rK96riw64-EIO2Pie2DneyLnCDtj6zsirnsnY0g7Y-J7YOd7ZWt66GcIDky!5e0!3m2!1sko!2skr!4v1605974061805!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="about-location__info--address">
                <p>
                    1969년 창립 이래 50여 년,
                    지금까지 걸어온 <em>삼아의 이야기와
                    앞으로 걸어갈 이야기를
                    헤리티지 존에서 만나보세요.</em>
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
