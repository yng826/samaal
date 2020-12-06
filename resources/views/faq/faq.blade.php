@extends('layouts.default')

@section('contents')
    <main class="contents-wrap">
        <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            FAQ
        </h2>
        </div>
        <div class="contents-wrap__section">
            <select onchange="location.href='/faq/faq?category_id='+this.value">
                <option value="">분류</option>
                <option value="1" {{ $category_id=='1' ? 'selected' : '' }}>채용절차</option>
                <option value="2" {{ $category_id=='2' ? 'selected' : '' }}>지원서 작성/수정</option>
                <option value="3" {{ $category_id=='3' ? 'selected' : '' }}>기타</option>
            </select>
        </div>
        <div class="contents-wrap__section">
            @foreach ($faqs as $faq)
            <div>
                <div><b>
                    @if ($faq->category_id == 1)
                        채용절차
                    @elseif ($faq->category_id == 2)
                        지원서 작성/수정
                    @elseif ($faq->category_id == 3)
                        기타
                    @endif
                </b></div>
                <div>{{ $faq->question }}</div>
                <div>{!! nl2br(e($faq->answer)) !!}</div>
            </div>
            @endforeach
        </div>
    </main>
@endsection
