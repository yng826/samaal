@php
    $bodyClass = 'about';
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
                <h3>The Sama Aluminium Story</h3>
                <p>
                    Sama Aluminium was founded in 1969 with the ambition to contribute towards Korea’s economy by becoming more self-sufficient in the aluminium foil industry through localization. Proudly marking our 50th anniversary in 2019, our company has been constantly evolving and innovating in response to the rapidly changing market environment and the current of the times. Choosing not to become complacent over past achievements, and with the unwavering trust of our customers supporting us, we will revolutionize the industry and establish our position as a global leader for the next 50 years and beyond.
                </p>
            </div>
            <div class="about-ci__identity--orientation about-ci__identity--area">
                <h3>Sama Aluminium’s Direction</h3>
                <p>
                    With the world’s best weight reduction technology, Sama Aluminium contributes to a sustainable world by safely preserving our customers’ needs with mobile ease.
                </p>
            </div>
        </div>
        <div class="about-ci__img"></div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="/eng/js/app.js"></script> --}}
@endsection
