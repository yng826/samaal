@php
    $bodyClass = 'about-ir';
    $meta_title = '재무정보 | 전자공고 | 감사의견';
    $meta_desc = '감사의견';
@endphp

@extends('layouts.default')

@section('contents')
<main class="contents-wrap">
    <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            재무정보
        </h2>
    </div>
    <div class="ir-wrap--tab">
        <ul>
            <li class="tab-item {{$id =='consolidated' ? 'on': ''}}">
                <a href="/kor/about-us/ir/consolidated">연결재무제표</a>
            </li>
            <li class="tab-item {{$id =='separate' ? 'on': ''}}">
                <a href="/kor/about-us/ir/separate">별도재무제표</a></li>
            </li>
            <li class="tab-item {{$id =='board' ? 'on': ''}}">
                <a href="/kor/about-us/ir/board">전자공고</a></li>
            </li>
        </ul>
    </div>
    <div class="contents-wrap__section clear ir-board-detail" id="ir_board_info">
        <div class="info">
            <h1 class="ir-board-detail__title">{{ $ir_board->title }}</h1>
            <p class="name ir-board-detail__date">{{ $ir_board->updated_at ?? $ir_board->created_at}}<span></span>삼아</p>
            @if ( $ir_board->pdf_file_name )
            <div class="ir-board-file-box">
                {{-- <a href="/kor/about-us/ir/board/file-download?id={{ $ir_board->id }}" class="btn-download"></a> --}}
                <a href="/kor/about-us/ir/board/file-download?id={{ $ir_board->id }}" class="ir-board-detail__download"><span>{{ $ir_board->pdf_file_name}}</span></a>
            </div>
            @endif
            <div class="ir-board-contents ir-board-detail__contents">
                {!! $ir_board->contents !!}
            </div>
        </div>
        <div class="img ir-board-detail__img">
            @if ( $ir_board->img_file_name )
                <a href="/kor/storage/{{ $ir_board->img_file_path }}" title="{{ $ir_board->img_file_name }}" class="ir-img">
                    <img src="/kor/storage/{{ $ir_board->img_file_path }}" width="100%" alt="{{ $ir_board->img_file_name }}"/>
                </a>
            @endif
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="/kor/js/question.js"></script> --}}
    <script src="/kor/js/irBoard.js"></script>
@endsection

