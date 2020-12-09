<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
        <style>
            .ir-contents{
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
              }
            .ir-contents p{
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
              }
        </style>
    </head>
    <body id="app" class="about-ir">
        <!-- {{-- @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div> --}} -->
        @include('shared.header')

        <main class="contents-wrap">
            <div class="contents-wrap__title pd-20">
               <h2 class="about-ir__title">
                   financial
                </h2>
            </div>
            <nav class="" style="text-align: center;">
                <ul >
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;" >
                        <a href="/about-us/ir/consolidated">연결재무제표</a></li>
                    </li>
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">
                        <a href="/about-us/ir/separate">별도재무제표</a></li>
                    </li>
                    <li class="" style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">
                        <a href="/about-us/ir/board/list">전자공고</a></li>
                    </li>
                </ul>
            </nav>
            <div class="contents-wrap__section">
                <h3 style="text-align: center;">전자공고</h3><br />
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">번호</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">내용</th>
                            <th class="text-center">등록/수정일</th>
                            <th class="text-center" style="width: 80px;">관리</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ir_boards as $ir_board)
                        <tr>
                            <td class="text-center">{{ $ir_board->id }}</td>
                            <td class="text-center"> {{ $ir_board->title }}</a></td>
                            <td class="text-center" style="table-layout: fixed;">
                                <div class="ir-contents">{!! $ir_board->contents !!}</div>
                            </td>
                            <td class="text-center">{{ $ir_board->updated_at ?? $ir_board->created_at}}</td>
                            <td class="text-center" ><a class="btn btn-outline-info btn-xs" href="/about-us/ir/{{$ir_board->id}}">상세보기</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br />
            <div class="pagination">
                <a href="/about-us/ir/board/list?page=1" class="pagination__button-prev"></a>
                @for($i=1; $i<$cnt+1; $i++)
                <?php
                    $style='';
                ?>
                    @if (isset($_GET['page']) && $_GET['page'] == $i)
                    <?php
                        $style='color: blue';
                    ?>
                    @endif
                    <a href="/about-us/ir/board/list?page={{ $i }}" class="pagination__number"style="{{ $style }}">{{ $i }}</a>
                @endfor
                <a href="/about-us/ir/board/list?page={{ $cnt }}" class="pagination__button-next"></a>
            </div>
            <div class="" style="text-align: center;">
                <button type="button" onclick="location.href='#' " style="width: 200px;display: inline-block;margin-top: 20px;height: 50px;">DART 바로가기</button>
            </div>
        </main>

        @include('shared.footer')

        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
  {{-- <script src="{{ mix('/js/financial.js') }}"></script> --}}
    </body>
</html>

