@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
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
        </main>
@endsection

@section('script')
    @parent
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
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
@endsection

