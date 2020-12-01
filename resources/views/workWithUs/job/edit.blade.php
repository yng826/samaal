@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main id="app" class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원정보 확인 및 수정</h2>
        </div>
        <div class="contents-wrap__section {{$pageClass}}__contents">
            <individual-info-component index={{$id}}></individual-info-component>
            <education-component index={{$id}}></education-component>
            <career-component index={{$id}}></career-component>
        </div>
    </main>
@endsection

<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/job.js') }}"></script>
