<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
    </head>
    <body class="business">
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

        <main class="business-detail contents-wrap">
            <div class="contents-wrap__title business-detail__title">
                <h2>
                    @yield('detail__title')
                </h2>
            </div>
            <div class="business-detail__contents">
                <div class="business-detail__slide">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @yield('swiper-container')
                        </div>
                        <div class="swiper-button-next swiper-button"></div>
                        <div class="swiper-button-prev swiper-button"></div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
                <div class="business-detail__info info">
                    <h3 class="info__title">
                        @yield('info__title')
                    </h3>
                    <p class="info__text">
                        @yield('info__text')
                    </p>
                    <div class="info__value">
                        @yield('info__value')
                    </div>
                    @yield('info__table')
                </div>
                <div class="business-detail__button">
                    <button type="button" class="btn-question">제품문의</button>
                    <button type="button" class="btn-manager">담당자 정보</button>
                </div>
            </div>
            <!-- 문의하기 팝업 -->
            <div class="question-pop layer-popup">
                <button class="question-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
                <div class="question-pop__title">
                    <h3>문의하기</h3>
                </div>
                <form class="question-pop__info">
                    <ul>
                        <li>
                            <h4>제품명</h4>
                            <input type="text" value="">
                        </li>
                        <li>
                            <h4>작성자 메일 주소</h4>
                            <div class="input-group email-input">
                                <span class="email-input__local">
                                    <input type="text" placeholder="입력해주세요."" value="">
                                </span>
                                <span class="email-input__separator">@</span>
                                <span class="email-input__domain">
                                    <select>
                                        <option selected="" value="" disabled="">선택해주세요</option>
                                        <option value="directly">직접입력</option>
                                        <option value="naver.com">naver.com</option>
                                        <option value="hanmail.net">hanmail.net</option>
                                        <option value="daum.net">daum.net</option>
                                        <option value="gmail.com">gmail.com</option>
                                        <option value="nate.com">nate.com</option>
                                        <option value="hotmail.com">hotmail.com</option>
                                        <option value="outlook.com">outlook.com</option>
                                        <option value="icloud.com">icloud.com</option>
                                    </select>
                                </span>
                            </div>
                        </li>
                        <li>
                            <h4>내용</h4>
                            <textarea placeholder="입력해주세요."></textarea>
                        </li>
                        <li>
                            <h4>개인정보 이용 및 수집 동의</h4>
                            <div class="privacy-box">
                                1.개인정보 수집·이용목적
                                개인정보는 고객의 의견 수집을 위한 목적으로 만 사용됩니다

                                2.수집하는 개인정보 항목
                                당사는 개인정보보호법 제 15조에 따라 개인정보의 수집·이용시 본인의 동의를 받은 경우 개인정보를 수집할 수 있으며 그 수집 목적의 범위에서 이용할 수 있습니다
                                수집·이용 목적에 따라 수집하고 있는 항목은 아래와 같습니다
                                - 필수항목: 작성자 이름, 작성자 이메일 주소

                                3.개인정보 보유, 이용기간 및 파기
                                수집된 개인정보는 의견 수렴 후 6개월 보관 후 즉시 파기합니다
                                개인정보 파기 방법은 아래와 같습니다
                                - 종이 출력 정보: 분쇄기로 분쇄 혹은 소각
                                - 전자적 파일형태 정보: 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제

                                4.이용 동의 거부에 따른 불이익 안내
                                고객은 이용 동의를 거부할 수 있습니다.
                                다만, 개인정보 제공에 동의하신 경우에만 의견을 작성하실 수 있습니다
                            </div>
                            <div class="question-pop__form-check">
                                <label class="question-pop__form-check--label">
                                    <input class="form-check" type="checkbox">
                                    <span>개인정보 이용 및 수집에 동의 합니다.</span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <button type="submit" class="question-pop__submit-btn">보내기</button>
                </form>
            </div>

            <!-- 담당자 팝업 -->
            <div class="manager-pop layer-popup">
                <button class="question-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
                <div class="manager-pop__title">
                    <h3>담당자</h3>
                </div>
                <dlv class="manager-pop__list">
                    <dl>
                        <dt>담당자</dt>
                        <dd>김승주 팀장</dd>
                    </dl>
                    <dl>
                        <dt>Tel</dt>
                        <dd>02-0458-0542</dd>
                    </dl>
                    <dl>
                        <dt>E-mail</dt>
                        <dd>kimsj@sama-al.com</dd>
                    </dl>
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

        <div class="popup-marsk"></div>
        {{ mix('/js/business.js') }}
    </body>
</html>
