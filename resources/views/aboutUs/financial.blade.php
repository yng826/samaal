<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:image" content="{{APP_URL }}/public/img_sns_sama.png" />
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
                   재무정보
                </h2>
            </div>
            <div  class="about-ir-list__section">
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

                <div class="contents-wrap__section">
                    <div class="about-ir__chart">
                        <h3>매출액</h3>
                        <h6>(단위: 백만원)</h6>
                        <div>
                            <canvas id="sales"></canvas>
                        </div>
                    </div>
                    <div class="about-ir__chart">
                        <h3>영업이익</h3>
                        <h6>(단위: 백만원)</h6>
                        <div>
                            <canvas id="operating_income"></canvas>
                        </div>
                    </div>
                    <div class="about-ir__chart">
                        <h3>당기순이익</h3>
                        <h6>(단위: 백만원)</h6>
                        <div>
                            <canvas id="net_income"></canvas>
                        </div>
                    </div>
                    <div class="about-ir__chart">
                        <h3>자산</h3>
                        <h6>(단위: 백만원)</h6>
                        <div>
                            <canvas id="assets"></canvas>
                        </div>
                    </div>
                    <div class="about-ir__chart">
                        <h3>부채</h3>
                        <h6>(단위: 백만원)</h6>
                        <div>
                            <canvas id="liability"></canvas>
                        </div>
                    </div>
                    <div class="about-ir__chart">
                        <h3>자본</h3>
                        <h6>(단위: 백만원)</h6>
                        <div>
                            <canvas id="capital"></canvas>
                        </div>
                    </div>
                </div>
                <div class="contents-wrap__section about-ir__table">
                    <h3>재무정보 3개년 요약</h3>
                    <table class="table">
                        <tr class="text-center">
                            <th></th>
                            @foreach ($info_year as $year)
                                <th class="text-center">{{ $year }}</th>
                            @endforeach
                        </tr>
                        <tr>
                            <td>매출액</td>
                            @foreach ($sales as $sales_text)
                                <td class="text-center">{{ number_format($sales_text) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>영업이익</td>
                            @foreach ($operating_income as $operating_income_text)
                                <td class="text-center">{{ number_format($operating_income_text) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>당기순이익</td>
                            @foreach ($net_income as $net_income_text)
                                <td class="text-center">{{ number_format($net_income_text) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>자산</td>
                            @foreach ($assets as $assets_text)
                                <td class="text-center">{{ number_format($assets_text) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>부채</td>
                            @foreach ($liability as $liability_text)
                                <td class="text-center">{{ number_format($liability_text) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>자본총계</td>
                            @foreach ($capital as $capital_text)
                                <td class="text-center">{{ number_format($capital_text) }}</td>
                            @endforeach
                        </tr>
                    </table>
                </div>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
        <script src="{{ mix('/js/financial.js') }}"></script>
    </body>
</html>

