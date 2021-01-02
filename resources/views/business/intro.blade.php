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

        <main class="business-intro">
            <div class="business-intro__wrap">
                <div class="swiper-container business-intro__slide-info slide-info">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <h2>Aluminium Foil</h2>
                            <a href="/business/foil" class="slide-info__link">Find out more</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>Flexible Packaging</h2>
                            <a href="/business/package" class="slide-info__link">Find out more</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>Industrial & Construction</h2>
                            <a href="/business/industry" class="slide-info__link">Find out more</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>Speciality</h2>
                            <a href="/business/speciality/process" class="slide-info__link">Find out more</a>
                        </div>
                        <div class="swiper-slide">
                            <h2>Innovation</h2>
                            <a href="/business/innovation/rnd" class="slide-info__link">Find out more</a>
                            {{-- <a href="#" class="slide-info__link innovation-btn">더 알아보기</a>
                            <ul class="innovation-btn__box">
                                <li>
                                    <a href="/business/innovation/rnd">R&D</a>
                                </li>
                                <li>
                                    <a href="/business/innovation/iso_certification">인증현황</a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>

                <div class="swiper-container business-intro__slide-img">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/images/business/intro/img_foil_01.jpg')no-repeat center / cover"></div></div>
                      <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/images/business/intro/img_foil_02.jpg')no-repeat center / cover"></div></div>
                      <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/images/business/intro/img_foil_03.jpg')no-repeat center / cover"></div></div>
                      <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/images/business/intro/img_foil_04.jpg')no-repeat center / cover"></div></div>
                      <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/images/business/intro/img_foil_05.jpg')no-repeat center / cover"></div></div>
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
                            Aluminium Foil
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="/business/foil">Find out more</a>
                        </div>
                    </div>
                    <div class="mobile-arrow"></div>
                </div>

                <div class="section mobiel-wrap__section section02">
                    <div class="info-box package">
                        <h2 class="mobiel-wrap__section--title">
                            Flexible Packaging
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="/business/package">Find out more</a>
                        </div>
                    </div>
                    <div class="mobile-arrow"></div>
                </div>

                <div class="section mobiel-wrap__section section03">
                    <div class="info-box">
                        <h2 class="mobiel-wrap__section--title">
                            Industrial & Construction
                        </h2>
                        <div class="mobiel-wrap__section--button">
                            <a href="/business/industry">Find out more</a>
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
                            <a href="/business/speciality/process">Find out more</a>
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
                         <div class="mobiel-wrap__section--button">
                            <a href="/business/innovation/rnd">Find out more</a>
                        </div>
                         {{-- <div class="mobiel-wrap__section--button sub-menu__button innovation-btn">
                            <button type="button">더 알아보기</button>
                         </div>
                         <ul class="innovation-btn__box">
                            <li>
                                <a href="/business/innovation/rnd">R&D</a>
                            </li>
                            <li>
                                <a href="/business/innovation/iso_certification">인증현황</a>
                            </li>
                        </ul> --}}
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
        loop: true,
        slidesPerView: 4,
        loopedSlides: 4,
        spaceBetween: 10,
        centeredSlides: false,
        pagination: {
            el: '.business-intro__slide-img .swiper-pagination',
          },
          navigation: {
            nextEl: '.business-intro__slide-img .swiper-button-next',
            prevEl: '.business-intro__slide-img .swiper-button-prev',
          },
      });

    //   galleryTop.on('slideChange', function(a,b){
    //        console.log(a, b);
    //    })

      galleryTop.on('click', function(sw,b) {
           console.log(sw, b);
           if ( b.target.className.indexOf('swiper-button-next') < 0 && b.target.className.indexOf('swiper-button-prev') < 0 ) {
                console.log(sw.clickedIndex);
                sw.slideTo(sw.clickedIndex);
           }
       })

      galleryTop.controller.control = galleryThumbs;
      galleryThumbs.controller.control = galleryTop;
    </script>
    <!-- Scripts -->
    @show
</body>
</html>
