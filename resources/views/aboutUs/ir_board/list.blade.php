@php
    $bodyClass = 'about-ir';
    $meta_title = '삼아알미늄 | 재무정보 | ';
    switch ($id) {
        case 'consolidated':
            $meta_title .= '연결재무제표';
            $meta_desc = '연결재무제표';
            break;
        case 'separate':
            $meta_title .= '별도재무제표';
            $meta_desc = '별도재무제표';
            break;
        case 'board':
            $meta_title .= '전자공고';
            $meta_desc = '전자공고';
            break;
        default:
            $meta_title .= '재무제표';
            $meta_desc = '재무제표';
            break;
    }
@endphp

@extends('layouts.default')

@section('contents')
<main class="contents-wrap">
    <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            재무정보
        </h2>
    </div>
    <div class="about-ir-list__section">
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
        <div class="about-ir-list__table about-ir__table" id="about-ir__board">
            <h3>전자공고</h3><br />
            <table class="table">
                <colgroup>
                    <col width="20%">
                    <col width="auto">
                    <col width="30%">
                    </colgroup>
                <thead>
                    <tr>
                        <th class="text-center .about-ir__no">번호</th>
                        <th class="text-center">제목</th>
                        <th class="text-center">등록/수정일</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ir_boards as $ir_board)
                    <tr>
                        <td class="text-center">{{ $ir_board->id }}</td>
                        <td class="text-center .about-ir__fixed"><div class="ir-contents"> <a class="btn btn-outline-info btn-xs" href="/kor/about-us/ir/board/{{$ir_board->id}}">{{ $ir_board->title }}</a></div></td>
                        <td class="text-center">{{ $ir_board->updated_at ?? $ir_board->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br />
        <div class="pagination">
            <a href="/kor/about-us/ir/board?page=1" class="pagination__button-prev"></a>
            @for($i=1; $i<$cnt+1; $i++)
            <?php
                $style='';
                ?>
                @if(!isset($_GET['page']))
                <?php
                    $_GET['page'] = 1;
                ?>
                @endif
                @if ($_GET['page'] == $i)
                <?php
                    $style='color: blue';
                ?>
                @endif
                <a href="/kor/about-us/ir/board?page={{ $i }}" class="pagination__number"style="{{ $style }}">{{ $i }}</a>
            @endfor
            <a href="/kor/about-us/ir/board?page={{ $cnt }}" class="pagination__button-next"></a>
        </div>
        <div class="about-ir__link">
            <a class="link" href="http://dart.fss.or.kr/" target="_blank">DART 바로가기</a>
        </div>
    </div>
</main>

@endsection

@section('script')
    @parent
    {{-- <script src="/kor/js/question.js"></script> --}}
    <script src="/kor/js/irBoard.js"></script>
@endsection

