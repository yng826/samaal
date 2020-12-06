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
                <li data-id="content-01" class="speciality-process__tab--item on">압연</li>
                <li data-id="content-02" class="speciality-process__tab--item">가공</li>
                <li data-id="content-03" class="speciality-process__tab--item">알루미늄페이스트</li>
            </ul>
        </div>
        <div class="content-01 speciality-process__tab-content on">
            <p class="content-01__text">
                삼아알미늄은 최고의 압연 기술력을 바탕으로<br>
                앞으로도 꾸준히 고객과 함께 업계의 리더로서 책임을 다하겠습니다.
            </p>
            <ul class="content-01__list">
                <li class="content-01__list--item">
                    <span class="lang-korea">압연</span>
                    <stron class="lang-english">Roughing</stron>
                    <a href="#" class="popup-btn">동영상 보기</a>
                </li>
                <li class="content-01__list--item">
                    <span class="lang-korea">분리, 분단</span>
                    <stron class="lang-english">Separating/Slitting</stron>
                    <a href="#" class="popup-btn">동영상 보기</a>
                </li>
                <li class="content-01__list--item">
                    <span class="lang-korea">연화</span>
                    <stron class="lang-english">Annealing</stron>
                    <a href="#" class="popup-btn">동영상 보기</a>
                </li>
                <li class="content-01__list--item">
                    <span class="lang-korea">포장</span>
                    <stron class="lang-english">Packaging</stron>
                    <a href="#" class="popup-btn">동영상 보기</a>
                </li>
            </ul>
            <p class="content-01__text">
                세계 최대 작업 폭 2,100mm의 최첨단 압연기를 비롯
                분리기, 분단기, 핀홀 검사기 등의 최신 생산설비

                <span>국내 최초로 4.5㎛ 중합 압연 성공</span>

                국/내외에서 인정하는
                리튬이온배터리(Lithium-Ion Battery, LIB) 양극집전체용 AL-Foill
            </p>
            <div class="content-01__img"></div>
        </div>
        <div class="content-02 speciality-process__tab-content">
            test2
        </div>
        <div class="content-03 speciality-process__tab-content">
            test3
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
@endsection
