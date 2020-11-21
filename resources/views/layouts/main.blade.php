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

        <main class="main">
            <section class="main-intro">
                <h2>
                    <em>삼아</em>가 만드는<br>
                    <em>지속 가능한 세상</em>
                </h2>
                <a href="#">더 알아보기</a>
            </section>
            <section class="main-about">
                <h2>
                    더 나은
                    <em>삶의 가치</em>를 위한
                    <em>삼아의 도전</em>
                </h2>
                <a href="#">About Us</a>
                <div>
                    <ul>
                        <li><a href="#">Heritage</a></li>
                        <li><a href="#">Message from CEO</a></li>
                        <li><a href="#">CI</a></li>
                        <li><a href="#">Story & News</a></li>
                        <li><a href="#">재무정보</a></li>
                        <li><a href="#">Location</a></li>
                    </ul>
                </div>
            </section>
            <section class="main-business">
                <h2>
                    <em>삼아의 도전</em>이
                    만들어낸 <em>제품</em>
                </h2>
                <a href="#">For Business Partners</a>
            </section>
            <section class="main-work">
                <h2>
                    삼아에서
                    도전의 꿈을 꾸다
                </h2>
                <a href="#">Work With Us</a>
                <ul>
                    <li><a href="#">채용공고</a></li>
                    <li><a href="#">직무소개</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </section>
        </main>

        <footer class="footer">
            <h1 class="footer__logo">SAMA</h1>
            <div class="footer__nav">
                <ul>
                    <li>
                        <h3>About Us</h3>
                        <ul>
                            <li><a href="#">Heritage</a></li>
                            <li><a href="#">Message</a></li>
                            <li><a href="#">Story & News</a></li>
                            <li><a href="#">재무정보</a></li>
                            <li><a href="#">Location</a></li>
                        </ul>
                    </li>
                    <li>
                        <h3>For Business Partners</h3>
                        <ul>
                            <li><a href="#">알루미늄 호일</a></li>
                            <li><a href="#">포장재</a></li>
                            <li><a href="#">산업/건축용</a></li>
                            <li><a href="#">Speciality</a></li>
                            <li><a href="#">Innovation</a></li>
                        </ul>
                    </li>
                    <li>
                        <h3>Work With Us</h3>
                        <ul>
                            <li><a href="#">채용공고</a></li>
                            <li><a href="#">직무소개</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </li>
                    <li>
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
            <div>
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
        </footer>
    </body>
</html>