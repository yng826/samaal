<html>
    <head>
        <title>{{ config('app.name', '삼아알미늄') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
        <script src="js/app.js"></script>
    </head>
    <body>
        <div class="intro-section">
            @include('shared.header')

            <main class="intro-wrap">
               <section class="intro-wrap__section">
                    <div class="intro-wrap__section--left">
                        <p>
                            미래는 불확실합니다.dd<br>
                            불확실성은 무한한 상상력과 도전을 요구합니다.
                        </p>
                        <p>
                            "고객이 원하는 것을 안전하게 보존하며 이동을 쉽게 해준다."<br>
                            우리는 미션을 통해 새로운 도전을 약속했습니다.
                        </p>
                        <p>
                            세상을 유익하게 만들면서 수익을 창출하는 것,<br>
                            편리한 삶의 가치를 위한 기술 혁신에 이어
                        </p>
                        <p class="important-text">
                            사회적·환경적 가치를 지키며<br>
                            지속 가능한 세상을 만들기 위해<br>
                            <span>삼아는 새로운 도약을 시작합니다.</span>
                        </p>
                    </div>
                    <div class="intro-wrap__section--right">
                        <p>
                            세계 최고의 기술력으로<br>
                            양질의 일자리를 늘려 국가 경제에 기여하고 있습니다.
                        </p>
                        <p>
                            고품질의 알루미늄 호일 및 포장재 생산 기술을 통해<br>
                            식품의 유통기한을 늘림으로써 음식물 쓰레기를 줄여<br>
                            환경보호에 기여하고 있습니다.
                        </p>
                        <p>
                            식품 이동을 쉽게 만들어 더 많은 사람들에게<br>
                            편리하고 안전하게 식량을 공급하고 있습니다.
                        </p>
                        <p>
                            이차전지 양극집전체 기술은 유한한 자원을 효율적으로 사용하게 하여<br>
                            친환경에너지 보급에 큰 기여를 하고 있습니다.
                        </p>
                        <p class="important-text">
                            최고의 제품을 넘어<br>
                            사회적 변화를 이끌기 위한 노력,<br>
                            <span>삼아가 지속 가능한 세상에 존재하는 이유입니다.</span>
                        </p>
                    </div>
               </section>
            </main>
            @include('shared.footer')
        </div>
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/question.js')}}"></script>
    </body>
</html>
