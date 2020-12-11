<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
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

        <main class="business-foil contents-wrap">
            <div class="business-foil__title">
                <h2>최초를 넘어 최고의 기술력을 선보인<br> <span>삼아의 <em>알루미늄 Foil 제품</em>을<br> 만나보세요</span></h2>
            </div>
            <div class="business-foil__contents foil-box">
                <div class="foil-box__col">
                    <div class="foil-box__col--item item-foil">
                        <a href="" class="foil-box--item">
                            <p class="foil-box__text">연포장용 Foil</p>
                        </a>
                    </div>
                    <div class="foil-box__col--item item-fin">
                        <a href="" class="foil-box--item">
                            <p class="foil-box__text">열교환기용 <br>Fin재</p>
                        </a>
                    </div>
                </div>
                <div class="foil-box__inline">
                    <a href="#" class="foil-box--item item-capacitor">
                        <p class="foil-box__text">Capacitor용 Foil</p>
                    </a>
                </div>
                <div class="foil-box__block">
                    <div class="foil-box__block--item">
                        <a href="#" class="foil-box--item item-decoration">
                            <p class="foil-box__text">Decoration용 Foil</p>
                        </a>
                    </div>
                    <div class="foil-box__block--item">
                        <a href="#" class="foil-box--item item-line">
                            <p class="foil-box__text">Hair Line Foil</p>
                        </a>
                    </div>
                </div>
                <div class="arrow-effect">
                    <span>arrow</span>
                </div>
            </div>
            <div class="business-foil__contents foil-box">
                <!-- psd 다시 받아야 함 psd에 이미지들 없음  그리고 hover 이미지도 없음-->
                <div class="foil-box__col">
                    <div class="foil-box__col--item item-foil">
                        <a href="" class="foil-box--item">
                            <p class="foil-box__text">연포장용 Foil</p>
                        </a>
                    </div>
                    <div class="foil-box__col--item item-fin">
                        <a href="" class="foil-box--item">
                            <p class="foil-box__text">열교환기용 <br>Fin재</p>
                        </a>
                    </div>
                </div>
                <div class="foil-box__inline">
                    <a href="#" class="foil-box--item item-capacitor">
                        <p class="foil-box__text">Capacitor용 Foil</p>
                    </a>
                </div>
                <div class="foil-box__block">
                    <div class="foil-box__block--item">
                        <a href="#" class="foil-box--item item-decoration">
                            <p class="foil-box__text">Decoration용 Foil</p>
                        </a>
                    </div>
                    <div class="foil-box__block--item">
                        <a href="#" class="foil-box--item item-line">
                            <p class="foil-box__text">Hair Line Foil</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
        @include('shared.footer')
    </body>
</html>
