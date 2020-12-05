@extends('layouts.workWithUs')

@section('title', '지원내역')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원내역 확인 및 수정</h2>
        </div>
        <div class="contents-wrap__section {{$pageClass}}__contents">
            <applicant-list-component></applicant-list-component>
            <login-component action="/api/login"></login-component>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="{{ asset('/js/job.js') }}"></script>
@endsection
