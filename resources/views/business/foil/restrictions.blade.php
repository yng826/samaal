@extends('layouts.business')

@section('detail__title')
    제약포장재용
    <p>
        의약품을 장기간 안전하게 보존 할 수 있는<br>
        제약포장재용 알루미늄 호일
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_restrictions.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_restrictions_hover.jpg);"></div></div>
@endsection

@section('info__title')
    의약품을 <span>장기간 보존하여 안전</span>하게
    복용할 수 있도록 하는 포장재는 없을까요?
@endsection

@section('info__text')
    의약품의 소포장 요구에 대응하고자 기존 플라스틱 필름보다
    수분 및 가스 차단성이 월등한 제약 포장재용 알루미늄 호일을 개발하였습니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>알루미늄 소재 개발로 얇은 두께에서도<br>
        차단성 및 성형성이 양호합니다.</p>
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
            <td class="border-left-none">20㎛, 28㎛, 30㎛,<br> 45㎛, 50㎛, 60㎛</td>
            <td>
                A1235, A8021, A8079
            </td>
            <td class="border-right-none">
                PTP,<br> Strip Packaging,<br>ALU-ALU Cold Forming Foil,<br>파스포장재
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
