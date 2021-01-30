@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품';
    $meta_desc = '제품';
@endphp

@extends('layouts.default')

@section('contents')
<main class="business-intro">
    <div class="business-intro__wrap">
        <div class="swiper-container business-intro__slide-info slide-info">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <h2>알루미늄 호일</h2>
                    <a href="/kor/business/foil" class="slide-info__link">더 알아보기</a>
                </div>
                <div class="swiper-slide">
                    <h2>포장재</h2>
                    <a href="/kor/business/package" class="slide-info__link">더 알아보기</a>
                </div>
                <div class="swiper-slide">
                    <h2>산업/건축용</h2>
                    <a href="/kor/business/industry" class="slide-info__link">더 알아보기</a>
                </div>
                <div class="swiper-slide">
                    <h2>Speciality</h2>
                    <a href="/kor/business/speciality/process" class="slide-info__link">더 알아보기</a>
                </div>
                <div class="swiper-slide">
                    <h2>Innovation</h2>
                    <a href="/kor/business/innovation/rnd" class="slide-info__link">더 알아보기</a>
                    {{-- <a href="#" class="slide-info__link innovation-btn">더 알아보기</a>
                    <ul class="innovation-btn__box">
                        <li>
                            <a href="/kor/business/innovation/rnd">R&D</a>
                        </li>
                        <li>
                            <a href="/kor/business/innovation/iso_certification">인증현황</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>

        <div class="swiper-container business-intro__slide-img">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/kor/images/business/intro/img_foil_01.jpg')no-repeat center / cover"></div></div>
                <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/kor/images/business/intro/img_foil_02.jpg')no-repeat center / cover"></div></div>
                <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/kor/images/business/intro/img_foil_03.jpg')no-repeat center / cover"></div></div>
                <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/kor/images/business/intro/img_foil_04.jpg')no-repeat center / cover"></div></div>
                <div class="swiper-slide"><div class="business-intro__slide-img--item" style="background:url('/kor/images/business/intro/img_foil_05.jpg')no-repeat center / cover"></div></div>
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
                    알루미늄 호일
                </h2>
                <div class="mobiel-wrap__section--button">
                    <a href="/kor/business/foil">더 알아보기</a>
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
                    <a href="/kor/business/package">더 알아보기</a>
                </div>
            </div>
            <div class="mobile-arrow"></div>
        </div>

        <div class="section mobiel-wrap__section section03">
            <div class="info-box">
                <h2 class="mobiel-wrap__section--title">
                    산업/건축용
                </h2>
                <div class="mobiel-wrap__section--button">
                    <a href="/kor/business/industry">더 알아보기</a>
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
                    <a href="/kor/business/speciality/process">더 알아보기</a>
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
                    <a href="/kor/business/innovation/rnd">더 알아보기</a>
                </div>
                    {{-- <div class="mobiel-wrap__section--button sub-menu__button innovation-btn">
                    <button type="button">더 알아보기</button>
                    </div>
                    <ul class="innovation-btn__box">
                    <li>
                        <a href="/kor/business/innovation/rnd">R&D</a>
                    </li>
                    <li>
                        <a href="/kor/business/innovation/iso_certification">인증현황</a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
    <script src="/kor/js/question.js"></script>
    <script src="/kor/js/siteIntro.js"></script>
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
@endsection
