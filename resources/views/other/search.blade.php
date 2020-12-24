@extends('layouts.default')

@section('contents')
    <main class="search-wrap">
        <div class="contents-wrap__title pd-20">
            <h2 class="about-ir__title">
                통합검색
            </h2>
        </div>
        <div class="work-recruit__contents search-wrap__box">
            <div class="work-recruit__search">
                <form action="/other/search" method="get">
                    <div class="work-recruit__search--wrap">
                        <input type="text" name="keyword" value="{{ $keyword }}" class="search_keyword">
                        <button type="button" id="search-btn" class="btn-search">검색</button>
                        <p class="work-recruit__search--text search-wrap__search-text">

                            @if (count($categoryKeywords) > 0)
                            <span>"{{ $keyword }}"</span>에 대해 <br/> 총 {{ count($categoryKeywords) }}건의 검색결과가 있습니다.
                            @else
                                @if ( !empty($keyword))
                                    검색결과가 없습니다.
                                @endif
                            @endif
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="search-wrap__section">
            <div class="search-wrap__content">
                <div class="search-wrap__content--tab">
                    <ul>
                        <li class="tab-item {{ $categoryId==0 ? 'on' : ''}}" id="category-0">
                            <span>
                                전체
                                @if (count($categoryKeywords) > 0)
                                    {{ count($categoryKeywords) }}
                                @endif
                            </span>
                        </li>
                        @foreach ($categorys as $category)
                            @php
                                $array =  "";
                            @endphp
                            @if (isset(array_count_values(array_column($categoryKeywords, 'category_id'))[$category->id]))
                                @php
                                    $array =  array_count_values(array_column($categoryKeywords, 'category_id'))[$category->id];
                                @endphp
                            @endif
                            <li class="tab-item {{ $categoryId==$category->id ? 'on' : ''}}" id="category-{{ $category->id }}"><span>{{ $category->category }} {{ $array }}</span></li>
                        @endforeach
                    </ul>
                </div>
                @foreach ($keywords as $keyword)
                    @if ($loop->first || $keyword->id != $keywords[$loop->index - 1]->id)
                        <div class="search-wrap__list-item">
                            <div class="search-wrap__list-item--title">
                                {{ $keyword->name }} <span>{{ array_count_values(array_column($keywords, 'id'))[$keyword->id] }}</span>
                            </div>
                            <div class="search-wrap__list-item--text">
                                <a href="{{ $keyword->url }}">
                    @endif

                                    <p>
                                        <span>{{ $keyword->keyword }}</span>
                                    </p>

                    @if ($loop->last || $keyword->id != $keywords[$loop->index + 1]->id)
                                    <p class="position">
                                        {{ $keyword->names }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
