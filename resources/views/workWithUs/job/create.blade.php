@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원하기</h2>
        </div>
        <div class="{{$pageClass}}__contents">
            <progress-component></progress-component>
            <individual-info-component recruit_id="{{$recruit_id}}" mode="create"></individual-info-component>
            <login-component recruit_id="{{$recruit_id}}"></login-component>
            {{-- <join-component recruit_id="{{$recruit_id}}"></join-component> --}}
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="/kor/js/job.js" defer></script>
@endsection
