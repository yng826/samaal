<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="SAMA">
    <meta property="og:type" content="website">
    <meta property="og:description" content="SAMA">
    <meta property="og:id" content="sama">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name', '삼아알미늄') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class={{ $bodyClass ?? '' }}>
    <div id="main">
        @include('shared.header')

        <div id="fullpage" class="fp-destroyed main-wrap">
            <div class="section main-wrap__section section01 intro">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        Creating <em>a Sustainable World</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="/intro">More</a>
                    </div>
                </div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--left" data-rellax-speed="2"></div>
                        <div class="rellax section01-img" data-rellax-speed="1"></div>
                    </div>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section02 about-us">
                <div class="mobile-mask"></div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--right" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
                        <div class="rellax section02-img" data-rellax-speed="1" data-rellax-percentage="0.5"></div>
                    </div>
                </div>
                <div class="section-right">
                    <h2 class="main-wrap__section--title">
                        <em>Pursuit</em> of a sustainable<br>
                        future that paves the way<br>
                        for <em>a better life</em>
                    </h2>
                    <div class="main-wrap__section--button sub-menu__button">
                        <button type="button">About Us</button>
                    </div>
                    <ul class="main-wrap__section--sub-menu">
                        <li><a href="/about-us/heritage">Heritage</a></li>
                        <li><a href="/about-us/ceo">Message from CEO</a></li>
                        <li><a href="/about-us/ci">CI</a></li>
                        <li><a href="/about-us/story-news">Story & News</a></li>
                        <li><a href="/about-us/ir/consolidated">Business Performance</a></li>
                        <li><a href="/about-us/location/seoul">Location</a></li>
                    </ul>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section03 for-business-partners">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        <em>Produced</em> with <em>Sama's</em><br>
                        <em>passion</em> and <em>spirit</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="/business/intro">For Business Partners</a>
                    </div>
                </div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--left" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
                        <div class="rellax section03-img" data-rellax-speed="1" data-rellax-percentage="0.5"></div>
                    </div>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section04 work-with-us">
                <div class="mobile-mask"></div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--right" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
                        <div class="rellax section04-img" data-rellax-speed="1" data-rellax-percentage="0.5"></div>
                    </div>
                </div>
                <div class="section-right">
                    <h2 class="main-wrap__section--title">
                        <em>Spread your wings</em><br> with ambition at <em>Sama</em>
                     </h2>
                     <div class="main-wrap__section--button sub-menu__button">
                        <button type="button">Work With Us</button>
                     </div>
                     <ul class="main-wrap__section--sub-menu WorWithUs-menu">
                         <li>Challenging the global market with continuous innovation to become the best of the best</li>
                         <li>Trusted partner with world-class expertise</li>
                         <li>Committed with enthusiasm and excitement</li>
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
