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
        <header class="header main-header">
            <a href="#" class="header__logo">
                <img src="/images/common/logo.png" alt="SAMA">
            </a>

            <nav class="header__nav">
                <ul>
                    <li class="header__nav--item">
                        <span>About Us</span>
                        <ol class="header__nav--submenu">
                            <li><a href="/about-us/heritage/">Heritage</a></li>
                            <li><a href="/about-us/ceo/">CEO Message</a></li>
                            <li><a href="/about-us/story-news/">Story & News</a></li>
                            <li><a href="/about-us/location/seoul/">Location</a></li>
                            <li><a href="/about-us/ir/consolidated">Investor Relations</a></li>
                        </ol>
                    </li>
                    <li class="header__nav--item">
                        <span><a href="#">For Business Partners</a></span>
                        <ol class="header__nav--submenu">
                            <li><a href="/business/foil/capacitor/">알루미늄 호일</a></li>
                            <li><a href="/business/package/watertight">포장재용</a></li>
                            <li><a href="/business/industry/insulation">산업/건축용</a></li>
                            <li><a href="#">Speciality</a></li>
                            <li><a href="#">Innovation</a></li>
                        </ol>
                    </li>
                    <li class="header__nav--item">
                        <span>Work With Us</span>
                        <ol class="header__nav--submenu">
                            <li><a href="/work-with-us/recruit/">채용안내</a></li>
                            <li><a href="#">인사제도</a></li>
                            <li><a href="#">조직문화</a></li>
                        </ol>
                    </li>
                </ul>
            </nav>

            <div class="header__m-nav">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header__m-nav--gnb">
                <div class="header__m-nav--gnb__top">
                    <h2>SAMA</h2>
                    <button type="button" class="close-btn">닫기</button>
                </div>
                <ul class="header__m-nav--gnb__list">
                    <li class="header__m-nav--gnb__item menu">
                        <span class="menu__title">About US</span>
                        <ul class="menu__sub">
                            <li><a href="#">Heritage</a></li>
                            <li><a href="#">CEO Message</a></li>
                            <li><a href="#">Story & News</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Investor Relations</a></li>
                        </ul>
                    </li>
                    <li class="header__m-nav--gnb__item menu">
                        <span class="menu__title">For Business Partners</span>
                        <ul class="menu__sub">
                            <li><a href="#">알루미늄 호일</a></li>
                            <li><a href="#">포장재</a></li>
                            <li><a href="#">산업/건축용</a></li>
                            <li><a href="#">Speciality</a></li>
                            <li><a href="#">Innovation</a></li>
                        </ul>
                    </li>
                    <li class="header__m-nav--gnb__item menu">
                        <span class="menu__title">Work With Us</span>
                        <ul class="menu__sub">
                            <li><a href="#">채용공고</a></li>
                            <li><a href="#">직무소개</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="gnb-mask"></div>

            <div class="header__search">
                <ul>
                    <li class="language__kor"><a href="#">KOR</a></li>
                    <li class="language__eng"><a href="#">ENG</a></li>
                </ul>
                <!-- <input type="text"> -->
                <button type="submit" class="btn-search">검색</button>
            </div>
        </header>


        <div id="fullpage" class="fp-destroyed main-wrap">
            <div class="section main-wrap__section section01">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        <em>삼아</em>가 만드는<br> <em>지속 가능한 세상</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="#">더 알아보기</a>
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
                        <li><a href="#">Heritage</a></li>
                        <li><a href="#">Message from CEO</a></li>
                        <li><a href="#">CI</a></li>
                        <li><a href="#">Story & News</a></li>
                        <li><a href="#">재무정보</a></li>
                        <li><a href="#">Location</a></li>
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
                        <a href="#">For Business Partners</a>
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
                        <button type="button">About Us</button>
                     </div>
                     <ul class="main-wrap__section--sub-menu">
                         <li><a href="#">채용공고</a></li>
                         <li><a href="#">직무소개</a></li>
                         <li><a href="#">FAQ</a></li>
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
