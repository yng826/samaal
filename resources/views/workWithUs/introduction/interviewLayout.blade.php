@php
    $bodyClass = 'workWithUs';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="introduction-interview contents-wrap {{ $introductionBgColor ?? 'blue' }}">
        <div class="introduction-interview__title">
            <h2>
                @yield('title')
            </h2>
        </div>
        <div class="introduction-interview__contents">
            <div class="introduction-interview__team">
                @yield('team')
            </div>
            <div class="introduction-interview__qna">
                <ul>
                    <li class="introduction-interview__qna--left">
                        @yield('qna-01')
                    </li>
                    <li class="introduction-interview__qna--right">
                        @yield('qna-02')
                    </li>
                    <li class="introduction-interview__qna--left">
                        @yield('qna-03')
                    </li>
                </ul>
            </div>
        </div>
        <div class="top-btn">TOP</div>
    </main>
@endsection

@section('script')
    @parent
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
@endsection
