<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:title" content="SAMA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="SAMA">
        <meta property="og:id" content="sama">
        <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
        <link rel="stylesheet" href="/css/app.css">
        <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
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
                        <button type="button" class="btn-question">Inquiry</button>
                        <button type="button" class="btn-manager">Contact Information</button>
                    </div>
                </div>
                <!-- 문의하기 팝업 -->
                <div class="question-pop layer-popup q-pop business-pop">
                    <button class="question-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
                    <div class="question-pop__title">
                        <h3>Contact us</h3>
                    </div>
                    <form action="/board/question_board" class="question-pop__info question-form" method="POST">
                        <ul>
                            <li>
                                <h4>Product</h4>
                                <input type="hidden" class="form-control" name="manager" id="manager" value="{{ $business->email }}">
                                <input type="hidden" class="form-control" name="title" id="title" value="{{ $question_title }}">
                                <input type="hidden" class="form-control" name="category" id="category" value="{{ $question_title }}">
                                <input type="text" class="form-control" id="category1" value="{{ $question_title }}" disabled>
                            </li>
                            <li>
                                <h4>E-mail address</h4>
                                <input type="text" class="form-control input-gorup__item" id="email-first" placeholder="">
                                <em class="input-gorup__at">@</em>
                                <input type="text" class="form-control input-gorup__item hidden" id="email-txt" placeholder="">
                                <select class="form-control w-auto mr-1 input-gorup__item" id="email-select">
                                    <option value="">::Select::</option>
                                    <option value="naver.com">naver.com</option>
                                    <option value="gmail.com">gmail.com</option>
                                    <option value="daum.net">daum.net</option>
                                    <option value="direct">Direct Input</option>
                                </select>
                                <input type="hidden" name="email" id="email">
                            </li>
                            <li>
                                <h4>Contents</h4>
                                <textarea rows="5" class="form-control tinymce-editor" name="question" id="question" placeholder=""></textarea>
                            </li>
                            <li>
                                <h4>Privacy Policy</h4>
                                <div class="privacy-box">
                                    <h5>1. Personal information for collecting and using personal information is used only for the purpose of collecting opinions from customers. </h5>

                                    <h5>2. The company may collect personal information if it has obtained its consent when collecting and using personal information pursuant to Article 15 of the Privacy Act and may use it within the scope of its purpose. The items you are collecting for your collection and use are listed below </h5>
                                    <p>- Required items: Author Name, Author Email Address </p>

                                    <h5>3. Personal information retention, period of use, and personal information collected shall be destroyed immediately after 6 months of storage after collecting opinions. Here's how to destroy your personal information. </h5>
                                    <p>- Paper output information: Grinding or incineration with a grinder </p>
                                    <p>- Electronic file type information: Delete using a technical method that does not allow the recording to be played back </p>

                                    <h5>4. Customers who are notified of the disadvantage due to refusal of the use consent may reject the use consent.</h5>
                                </div>
                                <div class="question-pop__form-check">
                                    <label class="question-pop__form-check--label">
                                        <input class="form-check" type="checkbox" name="agree" id="agree">
                                        <span>I consent.</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="question-pop__submit-btn save-btn">Submit</button>
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

        <script src="{{ mix('/js/manifest.js')}}"></script>
        <script src="{{ mix('/js/vendor.js')}}"></script>
        <script src="{{ mix('/js/app.js')}}"></script>
        <script src="{{ mix('/js/question.js')}}"></script>
    </body>
</html>
