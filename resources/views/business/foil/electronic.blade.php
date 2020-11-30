@extends('layouts.business')

@section('detail__title')
    LIB 양극집전체용
    <em>Foil -전자기기용</em>
    <p>
        고용량 전지의 개발로 배터리 성능을 향상하면서<br>
        전자기기를 더 얇게 제작할 수 있도록 함
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><img src="https://via.placeholder.com/750X420" alt=""></div>
    <div class="swiper-slide"><img src="https://via.placeholder.com/750X420" alt=""></div>
@endsection

@section('info__title')
    휴대폰을 <span>장시간 사용해도
    배터리 용량이 넉넉</span>하면 좋겠어요
@endsection

@section('info__text')
    휴대폰 사용 시간을 늘리기 위한 니즈에 맞추기 위해 2012년 국내 최초로 개발하였습니다.
    고용량 전지의 개발로 배터리 성능 향상했을 뿐만 아니라 휴대폰의 두께를 얇게 구현할 수 있도록 합니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>고성능/다기능 스마트폰 및 노트북, 무선 청소기, 장난감, 전동공구 등<br>
        소형 전자 기기의 배터리 성능 향상에 기여합니다.</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none">스펙</th>
            <th rowspan="2" class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--title">
            <th class="border-left-none">두께</th>
            <th>재질</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">10㎛ ~ 30㎛</td>
            <td>
                A1050, A1100,
                A1235, A3003
                기타
            </td>
            <td class="border-right-none">
                스마트폰, 노트북,무선청소기, 장난감, 전동공구 등
            </td>
        </tr>
    </table>
@endsection
