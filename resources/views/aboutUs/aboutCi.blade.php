@php
    $bodyClass = 'about';
    $meta_title = '삼아알미늄 | CI';
    $meta_desc = 'CI';
@endphp

@extends('layouts.default')

@section('contents')
<main class="about-ci contents-wrap">
    <div class="contents-wrap__title about-ci__title">
        <h2>
            CI
            <p>(Corporate Identity)</p>
        </h2>
    </div>
    <div class="contents-wrap__section about-ci__contents">
        <div class="about-ci__identity">
            <div class="about-ci__identity--story about-ci__identity--area">
                <h3>삼아알미늄 스토리</h3>
                <p>
                    2019년 창립 50주년을 맞이한 삼아알미늄은, 1969년 알루미늄박의 국산화를 통한 자립경제의 실현이라는 꿈을 품고 출발하였습니다.<br>
                    지난 50여 년 동안 급속하게 변화하는 시장 환경과 시대의 흐름에 대응하기 위해 삼아알미늄은 지속적으로 변화하고 혁신해 왔습니다.<br>
                    지난 시간 이루어 온 것에 안주하지 않고, 새로운 50년의 길을 개척해 나가기 위해 삼아알미늄은 고객의 신뢰를 바탕으로 혁신을 거듭하여 업계를 선도하는 글로벌 리더십을 확고히 할 것입니다.
                </p>
            </div>
            <div class="about-ci__identity--orientation about-ci__identity--area">
                <h3>삼아알미늄의 지향점</h3>
                <p>
                    삼아알미늄은 세계 최고의 경량화 기술로, 고객이 원하는 모든 것을 안전하게 보존하며, 가볍고 간편하게 이동할 수 있게 하여 지속가능한 세상을 만드는데 기여합니다.
                </p>
            </div>
        </div>
        <div class="about-ci__img"></div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="/kor/js/app.js"></script> --}}
@endsection
