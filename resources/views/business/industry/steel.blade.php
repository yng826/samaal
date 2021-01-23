@extends('layouts.business')

@section('detail__title')
    Steel/Aluminium Laminated Tape
    <p>
        광케이블을 외부충격으로부터 안전하게 보호하여<br>
        통신에 악영향이 끼치지 않도록 도움
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_steel.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_steel_hover.jpg);"></div></div>
@endsection

@section('info__title')
    안정적인 인터넷 접속을 위해<br>
    <span>케이블망을 보호하는 소재</span>가 있으면 좋겠어요!
@endsection

@section('info__text')
    인터넷의 급속한 확산으로 통신환경이 기존 구리선에서<br>
    광통신케이블로 바뀜에 따라 케이블 보호를 목적으로<br>
    1995년 국내 최초로 개발된 스틸테이프입니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        해저 및 저 개발국가 설치 수요 및<br>
        유지보수용의 수요가 증가하고 있습니다
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">AL/EAA, STEEL/EAA</td>
            <td class="border-right-none">
                광케이블 보호용
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
