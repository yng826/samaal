@extends('layouts.default')

@section('contents')
    <main class="work-recruit contents-wrap">
        <div class="work-recruit__title contents-wrap__title">
            <h2>
                채용공고
                <p>
                    Responding to the challenge to become the best of the best<br>
                    Trusted as the partner of world-class expertise<br>
                    Committed with Enthusiasm and Excitement
                </p>
            </h2>
        </div>
        <div class="work-recruit__contents">
            <form action="/eng/work-with-us/recruit" method="get">
                <div class="work-recruit__search">
                    <div class="work-recruit__search--wrap">
                        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="키워드 검색"/>
                        <button type="submit" class="btn-search">검색</button>
                    </div>
                    <p class="work-recruit__search--text">총 <em>{{ count($recruits) }}</em>건의 채용공고가 진행 중입니다.</p>
                </div>
            </form>
            <div class="work-recruit__list-wrap">
                <div class="work-recruit__list">
                    <ul>
                        @foreach ($recruits as $item)
                        <li class="work-recruit__list--item">
                            <div class="comer-box">
                                <span class="{{$item->career =='new' ? 'on': ''}}">신입</span>
                                <span class="{{$item->career =='career' ? 'on': ''}}">영업</span>
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
                                <a href="/eng/work-with-us/recruit/{{ $item->id }}">자세히보기</a>
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
