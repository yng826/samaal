@extends('layouts.default')

@section('contents')
    <main class="contents-wrap">
        <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            통합검색
            </h2>
        </div>
        <div class="contents-wrap__section">
            <input type="text" name="keyword">
            <button><i class="fas fa-fw fa-search"></i></button>
        </div>
        <div class="contents-wrap__section">
            <a href="/other/search/0">전체</button>
            @foreach ($menus as $menu)
            <a href="/other/search/{{ $menu->id }}">{{ $menu->name }}</button>
            @endforeach
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
