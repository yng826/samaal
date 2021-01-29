@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 산업/건축용 제품';
    $meta_desc = '산업/건축용 제품';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="business-foil contents-wrap">
        <div class="business-foil__title-wrap">
            <div class="business-foil__title industry-title">
                <div class="business-foil__title-box">
                    <h2>최초를 넘어 최고의 기술력을 선보인<br> <span>삼아의 <em>산업/건축용 제품</em>을<br> 만나보세요</span></h2>
                </div>
            </div>
        </div>
        <div class="business-foil__contents foil-box">
            <div class="foil-box__half">
                <div class="foil-box__half--item">
                    <a href="industry/insulation" class="foil-box--item item-insulation">
                        <p class="foil-box__text">진공단열재용<br>필름</p>
                    </a>
                </div>
                <div class="foil-box__half--item">
                    <a href="industry/sidemirror" class="foil-box--item item-sidemirror">
                        <p class="foil-box__text">자동차용 사이드 미러<br>열선용 소재</p>
                    </a>
                </div>
            </div>
            <div class="foil-box__half">
                <div class="foil-box__half--item">
                    <a href="industry/steel" class="foil-box--item item-steel">
                        <p class="foil-box__text">Steel/Aluminium<br>Laminated Tape</p>
                    </a>
                </div>
                <div class="foil-box__half--item">
                    <a href="industry/paste" class="foil-box--item item-paste">
                        <p class="foil-box__text">알루미늄 페이스트</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
