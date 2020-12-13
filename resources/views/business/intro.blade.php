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

        <main class="business-intro">
            <div class="business-intro__wrap">
                <div class="swiper-container business-intro__slide-info slide-info">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <h2>알루미늄 Foil</h2>
                            <a href="/business/foil" class="slide-info__link">더 알아보기</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>포장재</h2>
                            <a href="/business/package" class="slide-info__link">더 알아보기</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>산업건축용</h2>
                            <a href="/business/package" class="slide-info__link">더 알아보기</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>Speciality</h2>
                            <a href="/business/speciality/process" class="slide-info__link">더 알아보기</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>Innovation</h2>
                            <a href="#" class="slide-info__link innovation-btn">더 알아보기</a>
                            <ul class="innovation-btn__box">
                                <li>
                                    <a href="/business/innovation/rnd">R&D</a>
                                </li>
                                <li>
                                    <a href="/business/innovation/iso_certification">인증현황</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="swiper-container business-intro__slide-img">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide"><img src="/images/business/intro/img_foil_01.jpg" alt="알루미늄 Foil"></div>
                      <div class="swiper-slide"><img src="/images/business/intro/img_foil_02.jpg" alt="포장재"></div>
                      <div class="swiper-slide"><img src="/images/business/intro/img_foil_03.jpg" alt="산업건축용"></div>
                      <div class="swiper-slide"><img src="/images/business/intro/img_foil_04.jpg" alt="Speciality"></div>
                      <div class="swiper-slide"><img src="/images/business/intro/img_foil_05.jpg" alt="Innovation"></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next swiper-button"></div>
                    <div class="swiper-button-prev swiper-button"></div>
                </div>
            </div>

            <div id="fullpage" class="fp-destroyed business-intro__mobiel-wrap mobiel-wrap">
                <div class="section mobiel-wrap__section section01">
                    <div class="info-box">
                        <h2 class="mobiel-wrap__section--title">
                            알루미늄 Foil
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="#">더 알아보기</a>
                        </div>
                    </div>
                    <div class="mobile-arrow"></div>
                </div>

                <div class="section mobiel-wrap__section section02">
                    <div class="info-box package">
                        <h2 class="mobiel-wrap__section--title">
                            포장재
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="#">더 알아보기</a>
                        </div>
                    </div>
                    <div class="mobile-arrow"></div>
                </div>

                <div class="section mobiel-wrap__section section03">
                    <div class="info-box">
                        <h2 class="mobiel-wrap__section--title">
                            산업건축용
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="#">더 알아보기</a>
                        </div>
                    </div>
                    <div class="mobile-arrow"></div>
                </div>

                <div class="section mobiel-wrap__section section04">
                    <div class="info-box">
                        <h2 class="mobiel-wrap__section--title">
                            Speciality
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="#">더 알아보기</a>
                        </div>
                    </div>
                    <div class="mobile-arrow"></div>
                </div>

                <div class="section mobiel-wrap__section section05">
                    <div class="mobile-mask"></div>
                    <div class="info-box">
                        <h2 class="mobiel-wrap__section--title">
                            Innovation
                         </h2>
                         <div class="mobiel-wrap__section--button sub-menu__button innovation-btn">
                            <button type="button">더 알아보기</button>
                         </div>
                         <ul class="innovation-btn__box">
                            <li>
                                <a href="/business/innovation/rnd">R&D</a>
                            </li>
                            <li>
                                <a href="/business/innovation/iso_certification">인증현황</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

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
    <script>
        var galleryThumbs = new Swiper('.business-intro__slide-info', {
            slidesPerView: 1,
            loop: true,
            loopedSlides: 4,
        });
        var galleryTop = new Swiper('.business-intro__slide-img', {
        slidesPerView: 4,
        spaceBetween: 10,
        centeredSlides: false,
        loop: true,
        loopedSlides: 4,
        pagination: {
            el: '.business-intro__slide-img .swiper-pagination',
          },
          navigation: {
            nextEl: '.business-intro__slide-img .swiper-button-next',
            prevEl: '.business-intro__slide-img .swiper-button-prev',
          },
      });
      galleryTop.controller.control = galleryThumbs;
      galleryThumbs.controller.control = galleryTop;
    </script>
    <!-- Scripts -->
    @show
</body>
</html>
