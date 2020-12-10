@extends('layouts.default')

@section('contents')
    <main class="work-recruit contents-wrap">
        <div class="work-recruit__title contents-wrap__title">
            <h2>
                채용공고
                <p>
                    끊임없는 혁신으로 글로벌 시장에 <em>도전하는 삼아人</em><br>
                    최고의 전문성으로 <em>신뢰받는 삼아人</em><br>
                    <em>즐겁게 일하는 삼아人</em>
                </p>
            </h2>
        </div>
        <div class="work-recruit__contents">
            <div class="work-recruit__search">
                <div class="work-recruit__search--wrap">
                    <input type="text" placeholder="키워드 검색"/>
                    <button type="button" class="btn-search">검색</button>
                </div>
                <p class="work-recruit__search--text">총 <em>3</em>건의 채용공고가 진행 중입니다.</p>
            </div>
            <div class="work-recruit__list-wrap">
                <div class="work-recruit__list">
                    <ul>
                        @foreach ($recruits as $item)
                        <li class="work-recruit__list--item">
                            <div class="comer-box">
                                <span class="on">신입</span>
                                <span>영업</span>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <div class="keywords">
                                <ul>
                                    @foreach ($item->keywords as $keyword)
                                    <li>#{{$keyword->keyword}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="date-range">
                                {{ $item->start_date }} ~ {{ $item->end_date }}
                            </div>
                            <div class="btn-link">
                                <a href="#">자세히보기</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>

    {{-- <div class="work-with-us">
        <div>
            @foreach ($recruits as $item)
            <div class="recruit-item">
                <h4>{{ $item->title }}</h4>
                <hr>
                <div class="keywords">
                    <ul>
                        @foreach ($item->keywords as $keyword)
                        <li>#{{$keyword->keyword}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="date-range">
                    {{ $item->start_date }} ~ {{ $item->end_date }}
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
@endsection
