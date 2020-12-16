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
                <button class="droplist-box__button">개인정보처리방침</button>
                <!-- <ul class="droplist">
                    <li id="" class="droplist__item"><a href="#">개인정보</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                </ul> -->
            </div>
            <div class="question-btn">
                <a href="javascript:;">문의하기</a>
            </div>
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
                <h4>제목</h4>
                <input type="text" class="form-control" name="title" id ="title-all" placeholder="입력해주세요.">
            </li>
            <li>
                <h4>문의 분류</h4>
                <select class="form-control w-auto mr-1" name="category" id ="category-all">
                    <option value="">::선택::</option>
                    <option value="제품">제품</option>
                    <option value="채용">채용</option>
                    <option value="기업">기업</option>
                    <option value="재무정보">재무정보</option>
                    <option value="기타">기타</option>
                </select>
            </li>
            <li>
                <h4>작성자 메일 주소</h4>
                <div class="input-gorup">
                    <input type="text" class="form-control input-gorup__item" id="email-all-first" placeholder="입력해주세요.">
                    <em class="input-gorup__at">@</em>
                    <input type="text" class="form-control input-gorup__item" id="email-all-txt" placeholder="입력해주세요.">
                    <div class="input-gorup__select">
                        <select class="form-control w-auto mr-1 " id="email-all-select">
                            <option value="">::선택::</option>
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
                <h4>내용</h4>
                <textarea rows="5" class="form-control tinymce-editor" name="question" id ="question-all" placeholder="입력해주세요."></textarea>
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
                        <input class="form-check" type="checkbox" name="agree"  id ="agree-all">
                        <span>개인정보 이용 및 수집에 동의 합니다.</span>
                    </label>
                </div>
            </li>
        </ul>
        <button type="button" class="question-pop__submit-btn save-btn-all">보내기</button>
    </form>
</div>
<div class="popup-mask"></div>
{{-- <script src="{{ mix('/js/question.js')}}"></script> --}}

