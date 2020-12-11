<footer class="footer">
    <div class="footer__m-top"></div>
    <div class="footer__wrap">
        <h1 class="footer__logo">SAMA</h1>
        <div class="footer__nav">
            <ul class="footer__nav-list">
                @foreach ($treeSitemap as $sitemap)
                <li class="footer__nav-list--item">
                    <h3>{{ $sitemap->name }}</h3>
                    <ul>
                    @if(isset($sitemap->children) && count($sitemap->children) > 0)
                        @foreach($sitemap->children as $children)
                            <li><a href="{{ $children->url }}">{{ $children->name }}</a></li>
                        @endforeach
                    @endif
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="footer__inner">
            {{-- <div class="droplist-box">
                <button class="droplist-box__button">패밀리사이트</button>
                <!-- <ul class="droplist">
                    <li id="" class="droplist__item"><a href="#">패밀리1</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                </ul> -->
            </div> --}}
            <div class="droplist-box">
                <button class="droplist-box__button">개인정보처리방침</button>
                <!-- <ul class="droplist">
                    <li id="" class="droplist__item"><a href="#">개인정보</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리2</a></li>
                    <li id="" class="droplist__item"><a href="#">패밀리3</a></li>
                </ul> -->
            </div>
            <div class="question-btn">
                <a href="#">문의하기</a>
            </div>
        </div>
        <p class="copyright">ⓒ 2020 SAMA. ALL RIGHTS RESERVED. DESIGNED BY DOMOBRODEUR</p>
    </div>
</footer>
