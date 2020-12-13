@extends('layouts.default')

@section('contents')
    <div id="fullpage" class="fp-destroyed main-wrap">

        <div class="section main-wrap__section section01">
            <div class="section-left">
                <h2 class="main-wrap__section--title">
                    <em>삼아</em>가 만드는<br> <em>지속 가능한 세상</em>
                </h2>
                <div class="main-wrap__section--button">
                    <a href="#">더 알아보기</a>
                </div>
            </div>
            <div class="section main-wrap__section--img section01-img"></div>
        </div>

        <div class="section main-wrap__section section02">
            <div class="section main-wrap__section--img section02-img"></div>
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
                    <li><a href="#">Heritage</a></li>
                    <li><a href="#">Message from CEO</a></li>
                    <li><a href="#">CI</a></li>
                    <li><a href="#">Story & News</a></li>
                    <li><a href="#">재무정보</a></li>
                    <li><a href="#">Location</a></li>
                </ul>
            </div>
        </div>

        <div class="section main-wrap__section section03">
            <div class="section-left">
                <h2 class="main-wrap__section--title">
                    <em>삼아의 도전</em>이<br>
                    만들어낸 <em>제품</em>
                </h2>
                <div class="main-wrap__section--button">
                    <a href="#">For Business Partners</a>
                </div>
            </div>
            <div class="section main-wrap__section--img section03-img"></div>
        </div>

        <div class="section main-wrap__section section04">
            <div class="section main-wrap__section--img section04-img"></div>
            <div class="section-right">
                <h2 class="main-wrap__section--title">
                    <em>삼아</em>에서<br>
                     도전의 <em>꿈을 꾸다</em>
                 </h2>
                 <div class="main-wrap__section--button sub-menu__button">
                    <button type="button">About Us</button>
                 </div>
                 <ul class="main-wrap__section--sub-menu">
                     <li><a href="#">채용공고</a></li>
                     <li><a href="#">직무소개</a></li>
                     <li><a href="#">FAQ</a></li>
                 </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('/js/siteIntro.js') }}"></script>
@endsection
