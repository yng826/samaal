@php
    $bodyClass = 'about';
    $meta_title = '삼아알미늄 | 연혁';
    $meta_desc = '연혁';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="about-heritage contents-wrap">
        <div class="about-heritage__top-img"></div>
        <div class="about-heritage__contents">
            <div class="about-heritage__info">
                <h3 class="about-heritage__info--title">
                    <span>국내 최고의 알루미늄 박과 포장재 생산기업인 삼아는</span><br>
                    지속가능한 기업으로 세계 최고를 향해 나아갑니다.
                </h3>
                <p class="about-heritage__info--text">
                    1969년 창립한 삼아알미늄은 끊임없는 연구개발을 통해 최고의 기술력으로<br>
                    국내의 알루미늄 박과 가공 포장 업계를 선도하고 있습니다.<br>
                    이와 더불어 공장관리시스템/ERP/통합 정보 시스템을 기반으로 한 IT 구축으로<br>
                    스마트 팩토리와 지식경영을 통해 글로벌 기업을 향해 나아가고 있습니다.
                </p>
            </div>
            <div class="about-heritage__slide">
                <div class="about-heritage__slide--img swiper-container">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1969.jpg" alt="삼아알미늄 담배포장지 : 우수한 보향 및 보습성으로 삼아 설립부터 현재까지 생산 중인 담배용 내포장재"></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1974.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1981.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1982.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1984.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1990.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1993.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1995.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_1998.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2005.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2006.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2007.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2012_01.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2012_02.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2012.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2016.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="/kor/images/about/heritage/slide_2017.jpg" alt=""></div>
                    </div>
                </div>
                <div class="about-heritage__slide--year swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide slide1969">1969</div>
                        <div class="swiper-slide slide1974">1974</div>
                        <div class="swiper-slide slide1981">1981</div>
                        <div class="swiper-slide slide1982">1982</div>
                        <div class="swiper-slide slide1984">1984</div>
                        <div class="swiper-slide slide1990">1990</div>
                        <div class="swiper-slide slide1993">1993</div>
                        <div class="swiper-slide slide1995">1995</div>
                        <div class="swiper-slide slide1998">1998</div>
                        <div class="swiper-slide slide2005">2005</div>
                        <div class="swiper-slide slide2006">2006</div>
                        <div class="swiper-slide slide2007">2007</div>
                        <div class="swiper-slide slide2012-01">2012</div>
                        <div class="swiper-slide slide2012-02">2012</div>
                        <div class="swiper-slide slide2012-03">2012</div>
                        <div class="swiper-slide slide2016">2016</div>
                        <div class="swiper-slide slide2017">2017</div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <p class="about-heritage__text">* UN 지속가능 발전 목표(SDGs) 색상을 활용했습니다.</p>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script>
        // aboutUs - heritage
       // heritage swiper
       var swiperImg = new Swiper('.about-heritage__slide--img', {
           loop: true,
           slidesPerView: 2,
           loopedSlides: 17,
           centeredSlides: true,
           navigation: {
               nextEl: '.about-heritage__slide--year .swiper-button-next',
               prevEl: '.about-heritage__slide--year .swiper-button-prev',
           }
       });
       swiperImg.on('slideChange', function(a,b){
           console.log(a, b);
       })
       var swiperYear = new Swiper('.about-heritage__slide--year', {
           loop: true,
           slidesPerView: 7,
           loopedSlides: 17,
           centeredSlides: true,
        //    navigation: {
        //        nextEl: '.about-heritage__slide--img .swiper-button-next',
        //        prevEl: '.about-heritage__slide--img .swiper-button-prev',
        //    }
       });
       swiperYear.on('click', function(sw,b) {
           console.log(sw, b);
           if ( b.target.className !== 'swiper-button-next' && b.target.className !== 'swiper-button-prev') {
                sw.slideTo(sw.clickedIndex);
           }
       })
       swiperYear.controller.control = swiperImg;
       swiperImg.controller.control = swiperYear;

   </script>
@endsection
