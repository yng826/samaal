<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:image" content="{{env('APP_URL')}}/img_sns_sama.png" />
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js"></script>
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
                    Financial Performance
                </h2>
            </div>
            <div class="about-ir-list__section">
                <div class="ir-wrap--tab">
                    <ul>
                        <li class="tab-item {{$id =='consolidated' ? 'on': ''}}">
                            <a href="/about-us/ir/consolidated">연결재무제표</a>
                        </li>
                        <li class="tab-item {{$id =='separate' ? 'on': ''}}">
                            <a href="/about-us/ir/separate">별도재무제표</a></li>
                        </li>
                        <li class="tab-item {{$id =='board' ? 'on': ''}}">
                            <a href="/about-us/ir/board">Electronic Disclosure</a></li>
                        </li>
                    </ul>
                </div>
                <div class="about-ir-list__table about-ir__table" id="about-ir__board">
                    <h3>Electronic Disclosure</h3><br />
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
                                <td class="text-center .about-ir__fixed"><div class="ir-contents"> <a class="btn btn-outline-info btn-xs" href="/about-us/ir/board/{{$ir_board->id}}">{{ $ir_board->title }}</a></div></td>
                                <td class="text-center">{{ $ir_board->updated_at ?? $ir_board->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br />
                <div class="pagination">
                    <a href="/about-us/ir/board?page=1" class="pagination__button-prev"></a>
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
                        <a href="/about-us/ir/board?page={{ $i }}" class="pagination__number"style="{{ $style }}">{{ $i }}</a>
                    @endfor
                    <a href="/about-us/ir/board?page={{ $cnt }}" class="pagination__button-next"></a>
                </div>
                <div class="about-ir__link">
                    <a class="link" href="http://dart.fss.or.kr/" target="_blank">DART 바로가기</a>
                </div>
            </div>
        </main>

        @include('shared.footer')

        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
  {{-- <script src="{{ mix('/js/financial.js') }}"></script> --}}
    </body>
</html>

