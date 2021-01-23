
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
                        <a href="javascript:;" class="news-btn" id="news-btn-{{ $info->id }}">
                        <input type="hidden"  value="{{ $info->id }}">
                        <figure style="background-image:url(http://placeimg.com/640/480/animals);">
                            {{-- <img src="/kor/storage/{{ $info->img_file_path }}" alt=""> --}}
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
            <a href="/kor/about-us/story-news?page=1" class="pagination__button-prev"></a>
            @for($i=1; $i<$cnt+1; $i++)
                <?php
                    $style='';
                ?>
                @if(!isset($_GET['page']))
                    <?php
                        $_GET['page'] = 1;
                    ?>
                @endif
                 @if ($_GET['page'] == $i)
                    <?php
                    echo $_GET['page']
                        $style='color: blue';
                    ?>
                 @endif
                <a href="/kor/about-us/story-news?page={{ $i }}" class="pagination__number" style="{{ $style }}">{{ $i }}</a>
            @endfor
            <a href="/kor/about-us/story-news?page={{ $cnt }}" class="pagination__button-next"></a>
        </div>
    </div>

    <div class="popup-mask"></div>
</div>

</main>
@endsection

{{-- <script src="/kor/js/manifest.js"></script>
<script src="/kor/js/vendor.js"></script> --}}
