@php
    $bodyClass = 'work';
    $meta_title = '삼아알미늄 | FAQ';
    $meta_desc = 'FAQ';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="work-faq contents-wrap">
        <div class="contents-wrap__title">
        <div class="contents-wrap__title work-faq__title">
            <h2>
                FAQ
                <p>
                    삼아의 채용 관련 궁금한 점을<br>
                    확인해보세요.
                </p>
            </h2>
        </div>
        </div>
        <div class="work-faq__section">
            <div class="work-faq__section--tab">
                <ul>
                    <li class="tab-item on" data-tab="work-faq-01">
                        <span>전체</span>
                    </li>
                    <li class="tab-item" data-tab="work-faq-02">
                        <span>채용절차</span>
                    </li>
                    <li class="tab-item" data-tab="work-faq-03">
                        <span>지원서 작성 / 수정</span>
                    </li>
                    <li class="tab-item" data-tab="work-faq-04">
                        <span>기타</span>
                    </li>
                </ul>
            </div>
            <div class="work-faq__section--list work-faq-01 on">
                @foreach ($faqs as $faq)
                <div class="work-faq__section--list__item">
                    <div class="question-box">
                        <div class="sortation">
                            @if ($faq->category_id == 1)
                                채용절차
                            @elseif ($faq->category_id == 2)
                                지원서 작성/수정
                            @elseif ($faq->category_id == 3)
                                기타
                            @endif
                        </div>
                        <div class="question">{{ $faq->question }}</div>
                    </div>

                    <div class="answer">{!! nl2br(e($faq->answer)) !!}</div>
                </div>
                @endforeach
            </div>

            <div class="work-faq__section--list work-faq-02">
                <!-- 채용절차 질문 리스트-->
                @foreach ($faqs as $faq)
                    @if ($faq->category_id == 1)
                    <div class="work-faq__section--list__item">
                        <div class="question-box">
                            <div class="sortation">
                                채용절차
                            </div>
                            <div class="question">{{ $faq->question }}</div>
                        </div>

                        <div class="answer">{!! nl2br(e($faq->answer)) !!}</div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="work-faq__section--list work-faq-03">
                <!-- 지원서 작성/수정 질문 리스트-->
                @foreach ($faqs as $faq)
                    @if ($faq->category_id == 2)
                    <div class="work-faq__section--list__item">
                        <div class="question-box">
                            <div class="sortation">
                                지원서 작성/수정
                            </div>
                            <div class="question">{{ $faq->question }}</div>
                        </div>

                        <div class="answer">{!! nl2br(e($faq->answer)) !!}</div>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="work-faq__section--list work-faq-04">
                <!-- 기타 질문 리스트-->
                @foreach ($faqs as $faq)
                    @if ($faq->category_id == 3)
                    <div class="work-faq__section--list__item">
                        <div class="question-box">
                            <div class="sortation">
                                기타
                            </div>
                            <div class="question">{{ $faq->question }}</div>
                        </div>
                        <div class="answer">{!! nl2br(e($faq->answer)) !!}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection
