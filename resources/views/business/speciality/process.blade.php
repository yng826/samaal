@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
<main class="speciality-process contents-wrap">
    <div class="contents-wrap__title speciality-process__title">
        <h2>공정과정</h2>
    </div>
    <div class="contents-wrap__section speciality-process__contents">
        <div class="speciality-process__tab">
            <ul>
                <li data-id="content-01" class="speciality-process__tab--item on">압연</li>
                <li data-id="content-02" class="speciality-process__tab--item">가공</li>
                <li data-id="content-03" class="speciality-process__tab--item">알루미늄페이스트</li>
            </ul>
        </div>
        <div class="content-01 speciality-process__tab-content on">
            test1
        </div>
        <div class="content-02 speciality-process__tab-content">
            test2
        </div>
        <div class="content-03 speciality-process__tab-content">
            test3
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
@endsection
