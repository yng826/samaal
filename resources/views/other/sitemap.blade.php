@extends('layouts.default')

@section('contents')
    <main class="contents-wrap sitemap">
        <div class="contents-wrap__title sitemap__title">
            <h2>
                사이트맵
            </h2>
        </div>
        <div class="contents-wrap__section sitemap__section">

            <ul>
            @foreach ($sitemaps as $sitemap)
                <li class="depth-01">
                    @if (strlen($sitemap->url) > 2)
                        <a href="{{ $sitemap->url }}">{{ $sitemap->name }}</a>
                    @else
                        {{ $sitemap->name }}
                    @endif
                    <div class="container container-left">
                    @for ($i = 0; $i < $depth2Cnt; $i++)
                        @if (isset($sitemap->children[$i]))
                            @if (strlen($sitemap->children[$i]->url) > 2)
                                <a href="{{ $sitemap->children[$i]->url }}"><b class="depth-02">{{ $sitemap->children[$i]->name }}</b></a>
                            @else
                                <b class="depth-02">{{ $sitemap->children[$i]->name }}</b>
                            @endif

                            <ul>
                            @if (isset($sitemap->children[$i]->children))
                                @foreach ($sitemap->children[$i]->children as $depth3)
                                    <li>&#183;<a href="{{ $depth3->url }}">{!! str_replace(' > ', '<br/>', $depth3->name) !!}</a></li>
                                @endforeach
                            @endif
                            </ul>
                        @endif
                    @endfor
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </main>
@endsection
