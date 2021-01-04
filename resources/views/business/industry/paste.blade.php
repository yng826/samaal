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
    <em>Future Value</em>
    <p>
        We are developing special aluminium paste (non-leafing type) for metallic color.
    </p>
@endsection

@section('info__table')
    <table class="info__table">
        <tr class="info__table--title">
            <th class="border-left-none border-right-none border-bottom">Spec</th>
            <td class="border-right-none border-bottom">ALUMINIUM/OIL</td>
        </tr>
    </table>
    <table class="info__table add-table">
        <colgroup>
            <col width="30%">
            <col width="auto">
        </colgroup>
        <tr class="info__table--title">
            <th colspan="2" class="border-left-none border-right-none">Typical Uses</th>
        </tr>
        <tr class="info__table--bottom">
            <th class="border-left-none list-title">
                Leafing Type
            </th>
            <td class="list">
                <ul>
                    <li>- Anti-corrosion paint on steel structures (steel towers, bridges, storage tanks, machinery)</li>
                    <li>- For printing</li>
                    <li>- For the Metallic compound</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th  class="border-left-none list-title">
                Non-Leafing Type
            </th>
            <td>
                - Basic floor coating and anti-corrosion paint for vessels<br>
                - Metallic paint<br>
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
