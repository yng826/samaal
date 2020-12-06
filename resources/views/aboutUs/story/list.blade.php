
@php
$bodyClass = 'about';
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
                        <a href="/about-us/story-news/{{$info->id}}" class="news-btn" id="news-btn-{{ $info->id }}">
                        <input type="hidden"  value="{{ $info->id }}">
                        <figure style="background-image:url(http://placeimg.com/640/480/animals);">
                            {{-- <img src="/storage/{{ $info->img_file_path }}" alt=""> --}}
                        </figure>
                        <div class="about-storyNews__list-item--text">
                            <h3>{{ $info->title }}</h3>
                            <div>{!! $info->contents !!}</div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="pagination">
            <a href="/about-us/story-news?page=1" class="pagination__button-prev"></a>
            @for($i=1; $i<$cnt+1; $i++)
                <a href="/about-us/story-news?page={{ $i }}" class="pagination__number">{{ $i }}</a>
            @endfor
            <a href="/about-us/story-news?page={{ $cnt }}" class="pagination__button-next"></a>
        </div>
        <div class="about-storyNews__top-btn">TOP</div>
    </div>

    <!-- 상세보기 -->
    <div class="storyNews-pop layer-popup">
        <button class="storyNews-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <figure>
                            <img src="#" alt="" width="508" height="298" name="id">
                        </figure>
                    </div>
                    <div class="form-group">
                        <label for="">제목</label>
                        <div class="form-control" name="title" style="width:350px; height: 20px; border: 1px solid #313131;"></div>
                    </div>
                    <div class="form-group">
                        <label for="">내용</label><br>
                        {{-- <input type="text" class="form-control" name="contents" value="" disabled> --}}
                        <div class="form-control" name="contents" style="overflow-x:auto; width:350px; height:200px; border: 1px solid #313131;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-marsk"></div>
</div>

</main>
@endsection

{{-- <script src="{{ mix('/js/manifest.js')}}"></script>
<script src="{{ mix('/js/vendor.js')}}"></script> --}}
