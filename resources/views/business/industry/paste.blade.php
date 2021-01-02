@extends('layouts.business')

@section('detail__title')
    Aluminium Paste
    <p>
        Widely used in priming processes that require high rustproof properties
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_paste.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_paste_hover.jpg);"></div></div>
@endsection

@section('info__title')
    How about using scraps collected during the aluminium rolling process?
@endsection

@section('info__text')
    It is widely used for priming for steel structures, bridges, buildings and vessels that require rustproofing.
    An innovative product for its premium luster, high light-shielding  and durability.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        We are developing special aluminium paste (non-leafing type) for metallic color.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-right-none border-bottom">제품 사양</th>
            <td class="border-right-none border-bottom">ALUMINIUM/OIL</td>
        </tr>
    </table>
    <table class="info__table add-table">
        <colgroup>
            <col width="30%">
            <col width="auto">
        </colgroup>
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <th class="border-left-none list-title">
                리핑 타입<br>
                (Leafing Type)
            </th>
            <td class="list">
                <ul>
                    <li>- 철구조물(철탑, 교량, 저장용 탱크, 기계장치) 부식방지용 페인트</li>
                    <li>- 인쇄 인크용 </li>
                    <li>- 금속질감 플라스틱 마스터 뱃지용</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th  class="border-left-none list-title">
                넌리핑 타입<br>
                (Non-Leafing Type)
            </th>
            <td>
                - 선박용 부식방지 페인트<br>
                - 금속 색상의 페인트<br>
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

@section('manager-pop')
    @include('layouts.managerPop02')
@endsection
