@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="business-foil contents-wrap">
        <div class="business-foil__title-wrap">
            <div class="business-foil__title package-title">
                <div class="business-foil__title-box">
                    <h2>Meet <span>Sama's globally renowned <br><em>packaging materials</em></span> made<br> with the world’s leading technology</h2>
                </div>
            </div>
        </div>
        <div class="business-foil__contents foil-box">
            <div class="foil-box__col">
                <div class="foil-box__col--item item-cigarette">
                    <a href="package/cigarette" class="foil-box--item">
                        <p class="foil-box__text">Aluminium-backed Paper for Cigarette Packaging</p>
                    </a>
                </div>
                <div class="foil-box__col--item item-refill">
                    <a href="package/refill" class="foil-box--item">
                        <p class="foil-box__text">Refill Pouch</p>
                    </a>
                </div>
            </div>
            <div class="foil-box__inline">
                <a href="package/retort" class="foil-box--item item-retort">
                    <p class="foil-box__text">Retortable Packaging</p>
                </a>
            </div>
            <div class="foil-box__block">
                <div class="foil-box__block--item">
                    <a href="package/alu" class="foil-box--item item-alu">
                        <p class="foil-box__text">ALU-ALU<br>Cold Forming Foil</p>
                    </a>
                </div>
                <div class="foil-box__block--item">
                    <a href="package/watertight" class="foil-box--item item-watertight">
                        <p class="foil-box__text">Water-repellent Lid Film</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
