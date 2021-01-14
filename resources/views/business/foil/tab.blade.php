@extends('layouts.business')

@section('detail__title')
    LIB Tab재
    <p>
        다양한 디바이스에 적용 가능한<br>
        리튬 이온 배터리 양극 단자
    </p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_tab.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_tab_hover.jpg);"></div></div>
@endsection

@section('info__title')
    <span>다양한 기기에서 활용</span>할 수 있는<br>
    리튬 이온 배터리 양극 단자를 제작해 주세요!
@endsection

@section('info__text')
    국내 전지 업체의 본격적인 양산 시점에서 개발한<br>
    이차전지의 핵심부품입니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>블루투스, 웨어러블 디바이스와 같이<br>
        소형, 경량화 제품으로 확장 추세를 보이고 있습니다</p>
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
            <td class="border-left-none">80㎛ ~150㎛</td>
            <td>
                A1235
            </td>
            <td class="border-right-none">
                리튬 이온 배터리의
                리드탭
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
