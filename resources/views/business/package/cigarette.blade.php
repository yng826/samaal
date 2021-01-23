@extends('layouts.business')

@section('detail__title')
    담배포장지
    <p>
        우수한 보향 및 보습성으로<br>
        1960년대부터 현재까지 활용 중인 담배용 내포장재
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_cigarette.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_cigarette_hover.jpg);"></div></div>
@endsection

@section('info__title')
    담배의 향과 맛이<br>
    장기간 유지되면 좋겠어요!
@endsection

@section('info__text')
    1960년대 수입에 의존하던 제품을 국산으로 대체하기 위하여<br>
    삼아알미늄 설립 후 최초로 생산한 제품입니다. 보향 및 보습성이 우수하며,<br>
    향후 전자담배용 내포장재, 궐련 포장재로 활용될 것으로 보고 있습니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>
        전자 담배용 필터 및<br>
        내포장재로 확대하고 있습니다.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">AL/PAPER</td>
            <td class="border-right-none">
                담배용 내포장재
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
