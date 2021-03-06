@php
    $bodyClass = 'about-ir';
    $meta_title = '삼아알미늄 | 재무정보 | ';
    switch ($id) {
        case 'consolidated':
            $meta_title .= '연결재무제표';
            $meta_desc = '연결재무제표';
            break;
        case 'separate':
            $meta_title .= '별도재무제표';
            $meta_desc = '별도재무제표';
            break;
        case 'board':
            $meta_title .= '전자공고';
            $meta_desc = '전자공고';
            break;
        default:
            $meta_title .= '재무제표';
            $meta_desc = '재무제표';
            break;
    }
@endphp

@extends('layouts.default')

@section('contents')
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
                    <a href="/kor/about-us/ir/consolidated">연결재무제표</a>
                </li>
                <li class="tab-item {{$id =='separate' ? 'on': ''}}">
                    <a href="/kor/about-us/ir/separate">별도재무제표</a></li>
                </li>
                <li class="tab-item {{$id =='board' ? 'on': ''}}">
                    <a href="/kor/about-us/ir/board">전자공고</a></li>
                </li>
            </ul>
        </div>

        <div class="contents-wrap__section">
            <div class="about-ir__chart">
                <h3>매출액</h3>
                <h6>(단위: 백만원)</h6>
                <div>
                    <canvas id="sales"  height="264"></canvas>
                </div>
            </div>
            <div class="about-ir__chart">
                <h3>영업이익</h3>
                <h6>(단위: 백만원)</h6>
                <div>
                    <canvas id="operating_income"  height="264"></canvas>
                </div>
            </div>
            <div class="about-ir__chart">
                <h3>당기순이익</h3>
                <h6>(단위: 백만원)</h6>
                <div>
                    <canvas id="net_income"  height="264"></canvas>
                </div>
            </div>
            <div class="about-ir__chart">
                <h3>자산</h3>
                <h6>(단위: 백만원)</h6>
                <div>
                    <canvas id="assets"  height="264"></canvas>
                </div>
            </div>
            <div class="about-ir__chart">
                <h3>부채</h3>
                <h6>(단위: 백만원)</h6>
                <div>
                    <canvas id="liability"  height="264"></canvas>
                </div>
            </div>
            <div class="about-ir__chart">
                <h3>자본</h3>
                <h6>(단위: 백만원)</h6>
                <div>
                    <canvas id="total"  height="264"></canvas>
                </div>
            </div>
        </div>
        <div class="contents-wrap__section about-ir__table">
            <h3>재무정보 3개년 요약</h3>
            <table class="table">
                <tr class="text-center">
                    <th></th>
                    @foreach ($irs as $key => $item)
                        @if ($item->info_quarter)
                        <th class="text-center">{{ $item->info_year }}<div class="mt-5">{{$item->info_quarter}}</div></th>
                        @else
                        <th class="text-center">{{ $item->info_year }}</th>
                        @endif
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
                    @foreach ($total as $total_text)
                        <td class="text-center">{{ number_format($total_text) }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</main>

@endsection

@section('script')
    <script>
        var info_year = @json($info_year);
        var labels = @json($labels);
        var sales = @json($sales);
        var operating_income = @json($operating_income);
        var net_income = @json($net_income);
        var assets = @json($assets);
        var liability = @json($liability);
        var total = @json($total);
    </script>
    @parent
    {{-- <script src="/kor/js/question.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="/kor/js/financial.js"></script>
@endsection
