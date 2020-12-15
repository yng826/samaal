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
                <a href="/about-us/location/seoul">서울사무소</a>
            </li>
            <li class="tab-item">
                <a href="/about-us/location/poseung">포승공장</a>
            </li>
            <li class="tab-item">
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
            <div class="about-location__info--address">
                <div class="text-top">
                    <h3>서울사무소</h3>
                    <p>
                        세계 최고를 향해 나아가는 기업,
                        <em>삼아의 서울사무소 문은 언제나
                        열려있습니다.</em>
                    </p>
                </div>
                <dl class="text-bottom">
                    <dt>주소</dt><dd>서울 서초구 남부순환로289길 5 삼영빌딩 2층</dd><br>
                    <dt>전화</dt><dd>02-3458-0600</dd><br>
                    <dt>FAX</dt><dd>02-565-0999</dd>
                </dl>
            </div>
            <div class="about-location__info--map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.371858466948!2d126.98631011553479!3d37.47555033709073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca05230497171%3A0xc261192e06169049!2zKOyjvCnsiqTrp4jsnbzqsozsnbTtirgg7Jik66CM7KeA7YycIOyEnOy0iOyEvO2EsA!5e0!3m2!1sko!2skr!4v1606013295992!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <div class="top-btn">TOP</div>
</main>

@endsection
