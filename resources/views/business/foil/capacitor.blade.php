@extends('layouts.business')

@section('detail__title')
Capacitor용
<p>
    고전압 축전기의 성능 향상을 위해<br>
    세계 시장에 진출한 삼아의 대표 제품
</p>
@endsection

@section('swiper-container')
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_capacitor.jpg);"></div></div>
        <div class="swiper-slide"><div class="slide-img" style="background-image:url(/images/business/foil/img_capacitor_hover.jpg);"></div></div>
@endsection

@section('info__title')
Capacitor용 호일의 용량을 더 늘릴 수 있도록<br>
극박막 알루미늄 호일을 <span>더 얇게 만들 수 없을까요?</span>
@endsection

@section('info__text')
고전압 축전기의 성능 향상을 필요로 하는 고객 니즈에 따라<br>
박육화에 대한 연구개발로 두께 4.5㎛ 알루미늄 호일을 생산하여 시장에 공급 중입니다.
@endsection

@section('info__value')
    <em>미래가치</em>
    <p>다국적 전력기업들의<br>판매 확대 가능성 높습니다</p>
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
        <td class="border-left-none">4.5㎛ ~ 6㎛</td>
        <td>A1235</td>
        <td class="border-right-none">축전기</td>
    </tr>
</table>
@endsection

@section('manager-pop')
    @include('layouts.managerPop')
@endsection
