@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main id="app" class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원정보 확인 및 수정</h2>
        </div>
        <div class="contents-wrap__section {{$pageClass}}__contents">
            <individual-info-component job_id={{$id}}></individual-info-component>
            <education-component job_id={{$id}}></education-component>
            <career-component job_id={{$id}}></career-component>
            <military-component job_id={{$id}}></military-component>
            <oa-component job_id={{$id}}></oa-component>
            <language-component job_id={{$id}}></language-component>
            <award-component job_id={{$id}}></award-component>
            <certificate-component job_id={{$id}}></certificate-component>
            <overseas-component job_id={{$id}}></overseas-component>
        </div>
    </main>
@endsection

<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/job.js') }}"></script>
