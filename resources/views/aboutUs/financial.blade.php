<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }} - @yield('title')</title>
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
                   financial
                </h2>
            </div>
            <nav class="" style="text-align: center;">
                <ul >
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;" >
                        <a href="/about-us/ir/financial/consolidated">연결재무제표</a></li>
                    </li>
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">
                        <a href="/about-us/ir/financial/separate">별도재무제표</a></li>
                    </li>
                </ul>
            </nav>
            <div class="contents-wrap__section" style="text-align: center;">
                <div class="chart" style="width: 400px;display: inline-block;">
                    <h3 style="text-align: center;">매출액</h3>
                    <div style="width:400px; height:200px">
                        <canvas id="sales"></canvas>
                    </div>
                </div>
                <div class="chart" style="width: 400px;display: inline-block;">
                    <h3 style="text-align: center;">영업이익</h3>
                    <div style="width:400px; height:200px">
                        <canvas id="operating_income"></canvas>
                    </div>
                </div>
                <div class="chart" style="width: 400px;display: inline-block;">
                    <h3 style="text-align: center;">당기순이익</h3>
                    <div style="width:400px; height:200px">
                        <canvas id="net_income"></canvas>
                    </div>
                </div>
                <div class="chart" style="width: 400px;display: inline-block;">
                    <h3 style="text-align: center;">자산</h3>
                    <div style="width:400px; height:200px">
                        <canvas id="assets"></canvas>
                    </div>
                </div>
                <div class="chart" style="width: 400px;display: inline-block;">
                    <h3 style="text-align: center;">부채</h3>
                    <div style="width:400px; height:200px">
                        <canvas id="liability"></canvas>
                    </div>
                </div>
                <div class="chart" style="width: 400px;display: inline-block;">
                    <h3 style="text-align: center;">자본</h3>
                    <div style="width:400px; height:200px">
                        <canvas id="capital"></canvas>
                    </div>
                </div>
            </div>
            <div class="contents-wrap__section">
                <h3 style="text-align: center;">재무정보 3개년 요약</h3>
                <table class="table">
                    <tr>
                        <th></th>
                        @foreach ($info_year as $year)
                            <th class="text-center">{{ $year }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th>매출액</th>
                        @foreach ($sales as $sales_text)
                            <td class="text-center">{{ $sales_text }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>영업이익</th>
                        @foreach ($operating_income as $operating_income_text)
                            <td class="text-center">{{ $operating_income_text }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>당기순이익</th>
                        @foreach ($net_income as $net_income_text)
                            <td class="text-center">{{ $net_income_text }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>자산</th>
                        @foreach ($assets as $assets_text)
                            <td class="text-center">{{ $assets_text }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>부채</th>
                        @foreach ($liability as $liability_text)
                            <td class="text-center">{{ $liability_text }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>자본총계</th>
                        @foreach ($capital as $capital_text)
                            <td class="text-center">{{ $capital_text }}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
<financial-component ></financial-component>
            <div class="contents-wrap__section">
                <h3 style="text-align: center;">전자공고</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ir_boards as $ir_board)
                        <tr>
                            <td class="text-center">{{ $ir_board->id }}</td>
                            <td class="text-center" v-on:click.prevent="ir_board({{ $ir_board->id }})"> {{ $ir_board->title }}</a></td>
                            <td class="text-center">{{ $ir_board->updated_at ?? $ir_board->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="" style="text-align: center;">
                <button type="button" onclick="location.href='#' " style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">DART 바로가기</button>
            </div>
        </main>

        @include('shared.footer')

        <script>
            var info_year = @json($info_year);
            var sales = @json($sales);
            var operating_income = @json($operating_income);
            var net_income = @json($net_income);
            var assets = @json($assets);
            var liability = @json($liability);
            var capital = @json($capital);
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
        <script src="{{ mix('/js/financial.js') }}"></script>
    </body>
</html>
