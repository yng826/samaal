@extends('layouts.default')

@section('contents')
    <main class="contents-wrap">
        <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            FAQ
        </h2>
        </div>
        <div class="contents-wrap__section">
            <select onchange="location.href='/faq/faq?category='+this.value">
                <option value="">분류</option>
                <option value="채용절차" {{ $category=='채용절차' ? 'selected' : '' }}>채용절차</option>
                <option value="지원서 작성/수정" {{ $category=='지원서 작성/수정' ? 'selected' : '' }}>지원서 작성/수정</option>
                <option value="기타" {{ $category=='기타' ? 'selected' : '' }}>기타</option>
            </select>
        </div>
        <div class="contents-wrap__section">
            @foreach ($faqs as $faq)
            <div>
                <div><b>{{ $faq->category }}</b></div>
                <div>{{ $faq->question }}</div>
                <div>{{ $faq->answer }}</div>
            </div>
            @endforeach
        </div>
    </main>
@endsection
