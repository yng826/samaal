@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원하기</h2>
        </div>
        <div class="{{$pageClass}}__contents">
            <progress-component init_step="2"></progress-component>
            <individual-info-component recruit_id="{{$recruit_id}}" mode="edit"></individual-info-component>
            <education-component></education-component>
            <career-component></career-component>
            <military-component></military-component>
            <oa-component></oa-component>
            <language-component></language-component>
            <award-component></award-component>
            <certificate-component></certificate-component>
            <overseas-component></overseas-component>
            <hobby-specialty-component></hobby-specialty-component>
            <school-activity-component></school-activity-component>
            <self-introduction-component></self-introduction-component>
            <applycant-review-component></applycant-review-component>
            <job-button-groups-component mode="edit"></job-button-groups-component>
            <login-component></login-component>
            <find-password-component></find-password-component>
        </div>
    </main>
@endsection

@section('popup-container')
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/job.js" defer></script>
@endsection
