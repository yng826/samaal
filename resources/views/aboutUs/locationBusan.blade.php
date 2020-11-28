<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
    </head>
    <body class="about">
        <!-- {{-- @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div> --}} -->
        <header class="header">
            <a href="#" class="header__logo">
                <img src="images/common/logo.png" alt="SAMA">
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

        <main class="about-location contents-wrap">
            <div class="contents-wrap__title about-location__title">
                <h2>부산사무소</h2>
            </div>
            <div class="about-location__contents">
                <div class="swiper-container about-location__swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                        <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                        <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                        <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                        <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                        <div class="swiper-slide"><img src="https://via.placeholder.com/890X500" alt=""></div>
                    </div>
                    <div class="swiper-button-next swiper-button"></div>
                    <div class="swiper-button-prev swiper-button"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="about-location__info">
                    <div class="about-location__info--map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.8983290809415!2d129.03604761548664!3d35.10924956873463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3568e97ae1ec36ad%3A0xc31988bf574a4ce0!2z67O07Iq567mM65Sp!5e0!3m2!1sko!2skr!4v1606013059205!5m2!1sko!2skr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="about-location__info--address">
                        <p>
                            세계 최고를 향해 나아가는 기업,
                            <em>삼아의 부산사무소 문은 언제나
                            열려있습니다.</em>
                        </p>
                        <dl>
                            <dt>주소</dt><dd>부산광역시 중구 충장대로 9번길 43(보승빌딩)</dd><br>
                            <dt>전화</dt><dd>051-463-7831</dd><br>
                            <dt>FAX</dt><dd>051-466-0245</dd>
                        </dl>
                    </div>
                    <div class="about-location__info--video">
                        <!-- 영상 받으면 넣기-->
                    </div>
                </div>
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
    </body>
</html>
