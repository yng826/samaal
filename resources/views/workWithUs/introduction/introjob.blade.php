@php
    $bodyClass = 'workWithUs';
@endphp

@extends('layouts.default')

@section('contents')
<main class="introduction-introjob contents-wrap">
    <div class="introduction-introjob__title">
        <h2>WORKING AT SAMA</h2>
        <p>
            도전을 즐기는 전문가들과 함께<br>
            여러분의 CAREER PATH를 만들어보세요
        </p>
        <strong>삼아와 함께 혁신의 역사를 이어갈 분을 환영합니다</strong>
    </div>
    <div class="introduction-introjob__contents">
        <ul class="introduction-introjob__list">
            <li class="introduction-introjob__list--item">
                <h3>생산</h3>
                <div class="content-box">
                    <ul>
                        <li>
                            제품 생산에 필요한 자제 수급을 계획, 통제하고,
                            고객 납기에 맞춰 생산 일정을 수립, 진행한다.
                        </li>
                        <li>
                            주어진 자제와 인적, 물적 자원을 효율적으로 운영하여,
                            생산일정에 따라 목표로 하는 제품을 생산한다.
                        </li>
                    </ul>
                    <span>소속팀 : 생산팀, 생산관리팀</span>
                    <a href="#">직무 인터뷰 보기</a>
                </div>
            </li>
            <li class="introduction-introjob__list--item">
                <h3>영업</h3>
                <div class="content-box">
                    <ul>
                        <li>
                            회사의 경영 방침에 따라 판매 계획을 수립하고 국내의 시장
                            동향을 파악하여 매출 및 영업이익 달성을 위해 노력한다.
                        </li>
                        <li>
                            신규고객 발굴과 기족 고객 유지에 힘쓰며, 고객의 요구에
                            맞춰 생산과 일정을 관리한다.
                        </li>
                        <li>
                            판매 실적 및 원가 북석을 통해 영업 전략을 수립, 실행한다.
                        </li>
                    </ul>
                    <span>소속팀 : 국내영업팀, 해외영업팀, 부산사무소, 영업관리팀</span>
                    <a href="#">직무 인터뷰 보기</a>
                </div>
            </li>
            <li class="introduction-introjob__list--item">
                <h3>품질보증</h3>
                <div class="content-box">
                    <ul>
                        <li>
                            생산된 제품의 품질을 테스트하고 관리하며,
                            품질 향상을 위한 공정 확인 및 시스템 개선을 한다.
                        </li>
                        <li>
                            품질에 대한 원인을 파악하고, 이를 개선하기 위한 대책을
                            수립하고 실행한다.
                        </li>
                        <li>
                            품질, 환경 경영시스템의 인증 및 그 효과성을 지속해서
                            개선해 나간다.
                        </li>
                    </ul>
                    <span>소속팀 : 품질관리팀, 품질환경사무국</span>
                    <a href="#">직무 인터뷰 보기</a>
                </div>
            </li>
        </ul>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
@endsection
