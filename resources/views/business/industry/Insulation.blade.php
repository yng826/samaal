@extends('layouts.business')

@section('detail__title')
    진공단열재용 필름
    <p>
        가전제품의 두께를 얇게 하면서도 단열 성능을 효율적으로 높일 수 있도록<br>
        국내 최초로 삼아가 개발하여 냉장고에 적용한 제품
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_Insulation.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_Insulation_hover.jpg);"></div></div>
@endsection

@section('info__title')
    <span>냉장고의 벽 두께를 얇게 하면서도<br>
    단열 성능</span>을 높일 수 없을까요?
@endsection

@section('info__text')
    진공 단열재용 외피재의 개발 요구에 따라 삼아가 국내 최초로 개발하여<br>
    냉장고에 적용하고 있을 뿐만 아니라 고효율 주택 건설을 위해 복합 강화 외피재도 개발하여
    더욱 안전한 주택 건설에 기여하고 있습니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        단열성능 및 내구성을 향상시켜 선박의 저온 탱크,<br>
        의료용 컨테이너 등의 적용 분야를 개발해나가고 있습니다.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">VM-PET LAMINATE FILM</td>
            <td class="border-right-none">
                냉장고 등 가정용전자제품,<br>
                건축용 및 선박용 단열재
            </td>
        </tr>
    </table>
@endsection
