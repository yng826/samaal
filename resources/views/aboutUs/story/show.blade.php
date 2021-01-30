
@php
    $bodyClass = 'about';
    $meta_title = $news->title ? '삼아알미늄 | '.$news->title : '';
    $meta_desc = $news->title ?? '';
@endphp

@extends('layouts.default')

@section('contents')
<main class="about-storyNews contents-wrap">
    <div class="contents-wrap__title about-storyNews__title">
        <h2>Story &amp; News</h2>
    </div>
    <div class="storyNews-detail__contents">
        <div class="storyNews-detail__section">
            <div class="storyNews-detail__title">
                <h3>{{ $news->title }}</h3>
            </div>
            <div class="storyNews-detail__box">
                <div class="storyNews-detail__date">
                    <time>{{ $news->updated_at ?? $news->created_at}}</time>
                    <span>삼아</span>
                </div>
                <!--밑에 backgorund 이미지는 예시 입니다.-->
                <div class="storyNews-detail__img">
                    <img src="/kor/storage/{{ $news->img_file_path }}" alt="{{ $news->title }}">
                </div>
                <div class="storyNews-detail__text">
                    <p>
                        {!! $news->contents !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
