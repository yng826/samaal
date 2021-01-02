@extends('layouts.default')

@section('contents')
    <main class="contents-wrap sitemap">
        <div class="contents-wrap__title sitemap__title">
            <h2>
                Sitemap
            </h2>
        </div>
        <div class="sitemap__section">

            <ul>
            @foreach ($sitemaps as $sitemap)
                <li class="depth-01">
                    @if (strlen($sitemap->url) > 2)
                    <div class="sitemap__section--list depth-name"><a href="{{ $sitemap->url }}">{{ $sitemap->name }}</a></div>
                    @else
                    <div class="sitemap__section--list depth-name">{{ $sitemap->name }}</div>
                    @endif
                    <div class="container sitemap__section--list">
                        <div class="sitemap__block--left">
                            @for ($i = 0; $i < $depth2Cnt; $i++)
                                @if (isset($sitemap->children[$i]) && $sitemap->children[$i]->is_right != 1)
                                    <div class="sitemap__section--list--item">
                                        @if (strlen($sitemap->children[$i]->url) > 2)
                                            <a href="{{ $sitemap->children[$i]->url }}"><b class="depth-02">{{ $sitemap->children[$i]->name }}</b></a>
                                        @elseif ($sitemap->children[$i]->name == '통합 문의')
                                            <a class="question-btn" href="javascript:;"><b class="depth-02">{{ $sitemap->children[$i]->name }}</b></a>
                                        @else
                                            <b class="depth-02">{{ $sitemap->children[$i]->name }}</b>
                                        @endif

                                        <ul>
                                        @if (isset($sitemap->children[$i]->children))
                                            @foreach ($sitemap->children[$i]->children as $depth3)
                                                <li><a href="{{ $depth3->url }}">{!! str_replace(' > ', '<br/>', $depth3->name) !!}</a></li>
                                            @endforeach
                                        @endif
                                        </ul>
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <div class="sitemap__block--right">
                            @for ($i = 0; $i < $depth2Cnt; $i++)
                                @if (isset($sitemap->children[$i]) && $sitemap->children[$i]->is_right == 1)
                                    <div class="sitemap__section--list--item">
                                        @if (strlen($sitemap->children[$i]->url) > 2)
                                            <a href="{{ $sitemap->children[$i]->url }}"><b class="depth-02">{{ $sitemap->children[$i]->name }}</b></a>
                                        @elseif ($sitemap->children[$i]->name == '통합 문의')
                                            <a class="question-btn" href="javascript:;"><b class="depth-02">{{ $sitemap->children[$i]->name }}</b></a>
                                        @else
                                            <b class="depth-02">{{ $sitemap->children[$i]->name }}</b>
                                        @endif

                                        <ul>
                                        @if (isset($sitemap->children[$i]->children))
                                            @foreach ($sitemap->children[$i]->children as $depth3)
                                                <li><a href="{{ $depth3->url }}">{!! str_replace(' > ', '<br/>', $depth3->name) !!}</a></li>
                                            @endforeach
                                        @endif
                                        </ul>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </main>
@endsection
