@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="business-foil contents-wrap">
        <div class="business-foil__title-wrap">
            <div class="business-foil__title">
                <div class="business-foil__title-box">
                    <h2>Meet <span>Sama's globally renowned<br> <em>Aluminium foil products</em></span> made<br> with the world’s leading technology</h2>
                </div>
            </div>
        </div>

        <div class="business-foil__contents foil-box">
            <div class="foil-box__col">
                <div class="foil-box__col--item item-foil">
                    <a href="foil/foil" class="foil-box--item">
                        <p class="foil-box__text">Aluminium Foil for Flexible Packaging</p>
                    </a>
                </div>
                <div class="foil-box__col--item item-fin">
                    <a href="foil/fin" class="foil-box--item">
                        <p class="foil-box__text">Finstock for Heat Exchanger</p>
                    </a>
                </div>
            </div>
            <div class="foil-box__inline">
                <a href="foil/capacitor" class="foil-box--item item-capacitor">
                    <p class="foil-box__text">Aluminium Foil for Electrical Capacitor</p>
                </a>
            </div>
            <div class="foil-box__block">
                <div class="foil-box__block--item">
                    <a href="foil/decoration" class="foil-box--item item-decoration">
                        <p class="foil-box__text">High-gloss Aluminium Foil for Decoration</p>
                    </a>
                </div>
                <div class="foil-box__block--item">
                    <a href="foil/line" class="foil-box--item item-line">
                        <p class="foil-box__text">Hair Line Aluminium Foil</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="business-foil__contents foil-box pt-0">
            <!-- psd 다시 받아야 함 psd에 이미지들 없음  그리고 hover 이미지도 없음-->
            <div class="foil-box__inline mr-5">
                <a href="foil/restrictions" class="foil-box--item item-restrictions">
                    <p class="foil-box__text">Aluminium Foil for Pharmaceutical Packaging</p>
                </a>
            </div>
            <div class="foil-box__col fl-r mr-0">
                <div class="foil-box__col--item">
                    <a href="foil/car" class="foil-box--item item-car">
                    <p class="foil-box__text">LIB Cathode Foil for Automotive</p>
                </a>
                </div>
                <div class="foil-box__col--item">
                    <a href="foil/electronic" class="foil-box--item item-electronic">
                        <p class="foil-box__text">LIB Cathode Foil for Electronics</p>
                    </a>
                </div>
            </div>

            <div class="foil-box__block">
                <div class="foil-box__block--item">
                    <a href="foil/external" class="foil-box--item item-external">
                        <p class="foil-box__text">Aluminium Foil for LIB Pouch</p>
                    </a>
                </div>
                <div class="foil-box__block--item">
                    <a href="foil/tab" class="foil-box--item item-tab">
                        <p class="foil-box__text">LIB Tab</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
