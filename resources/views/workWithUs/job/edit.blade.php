@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원하기</h2>
        </div>
        <div class="{{$pageClass}}__contents">
            <progress-component init_step="2"></progress-component>
            <individual-info-component job_id={{$id}}></individual-info-component>
            <education-component job_id={{$id}}></education-component>
            <career-component job_id={{$id}}></career-component>
            <military-component job_id={{$id}}></military-component>
            <oa-component job_id={{$id}}></oa-component>
            <language-component job_id={{$id}}></language-component>
            <award-component job_id={{$id}}></award-component>
            <certificate-component job_id={{$id}}></certificate-component>
            <overseas-component job_id={{$id}}></overseas-component>
            <self-introduction-component job_id={{$id}}></self-introduction-component>
            <applycant-review-component></applycant-review-component>
            <job-button-groups-component></job-button-groups-component>
            <login-component></login-component>
        </div>
        <div class="top-btn">TOP</div>
    </main>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/job.js') }}" defer></script>
@endsection
