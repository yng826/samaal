@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 알루미늄 호일 제품';
    $meta_desc = '알루미늄 호일 제품';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="business-foil contents-wrap">
        <div class="business-foil__title-wrap">
            <div class="business-foil__title">
                <div class="business-foil__title-box">
                    <h2>최초를 넘어 최고의 기술력을 선보인<br> <span>삼아의 <em>알루미늄 호일 제품</em>을<br> 만나보세요</span></h2>
                </div>
            </div>
        </div>

        <div class="business-foil__contents foil-box">
            <div class="foil-box__col">
                <div class="foil-box__col--item item-foil">
                    <a href="foil/foil" class="foil-box--item">
                        <p class="foil-box__text">연포장용</p>
                    </a>
                </div>
                <div class="foil-box__col--item item-fin">
                    <a href="foil/fin" class="foil-box--item">
                        <p class="foil-box__text">열교환기용 <br>Fin재</p>
                    </a>
                </div>
            </div>
            <div class="foil-box__inline">
                <a href="foil/capacitor" class="foil-box--item item-capacitor">
                    <p class="foil-box__text">Capacitor용</p>
                </a>
            </div>
            <div class="foil-box__block">
                <div class="foil-box__block--item">
                    <a href="foil/decoration" class="foil-box--item item-decoration">
                        <p class="foil-box__text">Decoration용</p>
                    </a>
                </div>
                <div class="foil-box__block--item">
                    <a href="foil/line" class="foil-box--item item-line">
                        <p class="foil-box__text">Hair Line</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="business-foil__contents foil-box pt-0">
            <!-- psd 다시 받아야 함 psd에 이미지들 없음  그리고 hover 이미지도 없음-->
            <div class="foil-box__inline mr-5">
                <a href="foil/restrictions" class="foil-box--item item-restrictions">
                    <p class="foil-box__text">제약포장재용</p>
                </a>
            </div>
            <div class="foil-box__col fl-r mr-0">
                <div class="foil-box__col--item">
                    <a href="foil/car" class="foil-box--item item-car">
                    <p class="foil-box__text">LIB 양극집전체용<br>- 자동차용</p>
                </a>
                </div>
                <div class="foil-box__col--item">
                    <a href="foil/electronic" class="foil-box--item item-electronic">
                        <p class="foil-box__text">LIB 양극집전체용<br>- 전자기기용</p>
                    </a>
                </div>
            </div>

            <div class="foil-box__block">
                <div class="foil-box__block--item">
                    <a href="foil/external" class="foil-box--item item-external">
                        <p class="foil-box__text">LIB 외장재용</p>
                    </a>
                </div>
                <div class="foil-box__block--item">
                    <a href="foil/tab" class="foil-box--item item-tab">
                        <p class="foil-box__text">LIB Tab재</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
