<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="js/app.js"></script>
    </head>
    <body>
        <div class="intro-section">
            <header class="header sub-hader">
                <a href="#" class="header__logo">
                    <img src="/images/main/m_main_logo.png" alt="SAMA" class="intro-logo">
                    <img src="/images/common/logo.png" alt="SAMA" class="hidden">
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

            <main class="intro-wrap">
               <section class="intro-wrap__section">
                    <div class="intro-wrap__section--left">
                        <p>
                            미래는 불확실합니다.<br>
                            불확실성은 무한한 상상력과 도전을 요구합니다.
                        </p>
                        <p>
                            "고객이 원하는 것을 안전하게 보존하며 이동을 쉽게 해준다."<br>
                            우리는 미션을 통해 새로운 도전을 약속했습니다.
                        </p>
                        <p>
                            세상을 유익하게 만들면서 수익을 창출하는 것,<br>
                            편리한 삶의 가치를 위한 기술 혁신에 이어
                        </p>
                        <p class="important-text">
                            사회적·환경적 가치를 지키며<br>
                            지속 가능한 세상을 만들기 위해<br>
                            <span>삼아는 새로운 도약을 시작합니다.</span>
                        </p>
                    </div>
                    <div class="intro-wrap__section--right">
                        <p>
                            세계 최고의 기술력으로<br>
                            양질의 일자리를 늘려 국가 경제에 기여하고 있습니다.
                        </p>
                        <p>
                            고품질의 알루미늄 호일 및 포장재 생산 기술을 통해<br>
                            식품의 유통기한을 늘림으로써 음식물 쓰레기를 줄여<br>
                            환경보호에 기여하고 있습니다.
                        </p>
                        <p>
                            식품 이동을 쉽게 만들어 더 많은 사람들에게<br>
                            편리하고 안전하게 식량을 공급하고 있습니다.
                        </p>
                        <p>
                            이차전지 양극재 기술은 유한한 자원을 효율적으로 사용하게 하여<br>
                            친환경에너지 보급에 큰 기여를 하고 있습니다.
                        </p>
                        <p class="important-text">
                            최고의 제품을 넘어<br>
                            사회적 변화를 이끌기 위한 노력,<br>
                            <span>삼아가 지속 가능한 세상에 존재하는 이유입니다.</span>
                        </p>
                    </div>
               </section>
            </main>
            @include('shared.footer')
        </div>
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/question.js')}}"></script>
    </body>
</html>
