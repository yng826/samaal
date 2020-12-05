
@php
$bodyClass = 'about';
@endphp

@extends('layouts.default')

@section('contents')
<main class="about-storyNews contents-wrap">
    <div class="contents-wrap__title about-storyNews__title">
        <h2>Story &amp; News</h2>
    </div>
    <div class="about-storyNews__contents">
        <div class="about-storyNews__list">
            <ul>
                <li class="about-storyNews__list-item">
                    <a href="#">
                        <figure>
                            <img src="https://via.placeholder.com/508X298" alt="">
                        </figure>
                        <div class="about-storyNews__list-item--text">
                            <h3>삼아 공식 웹사이트 리뉴얼 오픈</h3>
                            <p>삼아알미늄의 공식 웹사이트가 새롭게 오픈했습니다.새롭게 변경된 CI를 반영하여 방문자들의 편의성을</p>
                        </div>
                    </a>
                </li>
                <li class="about-storyNews__list-item">
                    <a href="#">
                        <figure>
                            <img src="https://via.placeholder.com//508X298" alt="">
                        </figure>
                        <div class="about-storyNews__list-item--text">
                            <h3>삼아알미늄 50주년 창립 기념식</h3>
                            <p>창립 50주년을 맞이해 평택 포승공장에 삼아알미늄의 역사와 미래 비전을 담은 상설 홍보관을 초청 행사 당일에는</p>
                        </div>
                    </a>
                </li>
                <li class="about-storyNews__list-item">
                    <a href="#">
                        <figure>
                            <img src="https://via.placeholder.com/508X298" alt="">
                        </figure>
                        <div class="about-storyNews__list-item--text">
                            <h3>삼아 창립 50주년 기념관 ‘헤리티지 존’ 개관</h3>
                            <p>2019년 창립 50주년을 맞이한 삼아알미늄은 역사와 기술력의 산실을 담은 ‘헤리티지 존’을</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="pagination">
            <a href="#" class="pagination__button-prev"></a>
            <a href="#" class="pagination__number active">1</a>
            <a href="#" class="pagination__number">2</a>
            <a href="#" class="pagination__number">3</a>
            <a href="#" class="pagination__number">4</a>
            <a href="#" class="pagination__number">5</a>
            <a href="#" class="pagination__number">6</a>
            <a href="#" class="pagination__button-next"></a>
        </div>
        <div class="about-storyNews__top-btn">TOP</div>
    </div>
</main>
@endsection


{{-- <script src="{{ mix('/js/manifest.js')}}"></script>
<script src="{{ mix('/js/vendor.js')}}"></script> --}}
