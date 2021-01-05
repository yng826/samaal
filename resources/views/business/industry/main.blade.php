@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="business-foil contents-wrap">
        <div class="business-foil__title-wrap">
            <div class="business-foil__title industry-title">
                <div class="business-foil__title-box">
                    <h2>Meet <span>Sama's globally renowned<br> <em>industrial and construction materials</em></span><br> made with the world’s leading technology</h2>
                </div>
            </div>
        </div>
        <div class="business-foil__contents foil-box">
            <div class="foil-box__half">
                <div class="foil-box__half--item">
                    <a href="industry/insulation" class="foil-box--item item-insulation">
                        <p class="foil-box__text">High barrier film for vacuum insulation panel</p>
                    </a>
                </div>
                <div class="foil-box__half--item">
                    <a href="industry/sidemirror" class="foil-box--item item-sidemirror">
                        <p class="foil-box__text">Laminated Film for Rear View Mirror Heater</p>
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
                        <p class="foil-box__text">Aluminium Paste</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
