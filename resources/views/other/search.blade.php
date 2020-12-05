<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
    </head>
    <body id="app" class="about-ir">
        <!-- {{-- @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div> --}} -->
        @include('shared.header')

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


        @include('shared.footer')
    </body>
</html>
