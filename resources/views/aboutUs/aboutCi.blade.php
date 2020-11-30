<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="js/app.js"></script>
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

        <main class="about-ci contents-wrap">
            <div class="contents-wrap__title about-ci__title">
                <h2>CI</h2>
            </div>
            <div class="contents-wrap__section about-ci__contents">
                <div class="about-ci__identity">
                    <div class="about-ci__identity--story about-ci__identity--area">
                        <h3>삼아알미늄 스토리</h3>
                        <p>
                            2019년 창립 50주년을 맞이한 삼아알미늄은, 1969년 알루미늄박의 국산화를 통한 자립경제의 실현이라는 꿈을 품고 출발하였습니다.<br>
                            지난 50여년 동안 급속하게 변화하는 시장 환경과 시대의 흐름에 대응하기 위해 삼아알미늄은 지속적으로 변화하고 혁신해 왔습니다.<br>
                            지난 시간 이루어 온 것에 안주하지 않고, 새로운 50년의 길을 개척해 나가기 위해 삼아알미늄은 고객의 신뢰를 바탕으로 혁신을 거듭하여 업계를 선도하는 글로벌 리더십을 확고히 할 것입니다.
                        </p>
                    </div>
                    <div class="about-ci__identity--orientation about-ci__identity--area">
                        <h3>삼아알미늄의 지향점</h3>
                        <p>
                            삼아알미늄은 세계 최고의 경량화 기술로, 고객이 원하는 모든 것을 안전하게 보존하며, 가볍고 간편하게 이동할 수 있게 하여 지속가능한 세상을 만드는데 기여합니다.
                        </p>
                    </div>
                </div>
                <div class="about-ci__img"></div>
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
