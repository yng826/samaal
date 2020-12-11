@extends('layouts.business')

@section('detail__title')
    자동차용 사이드 미러 열선용 소재
    <p>
        자동차 사이드미러와 핸들, 온열 시트 열선용 회로 소재로<br>
        탁월한 에칭성 및 균일한 저항 편차가 특징
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_sidemirror.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_sidemirror_hover.jpg);"></div></div>
@endsection

@section('info__title')
    추운 겨울, 사이드미러에 끼는 성에 때문에 운전하기 불편한데,
    성에를 줄일 방법이 없을까요?
@endsection

@section('info__text')
    탁월한 에칭성 및 균일한 저항 편차가 특징인 열선용 회로 소재로<br>
    자동차 사이드미러 열선용뿐만 아니라 핸들, 온열 시트에도 활용되어<br>
    운전자에게 편안한 운전 경험을 안겨줍니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        평판 소재 이외에 적용 가능한 플렉시블 제품 개발로<br>
        적용 분야를 확대하고 있습니다
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">스펙</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">PET/AL</td>
            <td class="border-right-none">
                자동차 사이드미러,<br>
                스티어링휠, 온열시트
            </td>
        </tr>
    </table>
@endsection
