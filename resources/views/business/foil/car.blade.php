@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 제품 | LIB 양극집전체용 자동차용';
    $meta_desc = 'LIB 양극집전체용 자동차용';
@endphp

@extends('layouts.business')

@section('detail__title')
    LIB 양극집전체용
    <em>자동차용</em>
    <p>
        얇은 두께에서도 고강도 유지가 가능하여<br>
        고용량, 고효율 배터리 개발을 가능하게 함
    </p>
@endsection

@section('swiper-container')
@foreach ([1,2,3,4,5] as $i)
    @if( $business['img_file_'.$i.'_path'] )
    <div class="swiper-slide">
        <div class="slide-img" style="background-image:url(/kor/storage/{{$business['img_file_'.$i.'_path']}});"></div>
    </div>
    @endif
@endforeach
@endsection

@section('info__title')
    <span>한번 충전하면 서울에서 부산까지</span> 갈 수 있는<br>
    전기 자동차가 나왔으면 좋겠어요!
@endsection

@section('info__text')
고용량, 고효율 전기자동차 개발을 목표로<br>
고강도를 유지하는 양극집전체를 2009년 국내 최초로 개발했습니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>자동차뿐만 아니라 ESS, 소형전지 등<br>
        전 분야에 걸쳐 적용 가능합니다</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none">제품 사양</th>
            <th rowspan="2" class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--title">
            <th class="border-left-none">두께</th>
            <th>재질</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">12㎛ ~ 20㎛</td>
            <td>
                A1050, A1100,
                A1235, 기타
            </td>
            <td class="border-right-none">
                전기자동차,ESS용 배터리
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
