<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '삼아알미늄') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class={{ $bodyClass ?? '' }}>
    <div id="app">
        @include('shared.header')

        <div id="fullpage" class="fp-destroyed main-wrap">
            <div class="section main-wrap__section section01">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        <em>삼아</em>가 만드는<br> <em>지속 가능한 세상</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="/intro">더 알아보기</a>
                    </div>
                </div>
                <div class="section main-wrap__section--img section01-img"></div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section02">
                <div class="mobile-mask"></div>
                <div class="section main-wrap__section--img section02-img"></div>
                <div class="section-right">
                    <h2 class="main-wrap__section--title">
                        더 나은<br>
                        <em>삶의 가치</em>를 위한<br>
                        <em>삼아의 도전</em>
                    </h2>
                    <div class="main-wrap__section--button sub-menu__button">
                        <button type="button">About Us</button>
                    </div>
                    <ul class="main-wrap__section--sub-menu">
                        <li><a href="/about-us/heritage">Heritage</a></li>
                        <li><a href="/about-us/ceo">Message from CEO</a></li>
                        <li><a href="/about-us/ci">CI</a></li>
                        <li><a href="/about-us/story-news">Story & News</a></li>
                        <li><a href="/about-us/ir/consolidated">재무정보</a></li>
                        <li><a href="/about-us/location/seoul">Location</a></li>
                    </ul>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section03">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        <em>삼아의 도전</em>이<br>
                        만들어낸 <em>제품</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="/business/intro">For Business Partners</a>
                    </div>
                </div>
                <div class="section main-wrap__section--img section03-img"></div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section04">
                <div class="mobile-mask"></div>
                <div class="section main-wrap__section--img section04-img"></div>
                <div class="section-right">
                    <h2 class="main-wrap__section--title">
                        <em>삼아</em>에서<br>
                         도전의 <em>꿈을 꾸다</em>
                     </h2>
                     <div class="main-wrap__section--button sub-menu__button">
                        <button type="button">Work With Us</button>
                     </div>
                     <ul class="main-wrap__section--sub-menu">
                         <li><a href="/work-with-us/recruit/">채용공고</a></li>
                         <li><a href="/work-with-us/introduction/introjob">직무소개</a></li>
                         <li><a href="/faq/faq">FAQ</a></li>
                     </ul>
                </div>
            </div>
        </div>

        @include('shared.footer')
        @yield('popup-container')
    </div>


    @section('script')
    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/question.js')}}"></script>
    <script src="{{ asset('/js/siteIntro.js') }}"></script>
    <!-- Scripts -->
    @show
</body>
</html>
