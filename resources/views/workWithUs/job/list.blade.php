@extends('layouts.workWithUs')

@section('title', '지원내역')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원내역 확인 및 수정</h2>
        </div>
        <div class="contents-wrap__section {{$pageClass}}__contents">
            <applicant-list-component></applicant-list-component>
            <login-component is_check_auth="true"></login-component>
            <find-password-component></find-password-component>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="/kor/js/job.js"></script>
@endsection
