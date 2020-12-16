<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
        <style>
            .ir-board-file-box .btn-download {
                width: 28px;
                height: 30px;
                background: url(/images/btn-download.png?23c52029c7f4d35977f2ea3e29e12af5) no-repeat;
              }
        </style>
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
                   재무정보
                </h2>
            </div>
            <div class="ir-wrap--tab">
                <ul>
                    <li class="tab-item {{$id =='consolidated' ? 'on': ''}}">
                        <a href="/about-us/ir/consolidated">연결재무제표</a>
                    </li>
                    <li class="tab-item {{$id =='separate' ? 'on': ''}}">
                        <a href="/about-us/ir/separate">별도재무제표</a></li>
                    </li>
                    <li class="tab-item {{$id =='board' ? 'on': ''}}">
                        <a href="/about-us/ir/board">전자공고</a></li>
                    </li>
                </ul>
            </div>
            <div class="contents-wrap__section" id="ir_board_info">
                <div class="info">
                    <h1>{{ $ir_board->title }}</h1>
                    <p class="name">{{ $ir_board->updated_at ?? $ir_board->created_at}} &nbsp; 삼아</p>
                    <br />
                    <div class="ir-board-file-box">
                        <a href="/about-us/ir/board/file-download?id={{ $ir_board->id }}" class="btn-download"></a>
                        <a href="/about-us/ir/board/file-download?id={{ $ir_board->id }}"><span>&nbsp; {{ $ir_board->pdf_file_name}}</span></a>
                    </div>
                    <br />
                    <br />
                    <div class="ir-board-contents">
                        {!! $ir_board->contents !!}
                    </div>
                </div>
                <div class="img">
                    <a href="/storage/{{ $ir_board->img_file_path }}" title="{{ $ir_board->img_file_name }}" class="ir-img"><img src="/storage/{{ $ir_board->img_file_path }}" width="100%" alt="{{ $ir_board->img_file_name }}"/></a>
                </div>
            </div>
        </main>

        @include('shared.footer')
        <script src="{{ asset('/js/manifest.js') }}"></script>
        <script src="{{ asset('/js/vendor.js') }}"></script>
        <script src="{{ asset('/js/irBoard.js') }}"></script>

    </body>
</html>

s
