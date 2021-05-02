<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', '삼아알미늄') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="삼아알미늄">
    <meta name="description" content="삼아알미늄">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="삼아알미늄">
    <meta property="og:type" content="website">
    <meta property="og:description" content="삼아알미늄">
    <meta property="og:id" content="sama">
    <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
    <link rel="shortcut icon" href="{{env('APP_URL')}}/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/kor/images/favicon.ico" type="image/x-icon">
    <!-- Styles -->
    <link href="/kor/css/app.css" rel="stylesheet">
    @include('shared.gtm-header')
</head>
<body class={{ $bodyClass ?? '' }}>
    <div id="main">
        @include('shared.header')

        <div id="fullpage" class="fp-destroyed main-wrap">
            <div class="section main-wrap__section section01 intro">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        <em>삼아</em>가 만드는<br> <em>지속 가능한 세상</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="/kor/intro">더 알아보기</a>
                    </div>
                </div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax test section-bg section-bg--left" data-rellax-speed="2"></div>
                        <div class="rellax test section01-img" data-rellax-speed="1"></div>
                    </div>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section02 about-us">
                <div class="mobile-mask"></div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--right" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
                        <div class="rellax section02-img" data-rellax-speed="1" data-rellax-percentage="0.5"></div>
                    </div>
                </div>
                <div class="section-right">
                    <h2 class="main-wrap__section--title">
                        더 나은<br>
                        <em>삶의 가치</em>를 위한<br>
                        <em>삼아의 도전</em>
                    </h2>
                    <div class="main-wrap__section--button sub-menu__button">
                        <button type="button">About Us</button>
                    </div>
                    <ul class="main-wrap__section--sub-menu">
                        <li><a href="/kor/about-us/heritage">Heritage</a></li>
                        <li><a href="/kor/about-us/ceo">Message from CEO</a></li>
                        <li><a href="/kor/about-us/ci">CI</a></li>
                        <li><a href="/kor/about-us/story-news">Story & News</a></li>
                        <li><a href="/kor/about-us/ir/consolidated">재무정보</a></li>
                        <li><a href="/kor/about-us/location/seoul">Location</a></li>
                    </ul>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section03 for-business-partners">
                <div class="section-left">
                    <h2 class="main-wrap__section--title">
                        <em>삼아의 도전</em>이<br>
                        만들어낸 <em>제품</em>
                    </h2>
                    <div class="main-wrap__section--button">
                        <a href="/kor/business/intro">For Business Partners</a>
                    </div>
                </div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--left" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
                        <div class="rellax section03-img" data-rellax-speed="1" data-rellax-percentage="0.5"></div>
                    </div>
                </div>
                <div class="mobile-arrow"></div>
            </div>

            <div class="section main-wrap__section section04 work-with-us">
                <div class="mobile-mask"></div>
                <div class="section main-wrap__section--img">
                    <div class="main-wrap__section--img--wrap">
                        <div class="rellax section-bg section-bg--right" data-rellax-speed="2" data-rellax-percentage="0.5"></div>
                        <div class="rellax section04-img" data-rellax-speed="1" data-rellax-percentage="0.5"></div>
                    </div>
                </div>
                <div class="section-right">
                    <h2 class="main-wrap__section--title">
                        <em>삼아</em>에서<br>
                         도전의 <em>꿈을 꾸다</em>
                     </h2>
                     <div class="main-wrap__section--button sub-menu__button">
                        <button type="button">Work With Us</button>
                     </div>
                     <ul class="main-wrap__section--sub-menu">
                         <li><a href="/kor/work-with-us/recruit/">채용공고</a></li>
                         <li><a href="/kor/work-with-us/introduction/introjob">직무소개</a></li>
                         <li><a href="/kor/work-with-us/faq">FAQ</a></li>
                     </ul>
                </div>
            </div>
        </div>


         <!-- 20210429_심규진 모달창 테스트 -->
        <!-- <style>
            .bgTmp {
                position:absolute; 
                width:100%; 
                content:''; 
                height:483%; 
                background-color:rgba(0, 0, 0, 0.5); 
                top:0; 
                left:0; 
                z-index:100
            }

            .modalTmp {
                position:absolute; 
                top:10%; 
                left:10%; 
                width:300px; 
                height:auto; 
                padding:0 10px 20px; 
                background-color:white; 
                z-index:101;
                /* background-image:url('/kor/images/main/no_img.gif') */
            }

            .modalContentTmp {
                padding: 20px 30px 20px 30px;
            }

            .modalCloseTmp {
                display:block;
                font-size:18px;
                text-align:center;
                color:#fff;
                margin:50px auto 0;
                padding:5px 50px;
                background-color:#465470
            }

            @media (max-width:767px) {
                .modalTmp {
                    width:80%;
                    padding:0 1.3333333333vw 2.6666666667vw
                }

                .modalCloseTmp {
                    margin:6.6666666667vw auto 0;
                    padding:.6666666667vw 6.6666666667vw;
                    font-size:3.3333333333vw
                }
            }
        </style>
        <div id="bgTmp" class="bgTmp"></div>
        <div id="noticeTmp" class="modalTmp">
            <div class="modalContentTmp">
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
                <p>TEST1 입니다. TEST1 입니다.</p>
            </div>
            <button type="button" class="modalCloseTmp" onClick='document.getElementById("noticeTmp").style.display = "none"; document.getElementById("bgTmp").style.display = "none"'>닫기</button>
        </div> -->

        @include('shared.notice')
        @include('shared.footer')
        @yield('popup-container')
    </div>


    @section('script')
    <!-- Scripts -->    
    <script src="/kor/js/manifest.js"></script>
    <script src="/kor/js/vendor.js"></script>
    <script src="/kor/js/app.js"></script>
    <script src="/kor/js/question.js"></script>
    <script src="/kor/js/siteIntro.js"></script>
    <!-- Scripts -->
    @show
</body>
</html>
