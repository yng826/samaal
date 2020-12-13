
@php
$bodyClass = 'about';
@endphp

@extends('layouts.default')

@section('contents')
<main class="about-storyNews contents-wrap">
    <div class="contents-wrap__title about-storyNews__title">
        <h2>Story &amp; News</h2>
    </div>
    <div class="storyNews-detail__contents">
        <div class="storyNews-detail__section">
            <div class="storyNews-detail__title">
                <h3>삼아 공식 웹사이트 리뉴얼 오픈</h3>
            </div>
            <div class="storyNews-detail__box">
                <div class="storyNews-detail__date">
                    <time>2020-12-30</time>
                    <span>삼아</span>
                </div>
                <!--밑에 backgorund 이미지는 예시 입니다.-->
                <div class="storyNews-detail__img" style="background-image:url(/images/business/foil/img_capacitor.jpg);"></div>
                <div class="storyNews-detail__text">
                    <p>
                        삼아알미늄의 공식 웹사이트가 새롭게 오픈했습니다.

                        새롭게 변경된 CI를 반영하여 방문자들의 편의성을 높여 삼아 브랜드와 제품에 관한 정보를 손쉽게 찾아볼 수 있습니다.

                        특히 이번 리뉴얼을 통해 반응형 웹사이트를 구현하여, 접속 기기에 따라 화면 비율이 자동으로 최적화됩니다. 이로써 언제 어디서나 삼아의 웹사이트를 편리하게 만나볼 수 있습니다.

                        삼아의 역사와 주요 제품, 성과를 직관적으로 볼 수 있도록 메뉴를 구성했습니다. 문의하기 기능과 담당자 정보 확인, 웹페이지 내 채용 지원 등의 기능으로 접속자들의 편의성을 개선했습니다.

                        앞으로도 삼아는 당사 웹사이트의 편의성을 강화하는데에 노력하겠습니다.
                    </p>
                </div>
            </div>
        </div>
        <div class="top-btn">TOP</div>
    </div>
</main>
@endsection
