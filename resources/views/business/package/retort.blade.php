@extends('layouts.business')

@section('detail__title')
    레토르트 포장재
    <p>
        수입에 의존하던 제품을 국내 최초로 선보인<br>
        장기 보존용 식품포장재로 위생적이고 사용이 간편한 제품
    </p>
@endsection

@section('swiper-container')
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_retort.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_retort_hover.jpg);"></div></div>
    <div class="swiper-slide"><div class="slide-img" style="background-image:url(/kor/images/business/foil/img_retort_hover02.jpg);"></div></div>
@endsection

@section('info__title')
    <span>언제 어디서나 음식물을 깔끔하게 보존하고<br>
    사용</span>할 수 있는 방법이 있을까요?
@endsection

@section('info__text')
    미리 조리된 식품을 고온에서 멸균 처리하여 장기 보존이 가능하며<br>
    조리시간을 단축하여 간편하게 사용할 수 있어 일상생활에 큰 변화를 안겨준 제품입니다
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>전자레인지에 사용하는 레토르트 제품으로 확대 적용하고 있으며<br>
        캔 포장 제품을 파우치 제품으로 대체 유도함으로써 이산화탄소 배출량을<br>
        획기적으로 감축할 수 있는 친환경적인 소재로 주목을 받고 있습니다</p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-bottom">제품 사양</th>
            <th class="border-right-none">활용 영역</th>
        </tr>
        <tr class="info__table--bottom">
            <td class="border-left-none">
                PET/AL/OPA/CPP<br>
                PET/OPA/CPP
                </td>
            <td class="border-right-none">
                레토르트식품,<br>
                콘택트렌즈 등(의학용)<br>
                포장 후 살균제품
            </td>
        </tr>
    </table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
