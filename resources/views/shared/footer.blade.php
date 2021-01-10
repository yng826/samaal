<footer class="footer">
    <div class="footer__m-top"></div>
    <div class="footer__wrap">
        <h1 class="footer__logo">SAMA</h1>
        <div class="footer__nav">
            <ul class="footer__nav-list">
                @foreach ($treeSitemap as $sitemap)
                <li class="footer__nav-list--item">
                    <h3>{{ $sitemap->name }}</h3>
                    <ul>
                    @if(isset($sitemap->children) && count($sitemap->children) > 0)
                        @foreach($sitemap->children as $children)

                            @if ($children->name == '통합 문의')
                                <li class="question-btn"><a href="javascript:;">{{ $children->name }}</a></li>
                            @else
                                <li><a href="{{ $children->url }}">{{ $children->name }}</a></li>
                            @endif

                        @endforeach
                    @endif
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="footer__inner">
            {{-- <div class="droplist-box">
                <button class="droplist-box__button">패밀리사이트</button>
                <!-- <ul class="droplist">
                    <li id="" class="droplist__item"><a href="#">패밀리1</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                </ul> -->
            </div> --}}
            <div class="droplist-box">
                <button class="droplist-box__button" onClick="location.href='/other/privacy'">Personal Information Management Policy</button>
                <button class="droplist-box__button" onClick="location.href='/other/email_security'">Prohibition of Unauthorized Email Collection</button>
                <!-- <ul class="droplist">
                    <li id="" class="droplist__item"><a href="#">개인정보</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                </ul> -->
            </div>
            <div class="question-btn">
                <a href="javascript:;">Contact us</a>
            </div>
            <div class="top-btn">TOP</div>
        </div>
        <p class="copyright">ⓒ 2020 SAMA. ALL RIGHTS RESERVED. DESIGNED BY DOMOBRODEUR</p>
    </div>
</footer>
<!-- 문의하기 팝업 -->
<div class="question-pop layer-popup all-q-pop">
    <button class="question-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
    <div class="question-pop__title">
        <h3>문의하기</h3>
    </div>
    <form action="/board/question_board" class="question-pop__info question-form-all" method="POST">
        <ul>
            <li>
                <h4>Title</h4>
                <input type="text" class="form-control" name="title" id ="title-all" placeholder="입력해주세요.">
            </li>
            <li>
                <h4>Categories</h4>
                <select class="form-control w-auto mr-1" name="category" id ="category-all">
                    <option value="">::Select::</option>
                    <option value="Product">Product</option>
                    <option value="Recruitment">Recruitment</option>
                    <option value="Others">Others</option>
                </select>
            </li>
            <li>
                <h4>E-mail address</h4>
                <div class="input-gorup">
                    <input type="text" class="form-control input-gorup__item" id="email-all-first" placeholder="입력해주세요.">
                    <em class="input-gorup__at">@</em>
                    <input type="text" class="form-control input-gorup__item hidden" id="email-all-txt" placeholder="입력해주세요.">
                    <div class="input-gorup__select">
                        <select class="form-control w-auto mr-1 " id="email-all-select">
                            <option value="">::Select::</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="직접 입력">직접 입력</option>
                        </select>
                    </div>
                    <input type="hidden" name="email" id="email-all">
                </div>
            </li>
            <li>
                <h4>Contents</h4>
                <textarea rows="5" class="form-control tinymce-editor" name="question" id ="question-all" placeholder="입력해주세요."></textarea>
            </li>
            <li>
                <h4>개인정보 이용 및 수집 동의</h4>
                <div class="privacy-box">
                    <h4>1. Personal information for collecting and using personal information is used only for the purpose of collecting opinions from customers. </h4>

                    <h4>2. The company may collect personal information if it has obtained its consent when collecting and using personal information pursuant to Article 15 of the Privacy Act and may use it within the scope of its purpose. The items you are collecting for your collection and use are listed below </h4>
                    <p>- Required items: Author Name, Author Email Address </p>

                    <h4>3. Personal information retention, period of use, and personal information collected shall be destroyed immediately after 6 months of storage after collecting opinions. Here's how to destroy your personal information. </h4>
                    <p>- Paper output information: Grinding or incineration with a grinder </p>
                    <p>- Electronic file type information: Delete using a technical method that does not allow the recording to be played back </p>

                    <h4>4. Customers who are notified of the disadvantage due to refusal of the use consent may reject the use consent.</h4>

                </div>
                <div class="question-pop__form-check">
                    <label class="question-pop__form-check--label">
                        <input class="form-check" type="checkbox" name="agree"  id ="agree-all">
                        <span>I consent.</span>
                    </label>
                </div>
            </li>
        </ul>
        <button type="button" class="question-pop__submit-btn save-btn-all">Submit</button>
    </form>
</div>
<div class="popup-mask"></div>
{{-- <script src="{{ mix('/js/question.js')}}"></script> --}}

