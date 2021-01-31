<html>
    <head>
        <title>{{ $meta_title ?? '' }}</title>
        <meta name="title" content="{{ $meta_title ?? '' }}">
        <meta name="description" content="{{ $meta_desc ?? '' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:title" content="{{ $meta_title ?? '' }}">
        <meta property="og:type" content="website">
        <meta property="og:description" content="{{ $meta_desc ?? '' }}">
        <meta property="og:id" content="sama">
        <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
        <link rel="stylesheet" href="/kor/css/app.css">
        <link rel="icon" href="{{env('APP_URL')}}/images/favicon.ico" type="image/x-icon">
        @include('shared.gtm-header')
    </head>
    <body class="business">
        <div id="app">
            @include('shared.header')
            <main class="business-detail contents-wrap">
                <div class="contents-wrap__title business-detail__title">
                    <h2>
                        @yield('detail__title')
                    </h2>
                </div>
                <div class="business-detail__contents">
                    <div class="business-detail__slide">
                        <div class="swiper-container business-detail-swiper">
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
                <div class="question-pop layer-popup q-pop business-pop">
                    <button class="question-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
                    <div class="question-pop__title">
                        <h3>문의하기</h3>
                    </div>
                    <form action="/board/question_board" class="question-pop__info question-form" method="POST">
                        <ul>
                            <li>
                                <h4>제품명</h4>
                                <input type="hidden" class="form-control" name="manager" id="manager" value="{{ $business->email }}">
                                <input type="hidden" class="form-control" name="title" id="title" value="{{ $question_title }}">
                                <input type="hidden" class="form-control" name="category" id="category" value="{{ $question_title }}">
                                <input type="text" class="form-control" id="category1" value="{{ $question_title }}" disabled>
                            </li>
                            <li>
                                <h4>작성자 메일 주소</h4>
                                <input type="text" class="form-control input-gorup__item" id="email-first" placeholder="입력해주세요.">
                                <em class="input-gorup__at">@</em>
                                <input type="text" class="form-control input-gorup__item hidden" id="email-txt" placeholder="입력해주세요.">
                                <select class="form-control w-auto mr-1 input-gorup__item" id="email-select">
                                    <option value="">::선택::</option>
                                    <option value="naver.com">naver.com</option>
                                    <option value="gmail.com">gmail.com</option>
                                    <option value="daum.net">daum.net</option>
                                    <option value="직접 입력">직접 입력</option>
                                </select>
                                <input type="hidden" name="email" id="email">
                            </li>
                            <li>
                                <h4>내용</h4>
                                <textarea rows="5" class="form-control tinymce-editor" name="question" id="question" placeholder="입력해주세요."></textarea>
                            </li>
                            <li>
                                <h4>개인정보 이용 및 수집 동의</h4>
                                <div class="privacy-box">
                                    <h5>1.개인정보 수집·이용목적</h5>
                                    <p>개인정보는 고객의 의견 수집을 위한 목적으로 만 사용됩니다</p>

                                    <h5>2.수집하는 개인정보 항목</h5>
                                    <p>당사는 개인정보보호법 제 15조에 따라 개인정보의 수집·이용시 본인의 동의를 받은 경우 개인정보를 수집할 수 있으며 그 수집 목적의 범위에서 이용할 수 있습니다</p>
                                    <p>수집·이용 목적에 따라 수집하고 있는 항목은 아래와 같습니다</p>
                                    <p>- 필수항목: 작성자 이름, 작성자 이메일 주소</p>

                                    <h5>3.개인정보 보유, 이용기간 및 파기</h5>
                                    <p>수집된 개인정보는 의견 수렴 후 6개월 보관 후 즉시 파기합니다</p>
                                    <p>개인정보 파기 방법은 아래와 같습니다</p>
                                    <p>- 종이 출력 정보: 분쇄기로 분쇄 혹은 소각</p>
                                    <p>- 전자적 파일형태 정보: 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제</p>

                                    <h5>4.이용 동의 거부에 따른 불이익 안내</h5>
                                    <p>고객은 이용 동의를 거부할 수 있습니다.</p>
                                    <p>다만, 개인정보 제공에 동의하신 경우에만 의견을 작성하실 수 있습니다</p>
                                </div>
                                <div class="question-pop__form-check">
                                    <label class="question-pop__form-check--label">
                                        <input class="form-check" type="checkbox" name="agree" id="agree">
                                        <span>개인정보 이용 및 수집에 동의 합니다.</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="question-pop__submit-btn save-btn">보내기</button>
                    </form>
                </div>
                <!-- 담당자 팝업 -->
                <div class="manager-pop layer-popup">
                    @yield('manager-pop')
                </div>
            </main>

            @include('shared.footer')
{{--
            <div class="popup-mask"></div> --}}
        </div>

        <script src="/kor/js/manifest.js"></script>
        <script src="/kor/js/vendor.js"></script>
        <script src="/kor/js/app.js"></script>
        <script src="/kor/js/question.js"></script>
    </body>
</html>
