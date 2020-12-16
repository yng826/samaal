@extends('layouts.default')

@section('contents')
<main class="work-recruit contents-wrap">
    <div class="work-recruit__title contents-wrap__title">
        <h2>
            채용공고
            <p>
                끊임없는 혁신으로 글로벌 시장에 <em>도전하는 삼아人</em><br>
                최고의 전문성으로 <em>신뢰받는 삼아人</em><br>
                <em>즐겁게 일하는 삼아人</em>
            </p>
        </h2>
    </div>
    <div class="work-recruit__contents">
        <form action="/work-with-us/recruit" method="get">
            <div class="work-recruit__search">
                <div class="work-recruit__search--wrap">
                    <input type="text" name="keyword" placeholder="키워드 검색"/>
                    <button type="submit" class="btn-search">검색</button>
                </div>
            </div>
        </form>
        <div class="work-recruit__detail">
            <div class="work-recruit__detail-wrap">
                <div class="comer-box">
                    <span class="{{$recruit->career =='new' ? 'on': ''}}">신입</span>
                    <span class="{{$recruit->career =='career' ? 'on': ''}}">영업</span>
                </div>
                <h3>
                    {{$recruit->title}}
                </h3>
                <div class="keywords">
                    <ul>
                        @foreach ($keywords as $item)
                        <li>#{{$item->keyword}}</li>
                        @endforeach
                    </ul>
                </div>
                <ul class="work-recruit__detail-list">
                    <li class="work-recruit__detail-list--item">
                        <h4 class="work-recruit__detail-list--title">지원방법</h4>
                        <dl>
                            <dt>접수기간</dt>
                            <dd>{{$recruit->start_date}}~{{$recruit->end_date}}</dd>
                        </dl>
                        <dl>
                            <dt>접수방법</dt>
                            <dd>삼아 웹사이트 접속 후 채용 페이지<br><em class="main-color text-bold">‘Work With Us’에서 온라인 지원</em></dd>
                        </dl>
                        <dl>
                            <dt>합격자 확인</dt>
                            <dd>삼아 웹사이트 내 ‘지원결과 확인’ <br>메뉴에서 확인 가능 </dd>
                        </dl>
                    </li>

                    <li class="work-recruit__detail-list--item">
                        <h4 class="work-recruit__detail-list--title">유의사항</h4>
                        <p>- 최종합격 후 졸업예정자의 졸업자격 미 취득 시 합격이 취소될 수 있습니다. </p>
                        <p>- 입사지원서 기재 내용이 허위로 판명될 경우합격 및 입사가 취소될 수 있습니다. </p>
                    </li>
                    <li class="work-recruit__detail-list--item">
                        <h4 class="work-recruit__detail-list--title">지원 자격</h4>
                        <p>- 기졸업 및 2022년 2월 졸업 예정자 </p>
                        <p>- 병역면제 혹은 병역을 마친 자,<br>해외 출장에 결격 사유가 없는 자</p>
                        <p>- 국가등록장애인 및 국가보훈대상자는<br> 관계법령에 의해 우대 </p>
                    </li>
                    <li class="work-recruit__detail-list--item">
                        <h4 class="work-recruit__detail-list--title">채용 문의</h4>
                        <p>삼아 채용 페이지<br>‘Work With Us’의 FAQ 참고 </p>
                    </li>
                </ul>
                <div class="work-recruit__detail-list--bottom">
                    <h4 class="work-recruit__detail-list--title">진행절차</h4>
                    <ul class="procedure">
                        <li><span>입사지원</span></li>
                        <li><span>서류전형</span></li>
                        <li><span>면접전형</span></li>
                        <li><span>채용검진</span></li>
                        <li><span>최종합격</span></li>
                    </ul>
                </div>
            </div>
            <div class="work-recruit__detail--button">
                <apply-button recruit_id="{{$recruit->id}}"></apply-button>
                <check-apply-button recruit_id="{{$recruit->id}}"></check-apply-button>
            </div>
        </div>
    </div>
    <div class="top-btn">TOP</div>
</main>
@endsection

@section('popup-container')
    <login-component recruit_id="{{$recruit->id}}"></login-component>
    <join-component recruit_id="{{$recruit->id}}"></join-component>
    <find-password-component></find-password-component>
@endsection
@section('script')
    @parent
    <script src="{{ mix('js/recruit.js') }}"></script>
@endsection
