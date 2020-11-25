@extends('layouts.admin')


@section('content')
<h1>재무정보</h1>
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <tr>
                <th class="text-center" rowspan="2">연도</th>
                <th class="text-center" colspan="5">연결 재무제표</th>
                <th class="text-center" colspan="5">별도 재무제표</th>
                <th class="text-center" rowspan="2">등록일</th>
                <th class="text-center" rowspan="2" colspan="2">관리</th>
            </tr>
            <tr>
                <th class="text-center">매출액</th>
                <th class="text-center">영업이익</th>
                <th class="text-center">당기순이익</th>
                <th class="text-center">자산</th>
                <th class="text-center">부채</th>
                <th class="text-center">매출액</th>
                <th class="text-center">영업이익</th>
                <th class="text-center">당기순이익</th>
                <th class="text-center">자산</th>
                <th class="text-center">부채</th>
            </tr>
            @foreach ($infos as $info)
            <tr>
                <td class="text-center">{{ $info->info_year }}</td>
                <td class="text-center">{{ $info->connect_sales }}</td>
                <td class="text-center">{{ $info->connect_operating_income }}</td>
                <td class="text-center">{{ $info->connect_net_income }}</td>
                <td class="text-center">{{ $info->connect_assets }}</td>
                <td class="text-center">{{ $info->connect_liability }}</td>
                <td class="text-center">{{ $info->separate_sales }}</td>
                <td class="text-center">{{ $info->separate_operating_income }}</td>
                <td class="text-center">{{ $info->separate_net_income }}</td>
                <td class="text-center">{{ $info->separate_assets }}</td>
                <td class="text-center">{{ $info->separate_liability }}</td>
                <td class="text-center">{{ $info->updated_at ?? $info->created_at}}</td>
                <td class="text-center"><a class="btn btn-outline-info btn-xs" href="/admin/finance_info/{{$info->info_year}}/edit">수정</button></td>
            </tr>
            @endforeach
        </table>
        <div class="col-md-12 text-right">
            <a class="btn btn-primary text-white" href="/admin/finance_info/create">최신년도 추가</a>
        </div>
    </div>
</div>
@endsection
