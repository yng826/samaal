@php
    $bodyClass = 'work';
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
                        전체
                    </li>
                    <li class="tab-item" data-tab="work-faq-02">
                        채용절차
                    </li>
                    <li class="tab-item" data-tab="work-faq-03">
                        지원서 작성/수정
                    </li>
                    <li class="tab-item" data-tab="work-faq-04">
                        기타
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
            </div>

            <div class="work-faq__section--list work-faq-03">
                <!-- 지원서 작성/수정 질문 리스트-->
            </div>

            <div class="work-faq__section--list work-faq-04">
                <!-- 기타 질문 리스트-->
            </div>
        </div>
    </main>
@endsection
