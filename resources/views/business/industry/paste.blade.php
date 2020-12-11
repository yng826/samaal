@extends('layouts.business')

@section('detail__title')
    알루미늄 페이스트
    <p>
        높은 방청력을 요구하는 도장 단계에서 널리 활용
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_paste.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_paste_hover.jpg);"></div></div>
@endsection

@section('info__title')
    알루미늄 박 생산과정에서 발생하는<br>
    부산물들을 활용해보면 어떨까요?
@endsection

@section('info__text')
    높은 방청력을 요구하는 철탑, 철교, 건축 도장, 선박의 초벌 도장 등에<br>
    널리 활용되며 미려한 광택과 차광성 및 내구성으로<br>
    업계 내 대표 혁신 제품으로 손꼽히고 있습니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        메탈릭 컬러용 Non Leafing 알루미늄<br>
        페이스트를 개발하고 있습니다
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-right-none border-bottom">스펙</th>
            <td class="border-right-none border-bottom">ALUMINIUM/OIL</td>
        </tr>
    </table>
    <table class="info__table add-table">
        <colgroup>
            <col width="30%">
            <col width="auto">
        </colgroup>
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none border-right-none">활용영역</th>
        </tr>
        <tr class="info__table--bottom">
            <th class="border-left-none list-title">
                리핑 타입<br>
                (Leafing Type)
            </th>
            <td class="list">
                <ul>
                    <li>- 해운 페인트</li>
                    <li>- 지붕 페인트 </li>
                    <li>- 혼합 페인트용</li>
                    <li>- 타워, 다리, 탱크</li>
                </ul>
                <ul>
                    <li>- 인쇄용</li>
                    <li>- 장식용 페인트</li>
                    <li>- 마스터뱃지용</li>
                    <li>- 일반건축 내외장용</li>
                </ul>
                <ul>
                    <li>- 고급 인쇄</li>
                    <li>- 장난감, 가구,우산대, 악기, 기계</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th  class="border-left-none list-title">
                넌리핑 타입<br>
                (Non-Leafing Type)
            </th>
            <td>
                - 선박의 기본적인 바닥코팅 및 부식방지 페인트<br>
                - 금속 색상의 페인트<br>
                - 선박의 기본적인 바닥 코팅 및 부식방지페인트
            </td>
        </tr>
        {{-- <tr class="info__table--bottom">
            <td class="border-left-none">AL/EAA, STEEL/EAA</td>
            <td class="border-right-none">
                광케이블 보호용
            </td>
        </tr> --}}
    </table>
@endsection
