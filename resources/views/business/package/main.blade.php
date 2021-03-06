@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 포장재 제품';
    $meta_desc = '포장재 제품';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="business-foil contents-wrap">
        <div class="business-foil__title-wrap">
            <div class="business-foil__title package-title">
                <div class="business-foil__title-box">
                    <h2>최초를 넘어 최고의 기술력을 선보인<br> <span>삼아의 <em>포장재 제품</em>을<br> 만나보세요</span></h2>
                </div>
            </div>
        </div>
        <div class="business-foil__contents foil-box">
            <div class="foil-box__col">
                <div class="foil-box__col--item item-cigarette">
                    <a href="package/cigarette" class="foil-box--item">
                        <p class="foil-box__text">담배포장지</p>
                    </a>
                </div>
                <div class="foil-box__col--item item-refill">
                    <a href="package/refill" class="foil-box--item">
                        <p class="foil-box__text">리필파우치</p>
                    </a>
                </div>
            </div>
            <div class="foil-box__inline">
                <a href="package/retort" class="foil-box--item item-retort">
                    <p class="foil-box__text">레토르트 포장재</p>
                </a>
            </div>
            <div class="foil-box__block">
                <div class="foil-box__block--item">
                    <a href="package/alu" class="foil-box--item item-alu">
                        <p class="foil-box__text">ALU-ALU<br>Cold Forming Foil</p>
                    </a>
                </div>
                <div class="foil-box__block--item">
                    <a href="package/watertight" class="foil-box--item item-watertight">
                        <p class="foil-box__text">초발수 리드</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <style>
    @foreach ($models as $model)
        .business-foil .foil-box .item-{{$model->product}} {
            background-image: url(/kor/storage/{{$model->img_file_1_path}});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .business-foil .foil-box .item-{{$model->product}}:hover {
            background-image: url(/kor/storage/{{$model->img_file_2_path}});
        }
    @endforeach
    </style>
@endsection
