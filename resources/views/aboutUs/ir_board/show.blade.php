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
                   financial
                </h2>
            </div>
            <nav class="" style="text-align: center;">
                <ul >
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;" >
                        <a href="/about-us/ir/consolidated">연결재무제표</a></li>
                    </li>
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">
                        <a href="/about-us/ir/separate">별도재무제표</a></li>
                    </li>
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">
                        <a href="/about-us/ir/board/list">전자공고</a></li>
                    </li>
                </ul>
            </nav>
            <div class="contents-wrap__section" style="text-align: center;">
                <div class="info" style="width: 40%;display: inline-block;vertical-align: top;margin: 10px;">
                    <h1 style="width:100%; text-align: left;font-size: 200%;">{{ $ir_board->title }}</h1>
                    <p style="width:100%; text-align: left;font-size: 70%;">{{ $ir_board->updated_at ?? $ir_board->created_at}} &nbsp; 삼아</p>
                    <br />
                    <div class="ir-board-file-box" style="width: 100%;display: inline-table;text-align: left;">
                        <a href="/admin/ir_board/file-download?id={{ $ir_board->id }}&type=pdf" class="btn-download" style="text-align: left;display: inline-block;"></a>
                        <span style="text-align: left;font-size: 100%;color: #1d3669;">&nbsp; {{ $ir_board->pdf_file_name}}</span>
                    </div>
                    <br />
                    <br />
                    <div style="width:100%;">
                        {!! $ir_board->contents !!}
                    </div>
                </div>
                <div class="img" style="display: inline-table;vertical-align: top;margin: 10px; width: 40%;">
                    <a href="/storage/{{ $ir_board->img_file_path }}" title="{{ $ir_board->img_file_name }}"><img src="/storage/{{ $ir_board->img_file_path }}" width="100%" alt="{{ $ir_board->img_file_name }}"/></a>
                </div>
            </div>

            <div class="" style="text-align: center;">
                <a href="/about-us/ir/board/list" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">목록</a>
            </div>
        </main>

        @include('shared.footer')

        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>

    </body>
</html>

s
