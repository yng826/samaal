@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원하기</h2>
        </div>
        <div class="{{$pageClass}}__contents">
            <div class="{{$pageClass}}__progress">
                <ul>
                    <li class="on">인적사항<br>입력</li>
                    <li class="on">이력서 작성</li>
                    <li>자기소개서<br>작성</li>
                    <li>제출하기</li>
                </ul>
            </div>
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

@section('script')
    @parent
    <script src="{{ asset('js/job.js') }}" defer></script>
@endsection
