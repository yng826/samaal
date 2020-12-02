<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <!-- {{-- @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div> --}} -->
        <header class="header">
            <a href="#" class="header__logo">
                <img src="/images/common/logo.png" alt="SAMA">
            </a>
            <nav class="header__nav">
                <ul>
                    <li class="header__nav--item">
                        <span>About Us</span>
                        <ol class="header__nav--submenu">
                            <li><a href="#">Story & News</a></li>
                            <li><a href="#">Heritage</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Investor Relations</a></li>
                        </ol>
                    </li>
                    <li class="header__nav--item">
                        <span>For Business Partners</span>
                        <ol class="header__nav--submenu">
                            <li><a href="#">알루미늄 호일</a></li>
                            <li><a href="#">포장재용</a></li>
                            <li><a href="#">산업/건축용</a></li>
                            <li><a href="#">Speciality</a></li>
                            <li><a href="#">Innovation</a></li>
                        </ol>
                    </li>
                    <li class="header__nav--item">
                        <span>Work With Us</span>
                        <ol class="header__nav--submenu">
                            <li><a href="#">채용안내</a></li>
                            <li><a href="#">인사제도</a></li>
                            <li><a href="#">조직문화</a></li>
                        </ol>
                    </li>
                </ul>
            </nav>
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
            <div class="swiper-container business-intro__slide-info slide-info">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <h2>알루미늄 Foil 1</h2>
                        <a href="#" class="slide-info__link">더 알아보기</a>
                    </div>
                    <div class="swiper-slide">
                        <h2>포장재  2</h2>
                        <a href="#" class="slide-info__link">더 알아보기</a>
                    </div>
                    <div class="swiper-slide">
                        <h2>산업건축용 3 </h2>
                        <a href="#" class="slide-info__link">더 알아보기</a>
                    </div>
                    <div class="swiper-slide">
                        <h2>Speciality 4</h2>
                        <a href="#" class="slide-info__link">더 알아보기</a>
                    </div>
                    <div class="swiper-slide">
                        <h2>Innovation 5</h2>
                        <a href="#" class="slide-info__link innovation-btn">더 알아보기</a>
                        <ul class="innovation-btn__box">
                            <li>
                                <a href="#">R&D</a>
                            </li>
                            <li>
                                <a href="#">인증현황</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="swiper-container business-intro__slide-img" style="width: 500px;">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">1<img src="https://via.placeholder.com/400X600" alt=""></div>
                  <div class="swiper-slide">2<img src="https://via.placeholder.com/400X600" alt=""></div>
                  <div class="swiper-slide">3<img src="https://via.placeholder.com/400X600" alt=""></div>
                  <div class="swiper-slide">4<img src="https://via.placeholder.com/400X600" alt=""></div>
                  <div class="swiper-slide">5<img src="https://via.placeholder.com/400X600" alt=""></div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </main>

        <footer class="footer">
            <div class="footer__wrap">
                <h1 class="footer__logo">SAMA</h1>
                <div class="footer__nav">
                    <ul class="footer__nav-list">
                        <li class="footer__nav-list--item">
                            <h3>About Us</h3>
                            <ul>
                                <li><a href="#">Heritage</a></li>
                                <li><a href="#">Message</a></li>
                                <li><a href="#">Story & News</a></li>
                                <li><a href="#">재무정보</a></li>
                                <li><a href="#">Location</a></li>
                            </ul>
                        </li>
                        <li class="footer__nav-list--item">
                            <h3>For Business Partners</h3>
                            <ul>
                                <li><a href="#">알루미늄 호일</a></li>
                                <li><a href="#">포장재</a></li>
                                <li><a href="#">산업/건축용</a></li>
                                <li><a href="#">Speciality</a></li>
                                <li><a href="#">Innovation</a></li>
                            </ul>
                        </li>
                        <li class="footer__nav-list--item">
                            <h3>Work With Us</h3>
                            <ul>
                                <li><a href="#">채용공고</a></li>
                                <li><a href="#">직무소개</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li>
                        <li class="footer__nav-list--item">
                            <h3>Others</h3>
                            <ul>
                                <li><a href="#">사이트맵</a></li>
                                <li><a href="#">통합검색</a></li>
                                <li><a href="#">통합문의</a></li>
                                <li><a href="#">약관 및 정책</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="footer__inner">
                    <div class="droplist-box">
                        <button class="droplist-box__button">패밀리사이트</button>
                        <!-- <ul class="droplist">
                            <li id="" class="droplist__item"><a href="#">패밀리1</a></li>
                            <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                            <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                        </ul> -->
                    </div>
                    <div class="droplist-box">
                        <button class="droplist-box__button">개인정보처리방침</button>
                        <!-- <ul class="droplist">
                            <li id="" class="droplist__item"><a href="#">개인정보</a></li>
                            <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                            <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                        </ul> -->
                    </div>
                    <div class="question-btn">
                        <a href="#">문의하기</a>
                    </div>
                </div>
                <p class="copyright">ⓒ 2020 SAMA. ALL RIGHTS RESERVED. DESIGNED BY DOMOBRODEUR</p>
            </div>
        </footer>
        <script src="{{ mix('/js/manifest.js')}}"></script>
        <script src="{{ mix('/js/vendor.js')}}"></script>
        <script src="{{ mix('/js/app.js')}}"></script>
        <script>
            var galleryThumbs = new Swiper('.business-intro__slide-info', {
                slidesPerView: 1,
                loop: true,
                loopedSlides: 4,
            });
            var galleryTop = new Swiper('.business-intro__slide-img', {
            slidesPerView: 4,
            spaceBetween: 30,
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
    </body>
</html>
