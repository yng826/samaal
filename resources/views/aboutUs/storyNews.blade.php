<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
    </head>
    <body id="app">
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

        <main class="about-storyNews contents-wrap">
            <div class="contents-wrap__title about-storyNews__title">
                <h2>Story &amp; News</h2>
            </div>
            <div class="about-storyNews__contents">
                <div class="about-storyNews__list">
                    <ul>
                        <li class="about-storyNews__list-item">
                            <a href="#">
                                <figure>
                                    <img src="https://via.placeholder.com/508X298" alt="">
                                </figure>
                                <div class="about-storyNews__list-item--text">
                                    <h3>삼아 공식 웹사이트 리뉴얼 오픈</h3>
                                    <p>삼아알미늄의 공식 웹사이트가 새롭게 오픈했습니다.새롭게 변경된 CI를 반영하여 방문자들의 편의성을</p>
                                </div>
                            </a>
                        </li>
                        <li class="about-storyNews__list-item">
                            <a href="#">
                                <figure>
                                    <img src="https://via.placeholder.com//508X298" alt="">
                                </figure>
                                <div class="about-storyNews__list-item--text">
                                    <h3>삼아알미늄 50주년 창립 기념식</h3>
                                    <p>창립 50주년을 맞이해 평택 포승공장에 삼아알미늄의 역사와 미래 비전을 담은 상설 홍보관을 초청 행사 당일에는</p>
                                </div>
                            </a>
                        </li>
                        <li class="about-storyNews__list-item">
                            <a href="#">
                                <figure>
                                    <img src="https://via.placeholder.com/508X298" alt="">
                                </figure>
                                <div class="about-storyNews__list-item--text">
                                    <h3>삼아 창립 50주년 기념관 ‘헤리티지 존’ 개관</h3>
                                    <p>2019년 창립 50주년을 맞이한 삼아알미늄은 역사와 기술력의 산실을 담은 ‘헤리티지 존’을</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pagination">
                    <a href="#" class="pagination__button-prev"></a>
                    <a href="#" class="pagination__number active">1</a>
                    <a href="#" class="pagination__number">2</a>
                    <a href="#" class="pagination__number">3</a>
                    <a href="#" class="pagination__number">4</a>
                    <a href="#" class="pagination__number">5</a>
                    <a href="#" class="pagination__number">6</a>
                    <a href="#" class="pagination__button-next"></a>
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
