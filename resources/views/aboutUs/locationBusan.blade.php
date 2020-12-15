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
            <li class="tab-item">
                <a href="/about-us/location/heritage">헤리티지존</a>
            </li>
            <li class="tab-item on">
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
                    <h3>부산사무소</h3>
                    <p>
                        세계 최고를 향해 나아가는 기업,
                        <em>삼아의 부산사무소 문은 언제나
                        열려있습니다.</em>
                    </p>
                </div>
                <dl class="text-bottom">
                    <dt>주소</dt><dd>부산광역시 중구 충장대로 9번길 43(보승빌딩)</dd><br>
                    <dt>전화</dt><dd>051-463-7831</dd><br>
                    <dt>FAX</dt><dd>051-466-0245</dd>
                </dl>
            </div>
            <div class="about-location__info--map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.8983290809415!2d129.03604761548664!3d35.10924956873463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3568e97ae1ec36ad%3A0xc31988bf574a4ce0!2z67O07Iq567mM65Sp!5e0!3m2!1sko!2skr!4v1606013059205!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <div class="top-btn">TOP</div>
</main>

@endsection
