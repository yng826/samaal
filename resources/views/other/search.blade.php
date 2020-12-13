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
                <div class="work-recruit__search--wrap">
                    <input type="text" name="keyword" value="{{ $keyword }}">
                    <button type="button" id="search-btn" class="btn-search">검색</button>
                    <p class="work-recruit__search--text search-wrap__search-text">
                        <span>"{{ $keyword }}"</span>에 대해 <br/> 총 {{ count($categoryKeywords) }}건의 검색결과가 있습니다.
                    </p>
                </div>
            </div>
        </div>
        <div class="search-wrap__section">
            <div class="search-wrap__content">
                <div class="search-wrap__content--tab">
                    <ul>
                        <li class="tab-item on" data-tab="">
                            <span>전체</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>About Us</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>알루미늄 Foil</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>포장재</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>산업 건축용</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>Speciality</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>Innovation</span>
                        </li>
                        <li class="tab-item" data-tab="">
                            <span>Work With Us</span>
                        </li>
                    </ul>
                </div>
                <div class="search-wrap__list-item">
                    <div class="search-wrap__list-item--title">
                        포장재<span>1</span>
                    </div>
                    <div class="search-wrap__list-item--text">
                        <a href="#">
                            <p>
                                전자레인지에 사용하는 <span>레토르트</span> 제품으로 확대 적용하고 있으며 캔 포장 제품을 파우치 제품으로 대체 유도함으로써 이산화탄소
                            </p>
                            <p class="position">
                                For Business Partners &gt; 포장재
                            </p>
                        </a>
                    </div>
                </div>
            </div>

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
