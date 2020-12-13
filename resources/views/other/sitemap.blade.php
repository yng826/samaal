@extends('layouts.default')

@section('contents')
    <main class="contents-wrap">
        <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            사이트맵
        </h2>
        </div>
        <div class="contents-wrap__section">
            <table>
            @foreach ($sitemaps as $sitemap)
                <tr>
                    <td>
                        @if (strlen($sitemap->url) > 2)
                            <a href="{{ $sitemap->url }}">{{ $sitemap->name }}</a>
                        @else
                            {{ $sitemap->name }}
                        @endif
                    </td>
                    @for ($i = 0; $i < $depth2Cnt; $i++)
                        <td>
                        @if (isset($sitemap->children[$i]))
                            @if (strlen($sitemap->children[$i]->url) > 2)
                                <a href="{{ $sitemap->children[$i]->url }}"><b>{{ $sitemap->children[$i]->name }}</b></a>
                            @else
                                <b>{{ $sitemap->children[$i]->name }}</b>
                            @endif

                            <ul>
                            @if (isset($sitemap->children[$i]->children))
                                @foreach ($sitemap->children[$i]->children as $depth3)
                                    <li><a href="{{ $depth3->url }}">{!! str_replace(' > ', '<br/>', $depth3->name) !!}</a></li>
                                @endforeach
                            @endif
                            </ul>
                        @endif
                        </td>
                    @endfor
                </tr>
            @endforeach
            </table>
        </div>
    </main>
@endsection
