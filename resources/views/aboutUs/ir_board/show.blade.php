@php
    $bodyClass = 'about-ir';
@endphp

@extends('layouts.default')

@section('contents')
<main class="contents-wrap">
    <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
        Business Performance
        </h2>
    </div>
    <div class="ir-wrap--tab">
        <ul>
            <li class="tab-item {{$id =='consolidated' ? 'on': ''}}">
                <a href="/about-us/ir/consolidated">Consolidated Financial Statements</a>
            </li>
            <li class="tab-item {{$id =='separate' ? 'on': ''}}">
                <a href="/about-us/ir/separate">Separate Financial Statements</a></li>
            </li>
            <li class="tab-item {{$id =='board' ? 'on': ''}}">
                <a href="/about-us/ir/board">Electronic Disclosure</a></li>
            </li>
        </ul>
    </div>
    <div class="contents-wrap__section clear ir-board-detail" id="ir_board_info">
        <div class="info">
            <h1 class="ir-board-detail__title">{{ $ir_board->title }}</h1>
            <p class="name ir-board-detail__date">{{ $ir_board->updated_at ?? $ir_board->created_at}}<span></span>삼아</p>
            @if ( $ir_board->pdf_file_name )
            <div class="ir-board-file-box">
                {{-- <a href="/about-us/ir/board/file-download?id={{ $ir_board->id }}" class="btn-download"></a> --}}
                <a href="/about-us/ir/board/file-download?id={{ $ir_board->id }}" class="ir-board-detail__download"><span>{{ $ir_board->pdf_file_name}}</span></a>
            </div>
            @endif
            <div class="ir-board-contents ir-board-detail__contents">
                {!! $ir_board->contents !!}
            </div>
        </div>
        <div class="img ir-board-detail__img">
            @if ( $ir_board->img_file_name )
                <a href="/storage/{{ $ir_board->img_file_path }}" title="{{ $ir_board->img_file_name }}" class="ir-img">
                    <img src="/storage/{{ $ir_board->img_file_path }}" width="100%" alt="{{ $ir_board->img_file_name }}"/>
                </a>
            @endif
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
    {{-- <script src="{{ asset('/js/question.js') }}"></script> --}}
    <script src="{{ asset('/js/irBoard.js') }}"></script>
@endsection
