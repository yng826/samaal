
@php
    $bodyClass = 'about';
    $meta_title = '삼아알미늄 | 스토리 & 뉴스';
    $meta_desc = '스토리 & 뉴스';
@endphp

@extends('layouts.default')

@section('contents')
<main class="about-storyNews contents-wrap">
    <div class="contents-wrap__title about-storyNews__title">
        <h2>Story &amp; News</h2>
    </div>
    <div class="about-storyNews__contents">
        <div class="about-storyNews__list">
            <ul>
                @foreach ($infos as $info)
                <li class="about-storyNews__list-item">
                        <a href="/kor/about-us/story-news/{{$info->id}}" class="news-btn" id="news-btn-{{ $info->id }}">
                        <input type="hidden"  value="{{ $info->id }}">
                        <figure style="{{ 'background-image:url(/kor/storage/'.$info->img_file_path.')' }}">
                            {{-- <img src="/kor/storage/{{ $info->img_file_path }}" alt=""> --}}
                        </figure>
                        <div class="about-storyNews__list-item--text">
                            <h3>{{ $info->title }}</h3>
                            <p>{!! strip_tags($info->contents) !!}</p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        {{ $infos->withQueryString()->links() }}
    </div>
</div>

</main>
@endsection

{{-- <script src="/kor/js/manifest.js"></script>
<script src="/kor/js/vendor.js"></script> --}}
