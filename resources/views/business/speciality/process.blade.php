@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
<main class="speciality-process contents-wrap">
    <div class="contents-wrap__title speciality-process__title">
        <h2>Production Process</h2>
    </div>
    <div class="contents-wrap__section speciality-process__contents">
        <div class="speciality-process__tab">
            <ul>
                <li data-hash="roll" data-id="content-01" class="speciality-process__tab--item item-roll"><span>Rolling</span></li>
                <li data-hash="manufacture" data-id="content-02" class="speciality-process__tab--item item-manufacture"><span>Converting</span></li>
                <li data-hash="paste" data-id="content-03" class="speciality-process__tab--item item-paste"><span>Aluminium Paste</span></li>
            </ul>
        </div>
        <div class="content-01 speciality-process__tab-content tab-roll process-layout">
            <p class="process-layout__text">
                Sama will continue to fulfill its responsibilities as an industry leader based on our globally-leading rolling technology.
            </p>
            <ul class="process-layout__list">
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">Rolling </span>
                    {{-- <strong class="lang-english">Rolling</strong> --}}
                    <a href="https://www.youtube.com/embed/y-hvWlZ0Vdg?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">Separating / Slitting</span>
                    {{-- <strong class="lang-english">Separating / Slitting</strong> --}}
                    <a href="https://www.youtube.com/embed/VUle8_sEG7M?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">Annealing</span>
                    {{-- <strong class="lang-english">Annealing</strong> --}}
                    <a href="https://www.youtube.com/embed/HNb5OE9o9cg?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
                <li class="process-layout__list--item content-01__list--item">
                    <span class="lang-korea">Packaging</span>
                    {{-- <strong class="lang-english">Packaging</strong> --}}
                    <a href="https://www.youtube.com/embed/sW3hHj2l47Q?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
            </ul>
            <p class="process-layout__text">
                Cutting-edge rolling mills with ultra-high speed & widest width of 2,100mm,<br>
                as well as the latest production facilities such as seperators, <br>
                slitters, pinhole detectors, etc.<br>
                <span>First in Korea to successfully produce 4.5㎛ aluminium foil</span>

                Certified worldwide supplier of aluminium foil for LIB cathode current collector
            </p>
            <div class="content-01__process">
                <ul>
                    <li class="content-01__process--item item-01">
                        <div class="text-box">
                            <div>
                                <em>Rolling</em>
                            </div>
                        </div>
                    </li>
                    <li class="content-01__process--item item-02">
                        <div class="text-box">
                            <div>
                                <em>Separating<br>/Slitting</em>
                            </div>
                        </div>
                    </li>
                    <li class="content-01__process--item item-03">
                        <div class="text-box">
                            <div>
                                <em>Annealing</em>
                            </div>
                        </div>
                    </li>
                    <li class="content-01__process--item item-04">
                        <div class="text-box">
                            <div>
                                <em>Packaging</em>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-02 speciality-process__tab-content tab-manufacture process-layout">
            <p class="process-layout__text">
                Since the production of aluminium backed paper for cigarette packaging for the first time in 1969,<br>
                we have been leading the industry with excellent quality and development capabilities in various packaging<br>
                fields ranging from general food packaging materials to pharmaceuticals, construction and industrial packaging materials.
            </p>
            <ul class="process-layout__list">
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">Printing</span>
                    {{-- <strong class="lang-english">Printing</strong> --}}
                    <a href="https://www.youtube.com/embed/ew1lzr5qKUg?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">Laminating</span>
                    {{-- <strong class="lang-english">Laminator</strong> --}}
                    <a href="https://www.youtube.com/embed/3t6QU4xq-kc?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">Slitting</span>
                    {{-- <strong class="lang-english">Slitting</strong> --}}
                    <a href="https://www.youtube.com/embed/olcpsGoGu7c?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
                <li class="process-layout__list--item content-02__list--item">
                    <span class="lang-korea">Bag Making</span>
                    {{-- <strong class="lang-english">Bag Making</strong> --}}
                    <a href="https://www.youtube.com/embed/FzKbPnwvySs?enablejsapi=1&autoplay=true&origin={{ config('app.url')}}" class="popup-btn">View Film</a>
                </li>
            </ul>
            <p class="process-layout__text">
                Installed the latest advanced processing facilities including printers, laminators and bag-making machines.
                <span>
                    Developed various kinds of products firstly in Korea such as retort pouch, Alu-Alu cold forming foil for pharmaceutical use, refill pouch, steel/aluminium laminated tape, etc.
                </span>
                The first in Korea to develop a super water-repellent LID product, a high-barrier film for composite vacuum insulation panel with reinforced flame retardancy and resistance.
            </p>
            <div class="content-02__process">
                <ul>
                    <li class="content-02__process--item item-01">
                        <div class="text-box">
                            <div>
                                <em>Printing</em>
                            </div>
                        </div>
                    </li>
                    <li class="content-02__process--item item-02">
                        <div class="text-box">
                            <div>
                                <em>Laminating</em>
                            </div>
                        </div>
                    </li>
                    <li class="content-02__process--item item-03">
                        <div class="text-box">
                            <div>
                                <em>Slitting</em>
                            </div>
                        </div>
                    </li>
                    <li class="content-02__process--item item-04">
                        <div class="text-box">
                            <div>
                                <em>Bag Making</em>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-03 speciality-process__tab-content tab-paste process-layout">
            <p class="process-layout__text">
                In 1974, Sama first started producing aluminium paste in Korea made with aluminium scrap.<br>
                We have contributed for import substitution and industry development including vessel,<br>
                construction and automotive sectors.
            </p>
            <ul class="process-layout__list">
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">Smash</span>
                    {{-- <strong class="lang-english">Smash</strong> --}}
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">Classification</span>
                    {{-- <strong class="lang-english">Classification</strong> --}}
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">Filter</span>
                    {{-- <strong class="lang-english">Filter</strong> --}}
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">Mixer</span>
                    {{-- <strong class="lang-english">Mixer</strong> --}}
                </li>
                <li class="process-layout__list--item content-03__list--item">
                    <span class="lang-korea">Packaging</span>
                    {{-- <strong class="lang-english">Packaging</strong> --}}
                </li>
            </ul>
            <p class="content-03__text">
                With an annual production capacity of 2,400 tons, <br>
                we are supplying the best products in Korea through abundant production experience and cutting-edge technology.<br>
                <span>
                    Keeping pace with the growth and advancement of the industry,
                    we are progressing towards the development of world-class premium products through continuous technological innovation.
                </span>
            </p>
        </div>
    </div>
</main>
@endsection

@section('script')
    @parent
@endsection
