@extends('layouts.business')

@section('detail__title')
    초발수 리드
    <p>
        보다 더 위생적인 식품 포장재를 위해<br>
    일본 TOYO ALUMINIUM의 원천 기술을 국내 최초로 적용
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_watertight.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_watertight_hover.jpg);"></div></div>
@endsection

@section('info__title')
    물에 젖지 않는 연꽃잎처럼,<br>
    <span>요구르트의 뚜껑도 깔끔</span>하게 바꿀 수 있을까요?
@endsection

@section('info__text')
    표면 접촉각을 극대화시켜 접촉 면적을 최소화하여 초발수 기능을 구현함으로써<br>
    내용물이 뚜껑에 달라붙지 않아 편리하며 위생적으로 폐기할 수 있어 친환경적입니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>발수 외에도 발유기능(유분이 용기에 들러붙지 않게 하는 기능)을 이용한 제품을<br>
        개발하고 있으며 이를 확대 적용하여 알루미늄 호일, 기능성 복합 필름 등<br>
        다양한 기재에 응용하고자 합니다 </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">PET/AL/PET/PE/WAX</td>
            <td class="border-right-none">
                떠먹는 요구르트
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
