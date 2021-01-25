@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
<main class="speciality-process contents-wrap">
    <div class="contents-wrap__title speciality-process__title">
        <h2>공정과정</h2>
    </div>
    <div class="contents-wrap__section speciality-process__contents">
        <div class="speciality-process__tab">
            <ul>
                <li data-hash="roll" data-id="content-01" class="speciality-process__tab--item item-roll"><span>압연</span></li>
                <li data-hash="manufacture" data-id="content-02" class="speciality-process__tab--item item-manufacture"><span>가공</span></li>
                <li data-hash="paste" data-id="content-03" class="speciality-process__tab--item item-paste"><span>알루미늄페이스트</span></li>
            </ul>
        </div>
        <div class="content-01 speciality-process__tab-content tab-roll process-layout">
            <p class="process-layout__text">
                삼아알미늄은 최고의 압연 기술력을 바탕으로<br>
                앞으로도 꾸준히 고객과 함께 업계의 리더로서 책임을 다하겠습니다.
            </p>
            <ul class="process-layout__list">
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">압연</span>
                    <strong class="lang-english">Rolling</strong>
                    <a href="https://www.youtube.com/embed/y-hvWlZ0Vdg?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">분리, 분단</span>
                    <strong class="lang-english">Separating / Slitting</strong>
                    <a href="https://www.youtube.com/embed/VUle8_sEG7M?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">연화</span>
                    <strong class="lang-english">Annealing</strong>
                    <a href="https://www.youtube.com/embed/HNb5OE9o9cg?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">포장</span>
                    <strong class="lang-english">Packaging</strong>
                    <a href="https://www.youtube.com/embed/sW3hHj2l47Q?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
            </ul>
            <p class="process-layout__text">
                세계 최대 작업 폭 2,100mm의 최첨단 압연기를 비롯<br>
                분리기, 분단기, 핀홀 검사기 등의 최신 생산설비<br>
                <span>국내 최초로 4.5㎛ 중합 압연 성공</span>
                국내외에서 인정하는<br>
                리튬이온배터리(Lithium-Ion Battery, LIB) 양극집전체용 알루미늄 호일
            </p>
            <div class="content-01__process">
                <ul>
                    <li class="content-01__process--item item-01">
                        <div class="text-box">
                            <div>
                                <em>압연</em>
                                <span>Rolling</span>
                            </div>
                        </div>
                    </li>
                    <li class="content-01__process--item item-02">
                        <div class="text-box">
                            <div>
                                <em>분리,분단</em>
                                <span>Separating<br>/Slitting</span>
                            </div>
                        </div>
                    </li>
                    <li class="content-01__process--item item-03">
                        <div class="text-box">
                            <div>
                                <em>연화</em>
                                <span>Annealing</span>
                            </div>
                        </div>
                    </li>
                    <li class="content-01__process--item item-04">
                        <div class="text-box">
                            <div>
                                <em>포장</em>
                                <span>Packaging</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-02 speciality-process__tab-content tab-manufacture process-layout">
            <p class="process-layout__text">
                1969년 담배포장용 알루미늄박지 생산을 시작한 이래 일반 식품포장재에서<br>
                제약, 건축, 산업용 포장재에 이르는 다양한 포장분야에서 뛰어난 품질과 개발능력으로 업계를 선도하고 있습니다.
            </p>
            <ul class="process-layout__list">
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">인쇄</span>
                    <strong class="lang-english">Printing</strong>
                    <a href="https://www.youtube.com/embed/XKEUDSpvNTU?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">접합</span>
                    <strong class="lang-english">Laminating</strong>
                    <a href="https://www.youtube.com/embed/3ZFpeeNK_dE?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">분단</span>
                    <strong class="lang-english">Slitting</strong>
                    <a href="https://www.youtube.com/embed/B6zh5mTWKgE?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">제대</span>
                    <strong class="lang-english">Bag Making</strong>
                    <a href="https://www.youtube.com/embed/U5iFUflg36Y?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">동영상 보기</a>
                </li>
            </ul>
            <p class="process-layout__text">
                인쇄기, 라미네이터, 제대기를 비롯한 최신의 첨단화된 가공설비를 도입<br>
                <span>
                    국내 최초로 레토르트 파우치 및 제약용 ALU-ALU Cold Forming Foil, 리필 파우치,<br>
                    통신 케이블 차폐용 Steel/Aluminium Laminated Tape 등 수많은 제품을 개발
                </span>
                초발수 LID 제품, 난연성 및 강도를 보강한<br>
                복합강화 진공 단열재용 외피재를 국내 최초로 개발
            </p>
            <div class="content-02__process">
                <ul>
                    <li class="content-02__process--item item-01">
                        <div class="text-box">
                            <div>
                                <em>인쇄</em>
                                <span>Printing</span>
                            </div>
                        </div>
                    </li>
                    <li class="content-02__process--item item-02">
                        <div class="text-box">
                            <div>
                                <em>접합</em>
                                <span>Laminating</span>
                            </div>
                        </div>
                    </li>
                    <li class="content-02__process--item item-03">
                        <div class="text-box">
                            <div>
                                <em>분단</em>
                                <span>Slitting</span>
                            </div>
                        </div>
                    </li>
                    <li class="content-02__process--item item-04">
                        <div class="text-box">
                            <div>
                                <em>제대</em>
                                <span>Bag Making</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-03 speciality-process__tab-content tab-paste process-layout">
            <p class="process-layout__text">
                1974년 국내 최초로 알루미늄 페이스트 생산 시작.<br>
                알루미늄박 생산과정에서 발생하는 Scrap에 가치를 부가하여 수입대체는 물론<br>
                선박, 건설, 자동차 등 산업 전반의 발전에 기여하고 있습니다
            </p>
            <ul class="process-layout__list">
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">분쇄</span>
                    <strong class="lang-english">Smashing</strong>
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">분급</span>
                    <strong class="lang-english">Classification</strong>
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">오일제거</span>
                    <strong class="lang-english">Filtering</strong>
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">혼합</span>
                    <strong class="lang-english">Mixing</strong>
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">포장</span>
                    <strong class="lang-english">Packaging</strong>
                </li>
            </ul>
            <p class="content-03__text">
                연간 2,400톤의 생산 능력을 갖추고 있으며, <br>
                오랜 생산 경험과 기술로 국내 최고의 제품을 공급하고 있습니다.
                <span>
                    전반적인 산업의 성장과 고급화에 발맞춰서<br>
                    끊임없는 기술 도전으로 세계 수준의 프리미엄 제품개발을 향해 나가고 있습니다.
                </span>
            </p>
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
@endsection
