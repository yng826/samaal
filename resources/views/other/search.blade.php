@extends('layouts.default')

@section('contents')
    <main class="contents-wrap">
        <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            통합검색
            </h2>
        </div>
        <div class="contents-wrap__section">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <button type="button" id="search-btn">검색</button>
        </div>
        <div class="contents-wrap__section">
            "{{ $keyword }}"에 대해 <br/> 총 {{ count($categoryKeywords) }}건의 검색결과가 있습니다.
        </div>
        <div class="contents-wrap__section">
            <button type="button" id="category-0">전체
                @if (count($categoryKeywords) > 0)
                    {{ count($categoryKeywords) }}
                @endif
            </button>
            @foreach ($categorys as $category)
                @php
                    $array =  "";
                @endphp
                @if (isset(array_count_values(array_column($categoryKeywords, 'category_id'))[$category->id]))
                    @php
                        $array =  array_count_values(array_column($categoryKeywords, 'category_id'))[$category->id];
                    @endphp
                @endif
                <button type="button" id="category-{{ $category->id }}">{{ $category->category }} {{ $array }}</button>
            @endforeach
        </div>
        <div class="contents-wrap__section">
            @foreach ($keywords as $keyword)
                @if ($loop->first || $keyword->id != $keywords[$loop->index - 1]->id)
                    @if (!$loop->first)
                        </div>
                        <hr/>
                    @endif

                    <div>
                        <div>
                            <b>{{ $keyword->name }} {{ array_count_values(array_column($keywords, 'id'))[$keyword->id] }}</b>
                        </div>
                @endif

                <div>
                    {{ $keyword->keyword }}
                </div>

                @if ($loop->last || $keyword->id != $keywords[$loop->index + 1]->id)
                    <div>
                        <a href="{{ $keyword->url }}">{{ $keyword->names }}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
